<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Kenaikan;
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
class KenaikanController extends BaseController
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
           
            $data_nilai = Tb_Kehadiran::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            foreach($data_nilai as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
            }
            $data_nilai = Tb_Kehadiran::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("kode_jurusan")->get();
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
        return view("pages/kenaikan/index")->with($param);
    }

    public function get_data(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("status_siswa","aktif")
                        ->get();
        foreach($dt as &$d){
            $dt_kenaikan = Tb_Kenaikan::where("nisn",$d->nisn)
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("semester",$param['semester'])
                        ->first();
            $kode_kenaikan_kelas = "";
            $status = "";
          
            if($dt_kenaikan==true){
                $kode_kenaikan_kelas = $dt_kenaikan->kode_kenaikan_kelas;
                $status = $dt_kenaikan->status;
            }

            $d->kode_kenaikan_kelas = $kode_kenaikan_kelas;
            $d->status =$status;
        }
        return response()->json($dt); 
    }

    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit

             $data = Tb_Kenaikan::where("kode_kenaikan_kelas",$param['kode_kenaikan_kelas'])->first();
            $param = array(
                "kode_kenaikan_kelas" => $data->kode_kenaikan_kelas,
                "nisn" => $data->nisn,
                "keterangan" => $data->keterangan,
                "naik_kelas" => $data->naik_kelas,
                "tahun" => $data->tahun,
                "url" => route('kenaikan.edit',$data->nisn)
            );
        }
        else{
            //untuk insert
            $param = array(
                "kode_kenaikan_kelas" => "",
                "nisn" => "",
                "keterangan" => "",
                "naik_kelas" => "",
                "tahun" => "",
                "url" => route('kenaikan.store')
            );
        }
        return view("pages/kenaikan/form_kenaikan")->with($param);
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
            
            $status = $param["status"][$i];

            if(strlen($status)>0){
                $kode_kenaikan = $param['kode_kenaikan'][$i];
                if(strlen($kode_kenaikan)<1){

                    $p = array(
                        "kode_walikelas" => $kode_walikelas,
                        "nisn" => $n,
                        "kelas" => $request->get("kelas"),
                        "id_tahun_ajaran" => $id_tahun_ajaran,
                        "semester" => $semester,
                        "kode_jurusan" => $request->get("kode_jurusan"),
                        "status" => $status
                    );

                    Tb_Kenaikan::create($p);
                }
                else{
                // echo "MASUK";
                $p = array(
                        "kode_walikelas" => $kode_walikelas,
                        "nisn" => $n,
                        "kelas" => $request->get("kelas"),
                        "id_tahun_ajaran" => $id_tahun_ajaran,
                        "semester" => $semester,
                        "kode_jurusan" => $request->get("kode_jurusan"),
                        "status" => $status
                    );

                    Tb_Kenaikan::where("kode_kenaikan_kelas",$kode_kenaikan)->update($p);
                }
            }
            
            $i++;
       }
    }

    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Kenaikan::where("kode_kenaikan_kelas",$param['kode_kenaikan_kelas'])->first();
        if($data){
           
            $data->nisn = $request->get("nisn");
            $data->keterangan = $request->get("keterangan");
            $data->naik_kelas = $request->get("naik_kelas");
            $data->tahun = $request->get("tahun");
            $data->save();
        }
        return redirect('/kenaikan');    
}
}