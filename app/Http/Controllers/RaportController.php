<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Akademik;
use App\Models\Tb_Walikelas;
use App\Models\Tb_Siswa;
use App\Models\Tb_Nilai;
use App\Models\Tb_Pkl;
use App\Models\Tb_Ekstrakurikuler;
use App\Models\Tb_Kehadiran;
use App\Models\Tb_Deskripsi_Karakter;
use App\Models\Tb_Karakter;
use App\Models\Tb_User;
use App\Models\Tb_Raport;
use App\Models\Tb_Kenaikan;



use App\Models\Tb_Jurusan;
use App\Models\Tb_Tahun_Ajaran;
use App\Libs\Utility;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
use Illuminate\Support\Facades\Validator;
use PDF;
use App;
use Storage;
use URL;
use Session;
use Illuminate\Support\Facades\Auth;
class RaportController extends BaseController
{

    private $nip;
    private $nisn;
    private $user_type;

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
        $dt_walikelas = Tb_Walikelas::with("guru","jurusan")->get();
        $param = array(
            "dt_walikelas" => $dt_walikelas,
        );
        return view("pages/raport/index")->with($param);
    }

    public function approval_walikelas(){
        $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
        $dt_kelas = Utility::get_kelas();
        $dt_jurusan = Tb_Jurusan::whereNotIn("nama_jurusan",["Umum"])->get();
        
        $param = array(
            "dt_tahun_ajar" => $dt_tahun_ajar,
            "dt_kelas" => $dt_kelas,
            "dt_jurusan" => $dt_jurusan,
        );
        return view("pages/raport/approval_walikelas")->with($param);
    }

    public function approval_kurikulum(){
        $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
        $dt_kelas = Utility::get_kelas();
        $dt_jurusan = Tb_Jurusan::whereNotIn("nama_jurusan",["Umum"])->get();
        
        $param = array(
            "dt_tahun_ajar" => $dt_tahun_ajar,
            "dt_kelas" => $dt_kelas,
            "dt_jurusan" => $dt_jurusan,
        );
        return view("pages/raport/approval_kurikulum")->with($param);
    }

    public function approval_kepsek(){
        $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
        $dt_kelas = Utility::get_kelas();
        $dt_jurusan = Tb_Jurusan::whereNotIn("nama_jurusan",["Umum"])->get();
        
        $param = array(
            "dt_tahun_ajar" => $dt_tahun_ajar,
            "dt_kelas" => $dt_kelas,
            "dt_jurusan" => $dt_jurusan,
        );
        return view("pages/raport/approval_kepsek")->with($param);
    }

    public function lihat_raport(){
        if($this->user_type=="siswa"){
            $data_raport = Tb_Raport::where("nisn",$this->nisn)->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            $kode_jurusan = "";
            foreach($data_raport as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
                $kode_jurusan = $dn->kode_jurusan;
            }

            $dt_tahun_ajar = Tb_Tahun_Ajaran::whereIn("id_tahun_ajaran",$id_tahun_ajaran)->get();
            $dt_kelas = Utility::get_kelas();
            $dt_jurusan = Tb_Jurusan::where("kode_jurusan",$kode_jurusan)->get();
        }
        else if($this->user_type=="wali_kelas"){
            $data_raport = Tb_Raport::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            $kode_jurusan = [];
            foreach($data_raport as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
               
            }

            $data_raport = Tb_Raport::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("kode_jurusan")->get();
            foreach($data_raport as $dn){
                $kode_jurusan[] = $dn->kode_jurusan;  
            }
            $dt_tahun_ajar = Tb_Tahun_Ajaran::whereIn("id_tahun_ajaran",$id_tahun_ajaran)->get();
            $dt_kelas = Utility::get_kelas();
            $dt_jurusan = Tb_Jurusan::whereIn("kode_jurusan",$kode_jurusan)->get();
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
        return view("pages/raport/lihat_raport")->with($param);
    }

    public function get_data_walikelas(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::with(['raport' => function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);
           
            
        
        }])->where("kelas",$param['form_kelas'])
        ->where("kode_jurusan",$param['form_kode_jurusan'])
        ->where("status_siswa","aktif")
        ->get();
        $get_walikelas  = Tb_Walikelas::where("kelas",$request->get("form_kelas"))
                                       ->where("kode_jurusan",$request->get("form_kode_jurusan"))
                                       ->where("id_tahun_ajaran",$request->get("form_id_tahun_ajaran"))
                                       ->first();
        $kode_walikelas = $get_walikelas->kode_walikelas;
        $nip = $get_walikelas->nip;
        foreach($dt as &$d){
            $d->id_tahun_ajaran = $param['form_id_tahun_ajaran'];
            $d->kelas = $param['form_kelas'];
            $d->kode_jurusan = $param['form_kode_jurusan'];
            $d->semester = $param['form_semester'];
            
            
            $d->kode_walikelas = $kode_walikelas;
            $d->nip = $nip;
            
            
            $raport_id = "";
            if($d->raport!=null){
                $raport_id = $d->raport->raport_id;
            }
            $d->raport_id = $raport_id;  
            
        }
        return response()->json($dt);
    }

    public function get_data_kurikulum(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::with(['raport' => function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);  
        }])
        ->whereHas('raport',function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);
            $query->where("raport_status",'walikelas');
        })
        ->where("kelas",$param['form_kelas'])
        ->where("status_siswa","aktif")
        ->where("kode_jurusan",$param['form_kode_jurusan'])
        ->get();
        $get_walikelas  = Tb_Walikelas::where("kelas",$request->get("form_kelas"))
                                       ->where("kode_jurusan",$request->get("form_kode_jurusan"))
                                       ->where("id_tahun_ajaran",$request->get("form_id_tahun_ajaran"))
                                       ->first();
        $kode_walikelas = $get_walikelas->kode_walikelas;
        $nip = $get_walikelas->nip;
        foreach($dt as &$d){
            $d->id_tahun_ajaran = $param['form_id_tahun_ajaran'];
            $d->kelas = $param['form_kelas'];
            $d->kode_jurusan = $param['form_kode_jurusan'];
            $d->semester = $param['form_semester'];
            $d->kode_walikelas = $kode_walikelas;
            $d->nip = $nip;
            
            
            $raport_id = "";
            if($d->raport!=null){
                $raport_id = $d->raport->raport_id;
            }
            $d->raport_id = $raport_id;  
            
        }
        return response()->json($dt);
    }

    public function get_data_kepsek(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::with(['raport' => function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);  
        }])
        ->whereHas('raport',function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);
            $query->where("raport_status",'akademik');
        })
        ->where("kelas",$param['form_kelas'])
        ->where("status_siswa","aktif")
        ->where("kode_jurusan",$param['form_kode_jurusan'])
        ->get();
        $get_walikelas  = Tb_Walikelas::where("kelas",$request->get("form_kelas"))
                                       ->where("kode_jurusan",$request->get("form_kode_jurusan"))
                                       ->where("id_tahun_ajaran",$request->get("form_id_tahun_ajaran"))
                                       ->first();
        $kode_walikelas = $get_walikelas->kode_walikelas;
        $nip = $get_walikelas->nip;
        foreach($dt as &$d){
            $d->id_tahun_ajaran = $param['form_id_tahun_ajaran'];
            $d->kelas = $param['form_kelas'];
            $d->kode_jurusan = $param['form_kode_jurusan'];
            $d->semester = $param['form_semester'];
            $d->kode_walikelas = $kode_walikelas;
            $d->nip = $nip;
            
            
            $raport_id = "";
            if($d->raport!=null){
                $raport_id = $d->raport->raport_id;
            }
            $d->raport_id = $raport_id;  
            
        }
        return response()->json($dt);
    }

    public function get_data_lihat(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::with(['raport' => function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);  
        }])
        ->whereHas('raport',function($query) use($param){
            $query->where("id_tahun_ajaran",$param['form_id_tahun_ajaran']);
            $query->where("kode_jurusan",$param['form_kode_jurusan']);
            $query->where("semester",$param['form_semester']);
            $query->where("kelas",$param['form_kelas']);
            $query->where("raport_status",'kepsek');
            if($this->user_type=="siswa"){
                $query->where("nisn",$this->nisn);
            }
        })
        ->where("kelas",$param['form_kelas'])
                        ->where("kode_jurusan",$param['form_kode_jurusan'])
                        ->get();
        $get_walikelas  = Tb_Walikelas::where("kelas",$request->get("form_kelas"))
                                       ->where("kode_jurusan",$request->get("form_kode_jurusan"))
                                       ->where("id_tahun_ajaran",$request->get("form_id_tahun_ajaran"))
                                       ->first();
        $kode_walikelas = $get_walikelas->kode_walikelas;
        $nip = $get_walikelas->nip;
        foreach($dt as &$d){
            $d->id_tahun_ajaran = $param['form_id_tahun_ajaran'];
            $d->kelas = $param['form_kelas'];
            $d->kode_jurusan = $param['form_kode_jurusan'];
            $d->semester = $param['form_semester'];
            $d->kode_walikelas = $kode_walikelas;
            $d->nip = $nip;
            
            
            $raport_id = "";
            if($d->raport!=null){
                $raport_id = $d->raport->raport_id;
            }
            $d->raport_id = $raport_id;  
            
        }
        return response()->json($dt);
    }

    public function cetak(Request $request){
        $img_path = public_path().'/img/logo.jpeg';
        $id_tahun_pelajaran = $request->get("id_tahun_pelajaran");
        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $extencion = pathinfo($img_path, PATHINFO_EXTENSION);
        $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
        $img_base_64 = base64_encode($data);
        $logo = 'data:image/' . $extencion . ';base64,' . $img_base_64;

        $data_siswa = Tb_Siswa::where("nisn",$request->get("nisn"))->first();
        $semester = $request->get("semester");
        $param = $request->all();
        $dt_nilai_a = Tb_Nilai::with(['mapel'])->where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("mapel",function($query){
                            $query->where("kode_muatan",1);
                        })
                        ->get();
        $dt_nilai_b = Tb_Nilai::with(['mapel'])->where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("mapel",function($query){
                            $query->where("kode_muatan",2);
                        })
                        ->get();
        $dt_nilai_c1 = Tb_Nilai::with(['mapel'])->where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("mapel",function($query){
                            $query->where("kode_muatan",3);
                            $query->where("kode_submuatan",1);
                        })
                        ->get();
        $dt_nilai_c2 = Tb_Nilai::with(['mapel'])->where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("mapel",function($query){
                            $query->where("kode_muatan",3);
                            $query->where("kode_submuatan",2);
                        })
                        ->get();
        $dt_nilai_c3 = Tb_Nilai::with(['mapel'])->where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("mapel",function($query){
                            $query->where("kode_muatan",3);
                            $query->where("kode_submuatan",3);
                        })
                        ->get();

         $dt_kenaikan = Tb_Kenaikan::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
         
         $dt_akademik = Tb_Akademik::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
         $dt_pkl = Tb_Pkl::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
        $dt_eskul = Tb_Ekstrakurikuler::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->get();
        $dt_kehadiran = Tb_Kehadiran::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
        $dt_deskripsi = Tb_Deskripsi_Karakter::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
        $dt_karakter = Tb_Karakter::where("nisn",$param['nisn'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("semester",$param['semester'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
        $dt_walikelas = Tb_Walikelas::with(["guru"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->first();
        $dt_kepsek=    Tb_User::with(["guru"])
                        ->where("user_type","kepala_sekolah")
                        ->first();

        $param = array(
            "logo" => $logo,
            "data_siswa" => $data_siswa,
            "semester" => $semester,
            "dt_nilai_a" => $dt_nilai_a,
            "dt_nilai_b" => $dt_nilai_b,
            "dt_nilai_c1" => $dt_nilai_c1,
            "dt_nilai_c2" => $dt_nilai_c2,
            "dt_nilai_c3" => $dt_nilai_c3,
            "dt_kenaikan" => $dt_kenaikan,
            "dt_akademik" => $dt_akademik,
            "dt_pkl" => $dt_pkl,
            "dt_eskul" => $dt_eskul,
            "dt_kehadiran" => $dt_kehadiran,
            "dt_deskripsi" => $dt_deskripsi,
            "dt_karakter" => $dt_karakter,
            "dt_walikelas" => $dt_walikelas,
            "dt_kepsek" => $dt_kepsek,
            
        );
        
        $pdf = PDF::loadView('pages/raport/format_raport',$param);
        $fileName = $request->get("nisn").'_raport_'.time().'.pdf';
        return $pdf->stream();

        
    }

    public function approve_raport(Request $request){
       
        $type = $request->get("type");
        $id_tahun_pelajaran = $request->get("id_tahun_ajaran");
        $semester = $request->get("semester");
        $kode_jurusan = $request->get("kode_jurusan");
        $nisn = $request->get("nisn");
        $raport_id = $request->get("raport_id");
        $kode_walikelas = $request->get("kode_walikelas");
        $kelas = $request->get("kelas");
        $nip = $request->get("nip");

        $auth = Session::get("auth");
        $user_id = $auth['user_conid'];
        
        $index = 0;
        foreach($id_tahun_pelajaran as $idt){
            $param_data = array(
                "id_tahun_ajaran" => $idt,
                "nisn" => $nisn[$index],
                "kode_jurusan" => $kode_jurusan[$index],
                "semester" => $semester[$index],
                "kelas" => $kelas[$index],
                "kode_walikelas" => $kode_walikelas[$index]
            );

            if(strlen($raport_id[$index])<1){
                 if($type=="walikelas"){
                    $param_data['approve_walikelas'] = $nip[$index];
                    $param_data['approve_walikelas_date'] = date("Y-m-d H:i:s");
                    $param_data['raport_status'] ="walikelas";
                    Tb_Raport::create($param_data);
                 }
            }
            else{
                if($type=="akademik"){
                    $param_data['approve_akademik'] = $user_id;
                    $param_data['approve_akademik_date'] = date("Y-m-d H:i:s");
                    $param_data['raport_status'] ="akademik";
                }
                else if($type=="kepsek"){
                    $param_data['approve_kepsek'] = $user_id;
                    $param_data['approve_kepsek_date'] = date("Y-m-d H:i:s");
                    $param_data['raport_status'] ="kepsek";
                }
                Tb_Raport::where("raport_id",$raport_id[$index])->update($param_data);
            }

            if($type=="kepsek"){
                $semester_req = $param_data['semester'];
                if($semester_req=="II"){
                    $check_data = Tb_Kenaikan::where("nisn",$param_data['nisn'])
                                  ->where("semester",$semester_req)
                                  ->where("id_tahun_ajaran",$param_data['id_tahun_ajaran'])
                                  ->where("kode_jurusan",$param_data['kode_jurusan'])
                                  ->where("kelas",$param_data['kelas'])      
                                  ->first();
                    if($check_data){
                        if($check_data->status="naik"){
                            $prx_update = array(
                                "kelas" => "XI"
                            );
                            Tb_Siswa::where("nisn",$param_data['nisn'])->update($prx_update);
                        }
                    }
                }
                else if($semester_req=="IV"){
                    $check_data = Tb_Kenaikan::where("nisn",$param_data['nisn'])
                                  ->where("semester",$semester_req)
                                  ->where("id_tahun_ajaran",$param_data['id_tahun_ajaran'])
                                  ->where("kode_jurusan",$param_data['kode_jurusan'])
                                  ->where("kelas",$param_data['kelas'])      
                                  ->first();
                    if($check_data){
                        if($check_data->status="naik"){
                            $prx_update = array(
                                "kelas" => "XII"
                            );
                            Tb_Siswa::where("nisn",$param_data['nisn'])->update($prx_update);
                        }
                    }
                }
                else if($semester_req=="VI"){
                    $check_data = Tb_Kenaikan::where("nisn",$param_data['nisn'])
                                  ->where("semester",$semester_req)
                                  ->where("id_tahun_ajaran",$param_data['id_tahun_ajaran'])
                                  ->where("kode_jurusan",$param_data['kode_jurusan'])
                                  ->where("kelas",$param_data['kelas'])      
                                  ->first();
                    if($check_data){
                        if($check_data->status="lulus"){
                            $prx_update = array(
                                "kelas" => "XII",
                                "status_siswa" => "lulus"
                            );
                            Tb_Siswa::where("nisn",$param_data['nisn'])->update($prx_update);
                        }
                    }
                }
            }

            $index++;
        }
        
    }


   
    
    
}


