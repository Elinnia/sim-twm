<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Kalender;
use App\Models\Tb_Tahun_Ajaran;

use Illuminate\Http\Request;

class KalenderController extends BaseController
{
    public function index(){
        $data = Tb_Kalender::with(["tahun_ajar"])->get();
        $param = array(
            "data" => $data
        );
        return view("pages/kalender/index")->with($param);
    }

    public function form($id){
        $param = array();
      
        $dt_tahun_ajar = Tb_Tahun_Ajaran::get();
        if($id!="create"){
            // untuk edit
            $data = Tb_Kalender::where("kalender_id",$id)->first();
            $param = array(
                "kalender_id" => $data->kalender_id,
                "kalender_date" => $data->kalender_date,
                "kalender_deskripsi" => $data->kalender_deskripsi,
                "id_tahun_ajaran" => $data->id_tahun_ajaran,
                "url" => route('kalender.edit',$data->kalender_id)
            );
        }
        else{
            //untuk insert
             $param = array(
                "kalender_id" => "",
                "kalender_date" => "",
                "kalender_deskripsi" => "",
                "id_tahun_ajaran" => "",
                "url" => route('kalender.store')
            );
        }
        $param['dt_tahun_ajar'] = $dt_tahun_ajar;
        
        return view("pages/kalender/form")->with($param);
    }

    public function store(Request $request){
       $param = $request->all();
       Tb_Kalender::create($param);
       return redirect('/kalender');
    }
    public function delete($id){
        Tb_Kalender::where("kalender_id",$id)->delete();
        return redirect('/kalender');
    }

    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Kalender::where("kalender_id",$id)->first();
        if($data){
            $data->kalender_date =$request->get("kalender_date");
            $data->kalender_deskripsi = $request->get("kalender_deskripsi");
            $data->id_tahun_ajaran = $request->get("id_tahun_ajaran");
            
            $data->save();
        }
        return redirect('/kalender');
    }
}
