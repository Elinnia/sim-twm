<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Jurusan;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
class JurusanController extends BaseController
{
    public function index(){
        $data = Tb_Jurusan::get();
        $param = array(
            "data" => $data
        );
        return view("pages/jurusan/jurusan")->with($param);
    }

    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Jurusan::where("kode_jurusan",$id)->first();
            $param = array(
                "kode_jurusan" => $data->kode_jurusan,
                "nama_jurusan" => $data->nama_jurusan,
                "url" => route('jurusan.edit',$data->kode_jurusan)
            );
        }
        else{
            //untuk insert
             $param = array(
                "kode_jurusan" => "",
                "nama_jurusan" => "",
                "url" => route('jurusan.store')
            );
        }
        return view("pages/jurusan/form_jurusan")->with($param);
    }

    public function store(Request $request){
       $param = $request->all();
       Tb_Jurusan::create($param);
       return redirect('/jurusan');
    }
    public function delete($id){
        Tb_Jurusan::where("kode_jurusan",$id)->delete();
        return redirect('/jurusan');
    }

    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Jurusan::where("kode_jurusan",$id)->first();
        if($data){
            $data->kode_jurusan = $request->get("kode_jurusan");
            $data->nama_jurusan = $request->get("nama_jurusan");
            $data->save();
        }
        return redirect('/jurusan');
    }
}
