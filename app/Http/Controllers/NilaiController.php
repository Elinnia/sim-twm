<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Nilai;
use App\Models\Tb_Walikelas;
use App\Models\Tb_Mapel;
use App\Models\Tb_Siswa;
use App\Models\Tb_Jurusan;
use App\Models\Tb_Akademik;
use App\Models\Tb_Pkl;
use App\Models\Tb_Ekstrakurikuler;
use App\Models\Tb_Kehadiran;
use App\Models\Tb_Karakter;
use App\Models\Tb_Deskripsi_Karakter;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
use App\Models\Tb_Guru;
use App\Models\Tb_Tahun_Ajaran;
use App\Libs\Utility;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class NilaiController extends BaseController
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
            $data_nilai = Tb_Nilai::whereIn("kode_walikelas",$this->kode_walikelas)
            ->groupBy("id_tahun_ajaran")->get();

            $id_tahun_ajaran = [];
            foreach($data_nilai as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
            }

             $data_nilai = Tb_Nilai::whereIn("kode_walikelas",$this->kode_walikelas)
            ->groupBy("kode_jurusan")->get();

            $kode_jurusan = [];
            foreach($data_nilai as $dn){
                $kode_jurusan[] = $dn->kode_jurusan;
            }

             $data_nilai = Tb_Nilai::whereIn("kode_walikelas",$this->kode_walikelas)
            ->groupBy("nip")->get();

            $nip = [];
            foreach($data_nilai as $dn){
                $nip[] = $dn->nip;
            }

            

            $dt_guru = Tb_Guru::whereIn("nip",$nip)->get();
            $dt_tahun_ajar  = Tb_Tahun_Ajaran::whereIn("id_tahun_ajaran",$id_tahun_ajaran)->get();
            $dt_jurusan  = Tb_Jurusan::whereNotIn("kode_jurusan",[1])->get();
            $dt_kelas = Utility::get_kelas();
            $auth = Session::get("auth");
            $user_type = $auth['user_type'];
        }
        else{
            $dt_guru = Tb_Guru::get();
            $dt_tahun_ajar  = Tb_Tahun_Ajaran::get();
            $dt_jurusan  = Tb_Jurusan::whereNotIn("kode_jurusan",[1])->get();
            $dt_kelas = Utility::get_kelas();
            $auth = Session::get("auth");
            $user_type = $auth['user_type'];
        }
        
        
       
        $param = array(
            "dt_guru" => $dt_guru,
            "user_type" => $user_type,
            "dt_tahun_ajar" => $dt_tahun_ajar,
            "dt_jurusan" => $dt_jurusan,
            "dt_kelas" => $dt_kelas,
            "nip" => $this->nip
            
        );
        return view("pages/nilai/index")->with($param);
    }

    public function lihat(Request $request){
       $auth = Session::get("auth");
       $user_type = $auth['user_type'];
       if($user_type=="siswa"){
            $data_nilai = Tb_Nilai::where("nisn",$auth['user_conid'])->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            foreach($data_nilai as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
            }
            $data_nilai = Tb_Nilai::where("nisn",$auth['user_conid'])->groupBy("kode_jurusan")->get();
            $kode_jurusan = [];
            foreach($data_nilai as $dn){
                $kode_jurusan[] = $dn->kode_jurusan;
            }
        
            $dt_tahun_ajar  = Tb_Tahun_Ajaran::whereIn("id_tahun_ajaran",$id_tahun_ajaran)->get();
            $dt_jurusan  = Tb_Jurusan::whereIn("kode_jurusan",$kode_jurusan)->get();
            $dt_kelas = Utility::get_kelas();
        }
        else if($this->user_type=="wali_kelas"){
           
            $data_nilai = Tb_Nilai::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("id_tahun_ajaran")->get();
            $id_tahun_ajaran = [];
            foreach($data_nilai as $dn){
                $id_tahun_ajaran[] = $dn->id_tahun_ajaran;
            }
            $data_nilai = Tb_Nilai::whereIn("kode_walikelas",$this->kode_walikelas)->groupBy("kode_jurusan")->get();
            $kode_jurusan = [];
            foreach($data_nilai as $dn){
                $kode_jurusan[] = $dn->kode_jurusan;
            }
        
            $dt_tahun_ajar  = Tb_Tahun_Ajaran::whereIn("id_tahun_ajaran",$id_tahun_ajaran)->get();
            $dt_jurusan  = Tb_Jurusan::whereIn("kode_jurusan",$kode_jurusan)->get();
            $dt_kelas = Utility::get_kelas();
        }
        else{
            
            $dt_tahun_ajar  = Tb_Tahun_Ajaran::get();
            $dt_jurusan  = Tb_Jurusan::whereNotIn("kode_jurusan",[1])->get();
            $dt_kelas = Utility::get_kelas();
        }
        $param = array(
            "dt_tahun_ajar" => $dt_tahun_ajar,
            "dt_jurusan" => $dt_jurusan,
            "dt_kelas" => $dt_kelas
        );
         return view("pages/nilai/lihat_nilai")->with($param);
    }

    public function get_data_lihat(Request $request){
        $param = $request->all();

        $data_mapel = Tb_Mapel::where(function($query) use($request){
                                    if($this->nip!=null){
                                        $query->where("nip",$this->nip);
                                    }
                                    $query->where("kode_jurusan",$request->get("kode_jurusan"))
                                          ->orwhere("kode_jurusan","1");
                                })
                                ->where("kelas",$request->get("kelas"))
                                ->get();
         
        $data_nilai_akademik = Tb_Nilai::with(["siswa","mapel"])
                                ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                                ->where("kelas",$param['kelas'])
                                ->whereHas("siswa",function($query){
                                    if($this->user_type=="siswa"){
                                        $query->where("nisn",$this->nisn);
                                    }
                                })
                                ->where("kode_jurusan",$param['kode_jurusan'])
                                ->where("semester",$param['semester'])
                                ->get();
        
        $data_catatan_akademik = Tb_Akademik::with(["siswa"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query){
                            if($this->user_type=="siswa"){
                                $query->where("nisn",$this->nisn);
                            }
                        })
                        ->where("semester",$param['semester'])
                        ->get();
        $data_pkl = Tb_Pkl::with(["siswa"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query){
                            if($this->user_type=="siswa"){
                                $query->where("nisn",$this->nisn);
                            }
                        })
                        ->where("semester",$param['semester'])
                        ->get();
        $data_eskul = Tb_Ekstrakurikuler::with(["siswa"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query){
                            if($this->user_type=="siswa"){
                                $query->where("nisn",$this->nisn);
                            }
                        })
                        ->where("semester",$param['semester'])
                        ->get();
        $data_kehadiran = Tb_Kehadiran::with(["siswa"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query){
                            if($this->user_type=="siswa"){
                                $query->where("nisn",$this->nisn);
                            }
                        })
                        ->where("semester",$param['semester'])
                        ->get();
        $data_catatan_karakter = Tb_Karakter::with(["siswa"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query){
                            if($this->user_type=="siswa"){
                                $query->where("nisn",$this->nisn);
                            }
                        })
                        ->where("semester",$param['semester'])
                        ->get();
        $data_deskripsi_karakter = Tb_Deskripsi_Karakter::with(["siswa"])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query){
                            if($this->user_type=="siswa"){
                                $query->where("nisn",$this->nisn);
                            }
                        })
                        ->where("semester",$param['semester'])
                        ->get();
       
               
        $param = array(
            "data_mapel" => $data_mapel,
            "data_nilai_akademik" => $data_nilai_akademik,
            "data_catatan_akademik" => $data_catatan_akademik,
            "data_pkl" => $data_pkl,
            "data_eskul" => $data_eskul,
            "data_kehadiran" => $data_kehadiran,
            "data_catatan_karakter" => $data_catatan_karakter,
            "data_deskripsi_karakter" => $data_deskripsi_karakter,
            "nip" => $this->nip,
        );
         return view("pages/nilai/get_data_lihat")->with($param);
    }

    public function get_mapel(Request $request){
        $param = $request->except("pages","limit");
        $data = Tb_Mapel::where('nip', $request->nip)->get();
        return $data;

    }

    public function get_data(Request $request){
        $param = $request->all();
        $dt = Tb_Siswa::where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->where("status_siswa","aktif")
                        ->get();
        foreach($dt as &$d){
            $dt_nilai = Tb_Nilai::where("nisn",$d->nisn)
                        ->where("kode_mapel",$param['kode_mapel'])
                        ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        
                        ->where("semester",$param['semester'])
                        
                        ->first();
            $nilai_pengetahuan = 0;
            $nilai_keterampilan = 0;
            $nilai_tugas = 0;
            $nilai_uts = 0;
            $nilai_uas = 0;
            $nilai_akhir = 0;
            $predikat  = "E";
            $kode_nilai = "";
            if($dt_nilai==true){
                $kode_nilai = $dt_nilai->kode_nilai;
                $nilai_tugas = $dt_nilai->nilai_tugas;
                $nilai_uts = $dt_nilai->nilai_uts;
                $nilai_uas = $dt_nilai->nilai_uas;
                

                $nilai_pengetahuan = $dt_nilai->nilai_pengetahuan;
                $nilai_keterampilan = $dt_nilai->nilai_keterampilan;
                $nilai_akhir = ($nilai_pengetahuan+$nilai_keterampilan)/2;
                if($nilai_akhir>=86 && $nilai_akhir<=100){
                   $predikat = "A";
                }
                else if($nilai_akhir>=75 && $nilai_akhir<=85){
                   $predikat = "B";
                }
                else if($nilai_akhir>=60 && $nilai_akhir<=74){
                   $predikat = "C";
                }
                else if($nilai_akhir>=45 && $nilai_akhir<=60){
                   $predikat = "D";
                }
                else{
                    $predikat = "E";
                }
            }
            $d->nilai_pengetahuan = round($nilai_pengetahuan,2);
            $d->nilai_keterampilan = $nilai_keterampilan;
            $d->nilai_tugas = $nilai_tugas;
            $d->nilai_uts = $nilai_uts;
            $d->nilai_uas = $nilai_uas;
            
            $d->nilai_akhir = round($nilai_akhir,2);
            $d->predikat = $predikat;
            $d->kode_nilai = $kode_nilai;
        }
        return response()->json($dt);
    }

    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Nilai::where("kode_nilai",$id)->first();
            $param = array(
                "kode_nilai" => $data->kode_nilai,
                "tahun_ajaran" => $data->tahun_ajaran,
                "semester" => $data->semester,
                "nisn" => $data->nisn,
                "kode_mapel" => $data->kode_mapel,
                "kkm" => $data->kkm,
                "nilai_pengetahuan" => $data->nilai_pengetahuan,
                "nilai_keterampilan" => $data->nilai_keterampilan,
                "nilai_akhir" => $data->nilai_akhir,
                "predikat" => $data->predikat,
                "url" => route('nilai.edit',$data->kode_nilai)
            );
        }
        else{
            //untuk insert
            $param = array(
                "kode_nilai" => "",
                "tahun_ajaran" => "",
                "semester" => "",
                "nisn" => "",
                "kode_mapel" => "",
                "kkm" => "",
                "nilai_pengetahuan" => "",
                "nilai_keterampilan" => "",
                "nilai_akhir" => "",
                "predikat" => "",
                "url" => route('nilai.store')
            );
        }
        return view("pages/nilai/form_nilai")->with($param);
    }

    public function store(Request $request){
       $param = $request->all();
       $validator = Validator::make($param, [
            'nisn' => 'required', 
            'kode_mapel' => 'required', 
            'nip' => 'required',
            'kkm' => 'required',
            'id_tahun_ajaran' => 'required',

        ]);
        if($validator->fails()) {
            return response()->json(['success' => 0, 'message' => 'Validation Error ', 'errors' => $validator->errors()], 400);
        }
       $nisn = $param['nisn'];
       $kode_mapel = $request->get("kode_mapel");
       
       $nip = $request->get("nip");
       $dt_mapel = Tb_Mapel::with("guru")->where("nip",$nip)->first();
       $kode_guru = $dt_mapel['guru']->nip;
       $id_tahun_ajaran = $request->get("id_tahun_ajaran");
       $semester = $request->get("semester");
       $kkm = $request->get("kkm");    
       $kelas = $request->get("kelas");
       $kode_jurusan = $request->get("kode_jurusan");

       $get_walikelas  = Tb_Walikelas::where("kelas",$request->get("kelas"))
                                       ->where("kode_jurusan",$request->get("kode_jurusan"))
                                       ->where("id_tahun_ajaran",$request->get("id_tahun_ajaran"))
                                       ->first();
       $kode_walikelas = $get_walikelas->kode_walikelas;

          
       $i = 0;
       foreach ($nisn as $n) {
            
            $nilai_tugas = $param['nilai_tugas'][$i];
            if(strlen($nilai_tugas)<1){
                $nilai_tugas = 0;
            }

            $nilai_uts = $param['nilai_uts'][$i];
            if(strlen($nilai_uts)<1){
                $nilai_uts = 0;
            }

            $nilai_uas = $param['nilai_uas'][$i];
            if(strlen($nilai_uas)<1){
                $nilai_uas = 0;
            }

            $nilai_pengetahuan = $param['nilai_pengetahuan'][$i];
            if(strlen($nilai_pengetahuan)<1){
                $nilai_pengetahuan = 0;
            }
            $nilai_keterampilan = $param['nilai_keterampilan'][$i];
            if(strlen($nilai_keterampilan)<1){
                $nilai_keterampilan = 0;
            }
            $nilai_akhir = $param['nilai_akhir'][$i];
            if(strlen($nilai_akhir)<1){
                $nilai_akhir = 0;
            }
            $predikat = $param['predikat'][$i];
            if(strlen($predikat)<1){
                $predikat = "E";
            }
            
            $kode_nilai = $param['kode_nilai'][$i];
           
            if(strlen($kode_nilai)<1){

                $p = array(
                    "nip" => $nip,
                    "nisn" => $n,
                    "kode_walikelas" => $kode_walikelas,
                    "kode_mapel" => $kode_mapel,
                    "id_tahun_ajaran" => $id_tahun_ajaran,
                    "kelas" => $kelas,
                    "kode_jurusan" => $kode_jurusan,
                    "semester" => $semester,
                    "kkm" => $kkm,
                    "nilai_tugas" => $nilai_tugas,
                    "nilai_uts" => $nilai_uts,
                    "nilai_uas" => $nilai_uas,
                    
                    "nilai_pengetahuan" => $nilai_pengetahuan,
                    "nilai_keterampilan" => $nilai_keterampilan,
                    "nilai_akhir" => $nilai_akhir,
                    "predikat" => $predikat
                );

               Tb_Nilai::create($p);
            }
            else{
               // echo "MASUK";
                $p = array(
                    "nip" => $nip,
                    "nisn" => $n,
                    "kode_walikelas" => $kode_walikelas,
                    "kode_mapel" => $kode_mapel,
                    "id_tahun_ajaran" => $id_tahun_ajaran,
                    "kelas" => $kelas,
                    "kode_jurusan" => $kode_jurusan,
                    "semester" => $semester,
                    "kkm" => $kkm,
                    "nilai_tugas" => $nilai_tugas,
                    "nilai_uts" => $nilai_uts,
                    "nilai_uas" => $nilai_uas,

                    "nilai_pengetahuan" => $nilai_pengetahuan,
                    "nilai_keterampilan" => $nilai_keterampilan,
                    "nilai_akhir" => $nilai_akhir,
                    "predikat" => $predikat
                );

                Tb_Nilai::where("kode_nilai",$kode_nilai)->update($p);
            }

            
            $i++;
       }
       
       //return redirect('/nilai');
    }
    public function delete($id){
        Tb_Nilai::where("kode_nilai",$id)->delete();
        return redirect('/nilai');
    }
    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Nilai::where("kode_nilai",$id)->first();
        if($data){
            $data->kode_nilai = $request->get("kode_nilai");
            $data->tahun_ajaran = $request->get("tahun_ajaran");
            $data->semester = $request->get("semester");
            $data->nisn = $request->get("nisn");
            $data->kode_mapel = $request->get("kode_mapel");
            $data->kkm = $request->get("kkm");
            $data->nilai_pengetahuan = $request->get("nilai_pengetahuan");
            $data->nilai_keterampilan = $request->get("nilai_keterampilan"); 
            $data->nilai_akhir = $request->get("nilai_akhir");   
            $data->predikat = $request->get("predikat");
            $data->save();
        }
        return redirect('/nilai');
}
}