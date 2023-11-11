<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Tahun_Ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TahunAjarController extends BaseController
{
    public function index(){
        $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
        
        $param = array(
            "dt_tahun_ajar" => $dt_tahun_ajar,
        );
        return view("pages/tahun_ajar/index")->with($param);
    }
    
    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Tahun_Ajaran::where("id_tahun_ajaran",$id)->first();
            $param = array(
                "tahun_pelajaran" => $data->tahun_ajaran,
                "url" => route('tahun_ajar.edit',$id)
            );
        }
        else{
            //untuk insert
           $param = array(
                "tahun_pelajaran" => "",
                "url" => route('tahun_ajar.store',$id)
            );
        }

        return view("pages/tahun_ajar/form")->with($param);
    }

    public function store(Request $request){
       $param = $request->all();
       $validator = Validator::make($param,[
        'tahun_ajaran' =>'required',
       ]);
        if($validator->fails()) {
            return response()->json(['success' => 0, 'message' => 'Validation Error','erorrs' => $validator->errors()],400);
        }
        Tb_Tahun_Ajaran::create($param);
        return redirect('/tahun_ajar');
    }
    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Tahun_Ajaran::where("id_tahun_ajaran",$id)->first();
        if($data){
            $data->tahun_ajaran = $request->get("tahun_ajaran");
            $data->save();
        }
        return redirect('/tahun_ajar');
    }
}
