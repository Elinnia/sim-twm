<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Tb_Tahun_Ajaran;
use App\Models\Tb_Jurusan;
use App\Models\Tb_Kalender;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Libs\Utility;

class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tahun_ajaran(Request $request)
    {
       
        $data = Tb_Tahun_Ajaran::orderBy('id_tahun_ajaran', 'DESC')->get();
        $response = [
            "success" => true,
            "data" => $data
        ];
        return response()->json($response, 200);
    }

    public function kelas(Request $request)
    {
       
        $data = Utility::get_kelas();
        $response = [
            "success" => true,
            "data" => $data
        ];
        return response()->json($response, 200);
    }

    public function semester(Request $request)
    {
        $semester_data = array();
        $kelas = $request->get("kelas");
        if($kelas=="X"){
            $semester_data[] = "I";
            $semester_data[] = "II";
        }
        else if($kelas=="XI"){
            $semester_data[] = "III";
            $semester_data[] = "IV";
        }
        else if($kelas=="XII"){
            $semester_data[] = "V";
            $semester_data[] = "VI";
        }
       
        
        $response = [
            "success" => true,
            "data" => $semester_data
        ];
        return response()->json($response, 200);
    }

    public function jurusan(Request $request)
    {
        $data = Tb_Jurusan::whereNotIn("kode_jurusan",[1])->get();
       
        
        $response = [
            "success" => true,
            "data" => $data
        ];
        return response()->json($response, 200);
    }

    public function kalender(Request $request){
        $data = Tb_Kalender::whereMonth("kalender_date",$request->get("bulan"))
        ->whereYear("kalender_date",$request->get("tahun"))
        ->orderBy("kalender_date","ASC")
        ->get();

        foreach($data as &$d){
            $d->kalendar_int = strtotime($d->kalender_date);
        }
       
        
        $response = [
            "success" => true,
            "data" => $data
        ];
        return response()->json($response, 200);
    }
}
