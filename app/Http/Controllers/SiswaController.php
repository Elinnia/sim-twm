<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Tb_Siswa;
use App\Models\Tb_User;
use Illuminate\Http\Request;
use App\Libs\FileUpload;
class SiswaController extends BaseController
{
    public function index(){
        $data = Tb_Siswa::get();
        $param = array(
            "data" => $data
        );
        return view("pages/siswa/siswa")->with($param);
    }

    public function form($id){
        $param = array();
        if($id!="create"){
            // untuk edit
            $data = Tb_Siswa::where("nisn",$id)->first();
            $param = array(
                "nisn" => $data->nisn,
                "nama_peserta_didik" => $data->nama_peserta_didik,
                "tempat_tanggal_lahir" => $data->tempat_tanggal_lahir,
                "jenis_kelamin" => $data->jenis_kelamin,
                "agama" => $data->agama,
                "status_dalam_keluarga" => $data->status_dalam_keluarga,
                "anak_ke" => $data->anak_ke,
                "alamat_peserta_didik" => $data->alamat_peserta_didik,
                "nomor_telepon_rumah" => $data->nomor_telepon_rumah,
                "asal_sekolah" => $data->asal_sekolah,
                "alamat_sekolah_asal" => $data->alamat_sekolah_asal,
                "diterima_di_sekolah_ini" => $data->diterima_di_sekolah_ini,
                "kelas" => $data->kelas,
                "kode_jurusan" => $data->kode_jurusan,
                "pada_tanggal" => $data->pada_tanggal,
                "nama_orang_tua_ayah" => $data->nama_orang_tua_ayah,
                "alamat_orang_tua_ayah" => $data->alamat_orang_tua_ayah,
                "pekerjaan_orang_tua_ayah" => $data->pekerjaan_orang_tua_ayah,
                "nama_orang_tua_ibu" => $data->nama_orang_tua_ibu,
                "alamat_orang_tua_ibu" => $data->alamat_orang_tua_ibu,
                "pekerjaan_orang_tua_ibu" => $data->pekerjaan_orang_tua_ibu,
                "nama_wali_peserta_didik" => $data->nama_wali_peserta_didik,
                "alamat_wali_peserta_didik" => $data->alamat_wali_peserta_didik,
                "nomor_telepon" => $data->nomor_telepon,
                "pekerjaan_wali_peserta_didik" => $data->pekerjaan_wali_peserta_didik,
                "photo" => $data->photo,
                "status_siswa" => $data->status_siswa,
                "url" => route('siswa.edit',$data->nisn)
            );
        }
        else{
            //untuk insert
            $param = array(
                "nisn" => "",
                "nama_peserta_didik" => "",
                "tempat_tanggal_lahir" => "",
                "jenis_kelamin" => "",
                "agama" => "",
                "status_dalam_keluarga" => "",
                "anak_ke" => "",
                "alamat_peserta_didik" => "",
                "nomor_telepon_rumah" => "",
                "asal_sekolah" => "",
                "alamat_sekolah_asal" => "",
                "diterima_di_sekolah_ini" => "",
                "kelas" => "",
                "kode_jurusan" => "",
                "pada_tanggal" => "",
                "nama_orang_tua_ayah" => "",
                "alamat_orang_tua_ayah" => "",
                "pekerjaan_orang_tua_ayah" => "",
                "nama_orang_tua_ibu" => "",
                "alamat_orang_tua_ibu" => "",
                "pekerjaan_orang_tua_ibu" => "",
                "nama_wali_peserta_didik" => "",
                "alamat_wali_peserta_didik" => "",
                "nomor_telepon" => "",
                "pekerjaan_wali_peserta_didik" => "",
                "photo" => "",
                "status_siswa" => "",
                "url" => route('siswa.store')
            );
        }
        return view("pages/siswa/form_siswa")->with($param);
    }

    public function form_akun($id){
        $param = array(
            "user_email" =>"",
            "user_password" => "",
            "user_conid" => $id
        );
        $user_data = Tb_User::where("user_conid",$id)->first();
      
        if($user_data){
            // untuk edit
            $param = array(
                "user_email" =>$user_data->user_email,
                "user_password" => $user_data->user_password,
                "user_conid" => $id
            );
        }
      
        return view("pages/siswa/form_akun")->with($param);
    }

