<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Guru;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
use Illuminate\Support\Facades\Auth;
class GuruController extends BaseController
{
    public function index(){
        $data = Tb_Guru::get();
        $param = array(
            "data" => $data
        );
        return view("pages/guru/guru")->with($param);
    }
    
    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Guru::where("nip",$id)->first();
            $param = array(
                "nip" => $data->nip,
                "nama_pendidik_dan_tenaga_kependidikan" => $data->nama_pendidik_dan_tenaga_kependidikan,
                "kode_guru" => $data->kode_guru,
                "jabatan" => $data->jabatan,
                "tempat_lahir" => $data->tempat_lahir,
                "tanggal_lahir" => $data->tanggal_lahir,
                
                "no_nuptk" => $data->no_nuptk,
                "no_sk_pengangkatan" => $data->no_sk_pengangkatan,
                "tanggal_sk_pengangkatan" => $data->tanggal_sk_pengangkatan,
                "pekerjaan" => $data->pekerjaan,
                "riwayat_pendidikan" => $data->riwayat_pendidikan,
                "pendidikan_terakhir" => $data->pendidikan_terakhir,
                "no_tlp_rumah" => $data->no_tlp_rumah,
                "no_hp" => $data->no_hp,
                "alamat_email" => $data->alamat_email,
                "alamat_rumah_sesuai_ktp" => $data->alamat_rumah_sesuai_ktp,
                "alamat_rumah_saat_ini" => $data->alamat_rumah_saat_ini,
                "nama_ibu_kandung" => $data->nama_ibu_kandung,
                "status" => $data->status,
                "nama_suami_istri" => $data->nama_suami_istri,
                "jumlah_anak" => $data->jumlah_anak,
                "photo" => $data->photo,
                "url" => route('guru.edit',$data->nip)
            );
        }
        else{
            //untuk insert
            $param = array(
                "nip" => "",
                "nama_pendidik_dan_tenaga_kependidikan" => "",
                "kode_guru" => "",
                "jabatan" => "",
                "tempat_lahir" => "",
                "tanggal_lahir" => "",
                
                "no_nuptk" => "",
                "no_sk_pengangkatan" => "",
                "tanggal_sk_pengangkatan" => "",
                "pekerjaan" => "",
                "riwayat_pendidikan" => "",
                "pendidikan_terakhir" => "",
                "no_tlp_rumah" => "",
                "no_hp" => "",
                "alamat_email" => "",
                "alamat_rumah_sesuai_ktp" => "",
                "alamat_rumah_saat_ini" => "",
                "nama_ibu_kandung" => "",
                "status" => "",
                "nama_suami_istri" => "",
                "jumlah_anak" => "",
                "photo" =>"",
                "url" => route('guru.store')
            );
        }
        
        return view("pages/guru/form_guru")->with($param);
    }

    public function store(Request $request){
       $name_file = time().".jpg";
       $param = $request->all();
       $param['photo'] = $name_file;
       Tb_Guru::create($param);
       FileUpload::PostFile("guru",$request->file("photo"),$name_file);
       return redirect('/guru');
    }
    public function delete($id){
        Tb_Guru::where("nip",$id)->delete();
        return redirect('/guru');
    }   

    public function edit(Request $request,$id){
        $param = $request->all();

        $data = Tb_Guru::where("nip",$id)->first();
        if($data){
            $data->nip = $request->get("nip");
            $data->nama_pendidik_dan_tenaga_kependidikan = $param['nama_pendidik_dan_tenaga_kependidikan'];
            $data->kode_guru = $request->get("kode_guru");
            $data->jabatan = $request->get("jabatan");
            $data->tempat_lahir = $request->get("tempat_lahir");
            $data->tanggal_lahir = $request->get("tanggal_lahir");
            
            $data->no_nuptk = $request->get("no_nuptk");
            $data->no_sk_pengangkatan = $request->get("no_sk_pengangkatan");
            $data->tanggal_sk_pengangkatan = $request->get("tanggal_sk_pengangkatan");
            $data->pekerjaan = $request->get("pekerjaan");
            $data->riwayat_pendidikan = $request->get("riwayat_pendidikan");
            $data->pendidikan_terakhir = $request->get("pendidikan_terakhir");
            $data->no_tlp_rumah = $request->get("no_tlp_rumah");
            $data->no_hp = $request->get("no_hp");
            $data->alamat_email = $request->get("alamat_email");
            $data->alamat_rumah_sesuai_ktp = $request->get("alamat_rumah_sesuai_ktp");
            $data->alamat_rumah_saat_ini = $request->get("alamat_rumah_saat_ini");
            $data->nama_ibu_kandung = $request->get("nama_ibu_kandung");
            $data->status = $request->get("status");
            $data->nama_suami_istri = $request->get("nama_suami_istri");
            $data->jumlah_anak = $request->get("jumlah_anak");
            $name_file = time().".jpg";
            $param['photo'] = $name_file;
            FileUpload::PostFile("guru",$request->file("photo"),$name_file);
            $data->photo = $param['photo'];
            $data->save();
        }
        if(Auth::user()->user_type=="admin"){
             return redirect('/guru');
        }
        else{
            return redirect()->back();
        }
       
}
} 
