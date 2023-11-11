<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_User;
use App\Models\Tb_Guru;

use Illuminate\Http\Request;
use App\Libs\FileUpload;
class UserController extends BaseController
{
    public function index(){
        $data = Tb_User::with(["guru"])->whereNotIn("user_type",["siswa"])->get();
        $param = array(
            "data" => $data
        );
        return view("pages/user/user")->with($param);
    }
    
    public function form($id){
        $param = array();
        $data_guru = Tb_Guru::get();
        $data_user_type = ["admin","guru","wali_kelas","kurikulum","kepala_sekolah"];
        if($id!="create"){
            // untuk edit
            $data = Tb_User::where("user_id",$id)->first();
            
            $param = array(
                "user_id" => $data->user_id,
                "user_email" => $data->user_email,
                "user_password" => $data->user_password,
                "user_conid" => $data->user_conid,
                "user_type" => $data->user_type,
                "user_lastlogin" => $data->user_lastlogin,
                "data_guru" => $data_guru,
                "data_user_type" => $data_user_type,
                "url" => route('user.edit',$data->user_id)
            );
        }
        else{
            //untuk insert
            $param = array(
                "user_id" => "",
                "user_email" => "",
                "user_password" => "",
                "user_conid" => "",
                "user_type" => "",
                "user_lastlogin" => "",
                "data_guru" => $data_guru,
                 "data_user_type" => $data_user_type,
                "url" => route('user.store')
            );
        }
        return view("pages/user/form_user")->with($param);
        }

    public function store(Request $request){
       $param = $request->all();
       $param['user_password'] =  password_hash($request->get("user_password"),PASSWORD_DEFAULT);
       Tb_User::create($param);
       return redirect('/user');

    }

    public function delete($id){
        Tb_User::where("user_id",$id)->delete();
        return redirect('/user');
    }   

    public function edit(Request $request,$id){
        $param = $request->all();

        $data = Tb_User::where("user_id",$id)->first();
        if($data){
            $data->user_email = $param['user_email'];
            if(strlen($request->get("user_password"))>0){
                $data->user_password = password_hash($request->get("user_password"),PASSWORD_DEFAULT);
            }
            
            $data->user_conid = $request->get("user_conid");
            $data->user_type = $request->get("user_type");
            $data->save();
        }
        return redirect('/user');
    }
} 
