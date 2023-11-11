<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Tb_Tahun_Ajaran;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Libs\FileUpload;

class NilaiController extends Controller
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
               ->whereHas("nilai",function($query) use($param){
                    $query->where("id_tahun_ajaran",$param['id_tahun_ajaran']);
                    $query->where("kode_jurusan",$param['kode_jurusan']);
                    $query->where("semester",$param['semester']);
                    $query->where("kelas",$param['kelas']);
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
                $d->tahun = $data_tahun;
                
                $d->semester =  $request->get("semester");
                
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

        $param = $request->all();

         $data_nilai_akademik = Tb_Nilai::with(["mapel"])
            ->where("id_tahun_ajaran",$param['id_tahun_ajaran'])
            ->where("kelas",$param['kelas'])
            ->whereHas("siswa",function($query) use($param){
                $query->where("nisn",$param['nisn']);
            })
            ->where("kode_jurusan",$param['kode_jurusan'])
            ->where("semester",$param['semester'])
            ->get();

        foreach($data_nilai_akademik as &$dn){
            $keterangan = "Tidak Lulus";
            if($dn->nilai_akhir >= $dn->kkm){
                $keterangan = "Lulus";
            }
            $dn->keterangan = $keterangan;
        }

        $data_kehadiran = Tb_Kehadiran::where("id_tahun_ajaran",$param['id_tahun_ajaran'])
        ->where("kelas",$param['kelas'])
        ->where("kode_jurusan",$param['kode_jurusan'])
        ->whereHas("siswa",function($query) use($param){
                $query->where("nisn",$param['nisn']);
         })
        ->where("semester",$param['semester'])
        ->first();

         $data_catatan_karakter = Tb_Karakter::where("id_tahun_ajaran",$param['id_tahun_ajaran'])
        ->where("kelas",$param['kelas'])
        ->where("kode_jurusan",$param['kode_jurusan'])
        ->whereHas("siswa",function($query) use($param){
                $query->where("nisn",$param['nisn']);
         })
        ->where("semester",$param['semester'])
        ->first();

        $data_deskripsi_karakter = Tb_Deskripsi_Karakter::where("id_tahun_ajaran",$param['id_tahun_ajaran'])
        ->where("kelas",$param['kelas'])
        ->where("kode_jurusan",$param['kode_jurusan'])
        ->whereHas("siswa",function($query) use($param){
                $query->where("nisn",$param['nisn']);
        })
        ->where("semester",$param['semester'])
        ->first();

         $data_catatan_akademik = Tb_Akademik::where("id_tahun_ajaran",$param['id_tahun_ajaran'])
        ->where("kelas",$param['kelas'])
        ->where("kode_jurusan",$param['kode_jurusan'])
        ->whereHas("siswa",function($query) use($param){
                $query->where("nisn",$param['nisn']);
        })
        ->where("semester",$param['semester'])
        ->first();

        $data_pkl = Tb_Pkl::where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query) use($param){
                                $query->where("nisn",$param['nisn']);
                        })
                        ->where("semester",$param['semester'])
                        ->get();
        $data_eskul = Tb_Ekstrakurikuler::where("id_tahun_ajaran",$param['id_tahun_ajaran'])
                        ->where("kelas",$param['kelas'])
                        ->where("kode_jurusan",$param['kode_jurusan'])
                        ->whereHas("siswa",function($query) use($param){
                                $query->where("nisn",$param['nisn']);
                        })
                        ->where("semester",$param['semester'])
                        ->get();

        $data = [
            "data_nilai" => $data_nilai_akademik,
            "data_kehadiran" => $data_kehadiran,
            "data_catatan_karakter" => $data_catatan_karakter,
            "data_deskripsi_karakter" => $data_deskripsi_karakter,
            "data_catatan_akademik" => $data_catatan_akademik,
            "data_pkl" => $data_pkl,
            "data_eskul" => $data_eskul
        ];

        $response = [
            "success" => true,
            "data" => $data
        ];
        return response()->json($response, 200);
    }

    
}
