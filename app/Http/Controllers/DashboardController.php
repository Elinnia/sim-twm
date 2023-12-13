<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tb_Siswa;
use App\Models\Tb_Guru;
use App\Models\Tb_Profil;
use App\Models\Tb_Kalender;
use App\Models\Tb_Tahun_Ajaran;

use Illuminate\Support\Facades\DB;



class DashboardController extends BaseController
{
    public function index(){
       $data_siswa = Tb_Siswa::where("status_siswa","aktif")->count();
       $data_siswa_lulus = Tb_Siswa::where("status_siswa","lulus")->count();
       $data_guru = Tb_Guru::count();
       $data_profil = Tb_Profil::first();
       $data_tahun = Tb_Tahun_Ajaran::OrderBy("id_tahun_ajaran","DESC")->first();
       $data_nilai_akhir = DB::select('select nisn,AVG(nilai_akhir)as nilai_rata,MAX(nilai_akhir)as nilai_tinggi from tb_nilai_akademik WHERE id_tahun_ajaran="'.$data_tahun->id_tahun_ajaran.'" GROUP BY nisn ORDER BY AVG(nilai_akhir) DESC LIMIT 1');
       $data_siswa_terbaik = null;
       if(count($data_nilai_akhir)>0){
        $nisn = $data_nilai_akhir[0]->nisn;
        $data_siswa_terbaik = Tb_Siswa::with("jurusan")->where("nisn",$nisn)->first();
        $data_siswa_terbaik->nilai_rata = number_format( $data_nilai_akhir[0]->nilai_rata,2);
        $data_siswa_terbaik->nilai_tinggi = number_format( $data_nilai_akhir[0]->nilai_tinggi,2);
        
        
       }

       $param = array(
        "data_siswa" => $data_siswa,
        "data_siswa_lulus" => $data_siswa_lulus,
        "data_guru" => $data_guru,
        "data_profil" => $data_profil,
        "data_siswa_terbaik" => $data_siswa_terbaik 
        
       );
       return view("pages/dashboard/index")->with($param);
       // return view("pages/auth/login")->with($param);
    }

    public function get_calendar(Request $request){
       $month = $request->get("month");
       $year = $request->get("year");
       
       $data  = Tb_Kalender::whereMonth("kalender_date",$month)
                             ->whereYear("kalender_date",$year)
                             ->orderBy("kalender_date","ASC")
                             ->get();
        $resp_data = array();
        foreach($data as $d){
            $p = array(
                "title" => $d->kalender_deskripsi,
                "start" => $d->kalender_date,
                "end" => $d->kalender_date,
                "dates" => $d->kalender_date
            );
            $resp_data[] = $p;
        }

        return response()->json($resp_data,200);


    }
}
