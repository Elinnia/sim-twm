<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Pkl;
use App\Models\Tb_Walikelas;
use App\Models\Tb_Siswa;
use App\Models\Tb_Tahun_Ajaran;
use App\Models\Tb_Jurusan;
use App\Libs\Utility;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
use Illuminate\Support\Facades\Validator;
use PDF;
use App;
use Illuminate\Support\Facades\Auth;
class PklController extends BaseController
{
    private $nip;
    private $nisn;
    private $user_type;
    private $kode_walikelas;

    public function __construct() {
        $this->nip = null;
        $this->middleware(function ($request, $next) {
            $this->user_type = Auth::user()->user_type;
            if(Auth::user()->user_type=="guru"){
                $this->nip = Auth::user()->user_conid;
            }
            else if(Auth::user()->user_type=="siswa"){
                $this->nisn = Auth::user()->user_conid;
            }
            
            
            if(Auth::user()->user_type=="wali_kelas"){
                $data_walikelas  = Tb_Walikelas::where("nip",Auth::user()->user_conid)->get();
                $dw = [];
                foreach($data_walikelas as $dwk){
                    $dw[] =$dwk->kode_walikelas;
                }
                $this->kode_walikelas = $dw;
            }

            return $next($request);
        });
    }


    public function index(){
        if($this->user_type=="wali_kelas"){
           
            $data_nilai = Tb_Pkl::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            foreach($data_nilai as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
            }
            $data_nilai = Tb_Pkl::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("kode_jurusan")->get();
            $kode_jurusan = [];
            foreach($data_nilai as $dn){
                $kode_jurusan[] = $dn->kode_jurusan;
            }
        
            $dt_tahun_ajar  = Tb_Tahun_Ajaran::whereIn("id_tahun_ajaran",$id_tahun_ajaran)->get();
            $dt_jurusan  = Tb_Jurusan::whereIn("kode_jurusan",$kode_jurusan)->get();
            $dt_kelas = Utility::get_kelas();
        }
        else{
            $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
            $dt_kelas = Utility::get_kelas();
            $dt_jurusan = Tb_Jurusan::whereNotIn("nama_jurusan",["Umum"])->get();
        }
 
        $param = array(
            "dt_tahun_ajar" => $dt_tahun_ajar,
            "dt_kelas" => $dt_kelas,
            "dt_jurusan" => $dt_jurusan,
        );
        return view("pages/pkl/index")->with($param);
    }
    public function get_data(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("status_siswa","aktif")
                        ->get();
        foreach($dt as &$d){
            $dt_pkl = Tb_Pkl::where("nisn",$d->nisn)
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("semester",$param['semester'])
                        ->first();
            $kode_pkl = "";
            $mitra_dudi = "";
            $lokasi = "";
            $masa_bulan = "";
            $keterangan = "";
            
            if($dt_pkl==true){
                $kode_pkl = $dt_pkl->kode_pkl;
                $mitra_dudi = $dt_pkl->mitra_dudi;
                $lokasi = $dt_pkl->lokasi;
                $masa_bulan = $dt_pkl->masa_bulan;
                $keterangan = $dt_pkl->keterangan;
                
            }
            $d->kode_pkl = $kode_pkl;
            $d->mitra_dudi = $mitra_dudi;
            $d->lokasi = $lokasi;
            $d->masa_bulan = $masa_bulan;
            
            $d->keterangan = $keterangan;
        }
        return response()->json($dt); 
    }

    public function store(Request $request){
       $param = $request->all();
       $validator = Validator::make($param, [
            'nisn' => 'required', 
            'id_tahun_ajaran' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['success' => 0, 'message' => 'Validation Error ', 'errors' => $validator->errors()], 400);
        }
       $nisn = $param['nisn'];
       $id_tahun_ajaran = $request->get("id_tahun_ajaran");
       $semester = $request->get("semester");
       $i = 0;

       $get_walikelas  = Tb_Walikelas::where("kelas",$request->get("kelas"))
                                       ->where("kode_jurusan",$request->get("kode_jurusan"))
                                       ->where("id_tahun_ajaran",$request->get("id_tahun_ajaran"))
                                       ->first();
       $kode_walikelas = $get_walikelas->kode_walikelas;

       foreach ($nisn as $n) {
            $mitra_dudi = $param['mitra_dudi'][$i];
            if(strlen($mitra_dudi)<1){
                $mitra_dudi = "";
            }

            $lokasi = $param['lokasi'][$i];
            if(strlen($lokasi)<1){
                $lokasi = "";
            }

            $masa_bulan = $param['masa_bulan'][$i];
            if(strlen($masa_bulan)<1){
                $masa_bulan = "";
            }

            $keterangan = $param['keterangan'][$i];
            if(strlen($keterangan)<1){
                $keterangan = "";
            }
            $kode_pkl = $param['kode_pkl'][$i];
            if(strlen($kode_pkl)<1){

                $p = array(
                    "kode_walikelas" => $kode_walikelas,
                    "nisn" => $n,
                    "kelas" => $request->get("kelas"),
                    "id_tahun_ajaran" => $id_tahun_ajaran,
                    "kode_jurusan" => $request->get("kode_jurusan"),
                    "semester" => $semester,
                    "mitra_dudi" => $mitra_dudi,
                    "lokasi" => $lokasi,
                    "masa_bulan" => $masa_bulan,
                    "keterangan" => $keterangan
                );

               Tb_Pkl::create($p);
            }
            else{
               // echo "MASUK";
              $p = array(
                    "kode_walikelas" => $kode_walikelas,
                    "nisn" => $n,
                    "kelas" => $request->get("kelas"),
                    "id_tahun_ajaran" => $id_tahun_ajaran,
                    "kode_jurusan" => $request->get("kode_jurusan"),
                    "semester" => $semester,
                    "mitra_dudi" => $mitra_dudi,
                    "lokasi" => $lokasi,
                    "masa_bulan" => $masa_bulan,
                    "keterangan" => $keterangan
                );

                Tb_Pkl::where("kode_pkl",$kode_pkl)->update($p);
            }
            $i++;
       }
    }
   
}
