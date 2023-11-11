<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
use App\Models\Tb_Tahun_Ajaran;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Libs\FileUpload;

use PDF;
use App;
use URL;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pages'     => 'required',
            'id_tahun_ajaran' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'kode_jurusan' => 'required'
        ]);

        if($validator->fails()) {
            $response = array(
                "success" => false,
                "message" => $validator->errors()
            );
            return response()->json($response, 500);
        }

        $limit = 10;
        if(strlen($request->get("limit"))>0){
            $limit = $request->get("limit");
        }
        $page = $request->get("pages");
        $ofset = ($page - 1) * $limit;
        
        $search = [];
        $param = $request->except("pages","limit","id_tahun_ajaran","semester");
        /*if(count($param) > 0){
            foreach($param as $key => $value){
                if(!empty($value)){
                    array_push($search, [$key, 'LIKE' , '%'.$value.'%']);
                }
            }
        }*/
        $user_type = Auth::guard('api')->user()->user_type;
       
        if($user_type=="siswa"){
             $user_conid = Auth::guard('api')->user()->user_conid;
            array_push($search, ["nisn", '=' , $user_conid]);
        }

        $param  = $request->all();
        $data = Tb_Siswa::with(["jurusan"])
               ->whereHas("raport",function($query) use($param,$user_type){
                    $query->where("id_tahun_ajaran",$param['id_tahun_ajaran']);
                    $query->where("kode_jurusan",$param['kode_jurusan']);
                    $query->where("semester",$param['semester']);
                    $query->where("kelas",$param['kelas']);

                    if($user_type=="siswa"){
                         $query->where("raport_status",'kepsek');
                    }
                    
                })
                ->where($search)
                ->skip($ofset)
                ->limit($limit)
                ->orderBy('nama_peserta_didik', 'ASC')->get();

        if (count($data) > 0) {
            $data_tahun = Tb_Tahun_Ajaran::where("id_tahun_ajaran",$request->get("id_tahun_ajaran"))->first();

            foreach($data as &$d){
                $d->photo =  FileUpload::GetFile("siswa",$d->photo);
                $d->id_tahun_ajaran =  $request->get("id_tahun_ajaran");
                $d->semester =  $request->get("semester");
                $d->tahun = $data_tahun;
                
            }

            $response = [
                "success" => true,
                "data" => $data
            ];
        } else {
            $response = [
                "success" => false,
                "message" => 'Data yang dicari tidak ada/kosong!'
            ];
        }
        return response()->json($response, 200);
    }

    public function detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tahun_ajaran' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'kode_jurusan' => 'required',
            'nisn' => 'required'
        ]);

        if($validator->fails()) {
            $response = array(
                "success" => false,
                "message" => $validator->errors()
            );
            return response()->json($response, 500);
        }

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
        $path = 'storage/raport/';
        $pdf->save($path  . $fileName);

        $data = array();
        $response = [
            "success" => true,
            "data" =>  FileUpload::GetFile("raport",$fileName)
        ];
        return response()->json($response, 200);
    }

    public function view(Request $request){
        $url = $request->get("url");
        $param = array(
            "url" => $url
        );
        return view("pages/raport/view")->with($param);
    }

    
}
