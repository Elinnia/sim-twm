<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Deskripsi_Karakter;
use App\Models\Tb_Walikelas;
use App\Models\Tb_Siswa;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
use Illuminate\Support\Facades\Validator;
use PDF;
use App;
use App\Models\Tb_Tahun_Ajaran;
use App\Models\Tb_Jurusan;
use App\Libs\Utility;
use Illuminate\Support\Facades\Auth;
class DeskripsikarakterController extends BaseController
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
           
            $data_nilai = Tb_Deskripsi_Karakter::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            foreach($data_nilai as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
            }
            $data_nilai = Tb_Deskripsi_Karakter::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("kode_jurusan")->get();
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
        return view("pages/deskripsi_karakter/index")->with($param);
    }

    public function get_data(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("status_siswa","aktif")
                        ->get();
        foreach($dt as $d){
            $dt_deskripsi_karakter = Tb_Deskripsi_Karakter::where("nisn",$d->nisn)
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("semester",$param['semester'])
                        ->first();

            
            $kode_deskripsi  = "";
            $integritas = "";
            $religius = "";
            $nasionalis = "";
            $mandiri = "";
            $gotong_royong = "";
            if($dt_deskripsi_karakter==true){
                $kode_deskripsi = $dt_deskripsi_karakter->kode_deskripsi;
                $integritas = $dt_deskripsi_karakter->integritas;
                $religius = $dt_deskripsi_karakter->religius;
                $nasionalis = $dt_deskripsi_karakter->nasionalis;
                $mandiri = $dt_deskripsi_karakter->mandiri;
                $gotong_royong = $dt_deskripsi_karakter->gotong_royong;
                
            }
            $d->kode_deskripsi = $kode_deskripsi;
            $d->integritas = $integritas;
            $d->religius = $religius;
            $d->mandiri = $mandiri;
            $d->nasionalis = $nasionalis;
            $d->gotong_royong = $gotong_royong;
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
            $integritas = $param['integritas'][$i];
            if(strlen($integritas)<1){
                $integritas = "";
            }

            $religius = $param['religius'][$i];
            if(strlen($religius)<1){
                $religius = "";
            }

            $nasionalis = $param['nasionalis'][$i];
            if(strlen($nasionalis)<1){
                $nasionalis = "";
            }

            $mandiri = $param['mandiri'][$i];
            if(strlen($mandiri)<1){
                $mandiri = "";
            }

            $gotong_royong = $param['gotong_royong'][$i];
            if(strlen($gotong_royong)<1){
                $gotong_royong = "";
            }

            $kode_deskripsi = $param['kode_deskripsi'][$i];
            if(strlen($kode_deskripsi)<1){

                $p = array(
                    "kode_walikelas" => $kode_walikelas,
                    "nisn" => $n,
                    "kelas" => $request->get("kelas"),
                    "id_tahun_ajaran" => $id_tahun_ajaran,
                    "kode_jurusan" => $request->get("kode_jurusan"),
                    "semester" => $semester,
                    "integritas" => $integritas,
                    "religius" => $religius,
                    "nasionalis" => $nasionalis,
                    "mandiri" => $mandiri,
                    "gotong_royong" => $gotong_royong,
                    
                );

               Tb_Deskripsi_Karakter::create($p);
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
                    "integritas" => $integritas,
                    "religius" => $religius,
                    "nasionalis" => $nasionalis,
                    "mandiri" => $mandiri,
                    "gotong_royong" => $gotong_royong,
                    
                );

                Tb_Deskripsi_Karakter::where("kode_deskripsi",$kode_deskripsi)->update($p);
            }
            $i++;
       }
    }

}