    public function store_akun(Request $request){

        $user_data = Tb_User::where('user_conid', $request->user_conid)->first();
        $param_insert = array(
            "user_email" => $request->get("user_email"),
            "user_conid" => $request->get("user_conid"),
            "user_type" => "siswa",
        );

        if(strlen($request->get("user_password"))){
            $param_insert['user_password'] = password_hash($request->get("user_password"),PASSWORD_DEFAULT);
        }

        if ($user_data) {
            Tb_User::where('user_conid', $request->user_conid)->update($param_insert);
            return redirect('/siswa');
        }else{
             Tb_User::create($param_insert);
            return redirect('/siswa');
        }
      
       
    }

    public function store(Request $request){

        $siswa = Tb_Siswa::where('nisn', $request->nisn)->get();
    
        if (count($siswa)>0) {
            $name_file = time().".jpg";
            $param = $request->except('_token', '_method');
            $param['photo'] = $name_file;
            Tb_Siswa::where('nisn', $request->nisn)->update($param);
            FileUpload::PostFile("siswa",$request->file("photo"),$name_file);
            return redirect('/siswa');
        }else{
        
            $name_file = time().".jpg";
            $param = $request->all();
            $param['photo'] = $name_file;
            Tb_Siswa::create($param);
            FileUpload::PostFile("siswa",$request->file("photo"),$name_file);
            return redirect('/siswa');
        }
      
       
    }

    public function delete($id){
        Tb_Siswa::where("nisn",$id)->delete();
        return redirect('/siswa');
    }
    public function edit(Request $request,$id){
        $param = $request->all();
        $data = Tb_Siswa::where("nisn",$id)->first();
        if($data){
            $data->nisn = $request->get("nisn");
            $data->nama_peserta_didik = $request->get("nama_peserta_didik");
            $data->tempat_tanggal_lahir = $request->get("tempat_tanggal_lahir");
            $data->jenis_kelamin = $request->get("jenis_kelamin");
            $data->agama = $request->get("agama");
            $data->status_dalam_keluarga = $request->get("status_dalam_keluarga");
            $data->anak_ke = $request->get("anak_ke");
            $data->alamat_peserta_didik = $request->get("alamat_peserta_didik");
            $data->nomor_telepon_rumah = $request->get("nomor_telepon_rumah");
            $data->asal_sekolah = $request->get("asal_sekolah");
            $data->alamat_sekolah_asal = $request->get("alamat_sekolah_asal");
            $data->diterima_di_sekolah_ini = $request->get("diterima_di_sekolah_ini");
            $data->kelas = $request->get("kelas");
            $data->kode_jurusan = $request->get("kode_jurusan");
            $data->pada_tanggal = $request->get("pada_tanggal");
            $data->nama_orang_tua_ayah = $request->get("nama_orang_tua_ayah");
            $data->alamat_orang_tua_ayah = $request->get("alamat_orang_tua_ayah");
            $data->pekerjaan_orang_tua_ayah = $request->get("pekerjaan_orang_tua_ayah");
            $data->nama_orang_tua_ibu = $request->get("nama_orang_tua_ibu");
            $data->alamat_orang_tua_ibu = $request->get("alamat_orang_tua_ibu");
            $data->pekerjaan_orang_tua_ibu = $request->get("pekerjaan_orang_tua_ibu");
            $data->nama_wali_peserta_didik = $request->get("nama_wali_peserta_didik");
            $data->alamat_wali_peserta_didik = $request->get("alamat_wali_peserta_didik");
            $data->nomor_telepon = $request->get("nomor_telepon");
            $data->pekerjaan_wali_peserta_didik = $request->get("pekerjaan_wali_peserta_didik");
            $data->status_siswa = $request->get("status_siswa");
            // $data->photo = $request->get("photo");
            //$data->save();
            $name_file = time().".jpg";
            $param['photo'] = $name_file;
           
            $link = FileUpload::PostFile("siswa",$request->file("photo"),$name_file);
            $data->photo = $param['photo'];
            $data->save();
        }
       
        return redirect('/siswa');
    }  
} 