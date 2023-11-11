<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Walikelas;
use App\Models\Tb_Tahun_Ajaran;
use App\Models\Tb_Jurusan;
use App\Models\Tb_Guru;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
use App\Libs\Utility;

class WalikelasController extends BaseController
{
    public function index(){
        $data = Tb_Walikelas::with(["guru","tahun_ajar","jurusan"])->get();
        $param = array(
            "data" => $data
        );
        return view("pages/walikelas/walikelas")->with($param);
    }

    public function form($id){
        $param = array();
        $dt_guru = Tb_Guru::get();
        $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
        $dt_kelas = Utility::get_kelas();
        $dt_jurusan = Tb_Jurusan::whereNotIn("nama_jurusan",["umum"])->get();
        if($id!="create"){
            // untuk edit
            $data = Tb_Walikelas::where("kode_walikelas",$id)->first();
            $param = array(
                "dt_guru" => $dt_guru,
                "kode_walikelas" => $data->kode_walikelas,
                "nip" => $data->nip,
                "kode_jurusan" => $data->kode_jurusan,
                "kelas" => $data->kelas,
                "id_tahun_ajaran" => $data->id_tahun_ajaran,
                "url" => route('walikelas.edit',$data->kode_walikelas)
            );
        }
        else{
            //untuk insert
             $param = array(
                "dt_guru" => $dt_guru,
                "kode_walikelas" => "",
                "nip" => "",
                "kode_jurusan" => "",
                "kelas" => "",
                "id_tahun_ajaran" =>"",
                "url" => route('walikelas.store')
            );
        }
        $param['dt_tahun_ajar'] = $dt_tahun_ajar;
        $param['dt_jurusan'] = $dt_jurusan;
        $param['dt_kelas'] = $dt_kelas;
        
        return view("pages/walikelas/form_walikelas")->with($param);
    }

    public function store(Request $request){
       $param = $request->all();
       Tb_Walikelas::create($param);
       return redirect('/walikelas');
    }
    public function delete($id){
        Tb_Walikelas::where("kode_walikelas",$id)->delete();
        return redirect('/walikelas');
    }

    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Walikelas::where("kode_walikelas",$id)->first();
        if($data){
            $data->nip =$request->get("nip");
            $data->kode_jurusan = $request->get("kode_jurusan");
            $data->kelas = $request->get("kelas");
            $data->id_tahun_ajaran = $request->get("id_tahun_ajaran");
            
            $data->save();
        }
        return redirect('/walikelas');
    }
}
