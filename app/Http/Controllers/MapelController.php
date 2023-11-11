<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Mapel;
use App\Models\Tb_Guru;
use App\Models\Tb_Jurusan;
use App\Models\Tb_Muatan_Akademik;
use App\Models\Tb_Submuatan_Akademik;

use Illuminate\Http\Request;
use App\Libs\FileUpload;
class MapelController extends BaseController
{
    public function index(){
        $data = Tb_Mapel::with(["guru","jurusan","muatan","submuatan"])->get();
        $param = array(
            "data" => $data
        );
        return view("pages/mapel/mapel")->with($param);
    }

    

    public function form($id){
       
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Mapel::where("kode_mapel",$id)->first();
            
            $param = array(
                "kode_mapel" => $data->kode_mapel,
                "nip" => $data->nip,
                "kode_jurusan" => $data->kode_jurusan,
                "kode_muatan" => $data->kode_muatan,
                "kode_submuatan" => $data->kode_submuatan,
                "nama_mapel" => $data->nama_mapel,
                "kelas" => $data->kelas,
                "url" => route('mapel.edit',$data->kode_mapel)
            );
        }
        else{
            //untuk insert
            $param = array(
                "kode_mapel" => "",
                "nip" => "",
                "kode_jurusan" => "",
                "kode_muatan" => "",
                "kode_submuatan" => "",
                "nama_mapel" => "",
                "kelas" => "",
                "url" => route('mapel.store')
            );
        }
        $dt_guru = Tb_Guru::get();
        $param['dt_guru'] = $dt_guru;
        $dt_jurusan = Tb_Jurusan::get();
        $param['dt_jurusan'] = $dt_jurusan;
        $dt_muatan = Tb_Muatan_Akademik::get();
        $param['dt_muatan'] = $dt_muatan;
        $dt_submuatan = Tb_Submuatan_Akademik::get();
        $param['dt_submuatan'] = $dt_submuatan;
        return view("pages/mapel/form_mapel")->with($param);
    }

    public function store(Request $request){
       $param = $request->all();
       Tb_Mapel::create($param);
       return redirect('/mapel');
    }
    public function delete($id){
        Tb_Mapel::where("kode_mapel",$id)->delete();
        return redirect('/mapel');
    }
    public function edit(Request $request,$id){
        $param = $request->all();
       
        $data = Tb_Mapel::where("kode_mapel",$id)->first();
        if($data){
            $data->kode_mapel = $request->get("kode_mapel");
            $data->nip = $request->get("nip");
            $data->kode_jurusan = $request->get("kode_jurusan");
            $data->kode_muatan = $request->get("kode_muatan");
            $data->kode_submuatan = $request->get("kode_submuatan");
            $data->nama_mapel = $request->get("nama_mapel");
            $data->kelas = $request->get("kelas");
           
            $data->save();
        }
        return redirect('/mapel');
}
}