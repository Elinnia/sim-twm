<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Raport_Date;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
class RaportDateController extends BaseController
{
    public function index(){
        $data = Tb_Raport_Date::get();
        $param = array(
            "data" => $data
        );
        return view("pages/raport_date/index")->with($param);
    }

    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Profil::where("kode",1)->first();
           
            $param = array(
                "npsn" => $data->npsn,
                "nama_sekolah" => $data->nama_sekolah,
                "nis_nss_nds" => $data->nis_nss_nds,
                "alamat_sekolah" => $data->alamat_sekolah,
                "kelurahan" => $data->kelurahan,
                "kecamatan" => $data->kecamatan,
                "kabupaten_kota" => $data->kabupaten_kota,
                "provinsi" => $data->provinsi,
                "website" => $data->website,
                "email" => $data->email,
                "url" => route('profil.edit',$data->npsn)
            );
        }
        else{
            //untuk insert
            $param = array(
                "npsn" => "",
                "nama_sekolah" => "",
                "nis_nss_nds" => "",
                "alamat_sekolah" => "",
                "kelurahan" => "",
                "kecamatan" => "",
                "kabupaten_kota" => "",
                "provinsi" => "",
                "website" => "",
                "email" => "",
                "url" => route('profil.store')
            );
        }
        return view("pages/profil/form_profil")->with($param);
    }

    public function store(Request $request){
        $param = $request->all();
        $data = Tb_Profil::where("kode","1")->first();
        if($data){
            $data->npsn = $request->get("npsn");
            $data->nama_sekolah = $request->get("nama_sekolah");
            $data->nis_nss_nds = $request->get("nis_nss_nds");
            $data->alamat_sekolah = $request->get("alamat_sekolah");
            $data->kelurahan = $request->get("kelurahan");
            $data->kecamatan = $request->get("kecamatan");
            $data->kabupaten_kota = $request->get("kabupaten_kota");
            $data->provinsi = $request->get("provinsi");
            $data->website = $request->get("website");
            $data->email = $request->get("email");
            $data->save();
        }
        return redirect('/profil/form/1');
    }
    public function delete($id){
        Tb_Profil::where("npsn",$id)->delete();
        return redirect('/profil');
    }
    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Profil::where("npsn",$id)->first();
        if($data){
            $data->npsn = $request->get("npsn");
            $data->nama_sekolah = $request->get("nama_sekolah");
            $data->nis_nss_nds = $request->get("nis_nss_nds");
            $data->alamat_sekolah = $request->get("alamat_sekolah");
            $data->kelurahan = $request->get("kelurahan");
            $data->kecamatan = $request->get("kecamatan");
            $data->kabupaten_kota = $request->get("kabupaten_kota");
            $data->provinsi = $request->get("provinsi");
            $data->website = $request->get("website");
            $data->email = $request->get("email");
            $data->save();
        }
        return redirect('/profil');
}
}




    

