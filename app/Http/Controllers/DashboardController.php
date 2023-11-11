<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Tb_Siswa;
use App\Models\Tb_Guru;


class DashboardController extends BaseController
{
    public function index(){
       $data_siswa = Tb_Siswa::where("status_siswa","aktif")->count();
       $data_siswa_lulus = Tb_Siswa::where("status_siswa","lulus")->count();
       $data_guru = Tb_Guru::count();
       $param = array(
        "data_siswa" => $data_siswa,
        "data_siswa_lulus" => $data_siswa_lulus,
        "data_guru" => $data_guru
        
       );
       return view("pages/dashboard/index")->with($param);
       // return view("pages/auth/login")->with($param);
    }
}
