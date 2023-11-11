 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Siswa</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn"  placeholder="Masukan NISN" required value="{{$nisn}}">
          </div>         

        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Nama Peserta Didik</label>
            <input type="text" class="form-control" name="nama_peserta_didik"  placeholder="Masukan Nama Peserta" required value="{{$nama_peserta_didik}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Tempat, Tanggal Lahir</label>
            <input type="text" class="form-control" name="tempat_tanggal_lahir"  placeholder="Masukan Tempat,Tanggal Lahir" required value="{{$tempat_tanggal_lahir}}">
          </div>    
        </div>

         <div class="col-sm-4">
           <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="laki-laki" @if($jenis_kelamin=="laki-laki") selected @endif>Laki-laki</option>
                <option value="perempuan" @if($jenis_kelamin=="perempuan") selected @endif>Perempuan</option>
            </select>
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Agama</label>
            <input required type="text" class="form-control" name="agama" placeholder="Masukan Agama" required value="{{$agama}}">
          </div>
            
        </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Status Dalam Keluarga</label>
        <select name="status_dalam_keluarga" class="form-control" required>
            <option value="anak_kandung" @if($status_dalam_keluarga=="anak_kandung") selected @endif>Anak Kandung</option>
            <option value="anak_angkat" @if($status_dalam_keluarga=="anak_angkat") selected @endif>Anak Angkat</option>
        </select>
      </div>

    </div>

    <div class="col-sm-4">
           <div class="form-group">
            <label>Anak ke</label>
            <input type="text" class="form-control" name="anak_ke"  placeholder="Masukan Anak ke" required value="{{$anak_ke}}">
      
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Alamat Peserta didik</label>
            <textarea required name="alamat_peserta_didik" class="form-control" rows="5" required >{{$alamat_peserta_didik}}</textarea>
          </div>
            
        </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>No Telepon Rumah</label>
        <input type="text" required class="form-control" name="nomor_telepon_rumah"  placeholder="Masukan No Telepon Rumah" required value="{{$nomor_telepon_rumah}}">
      
      </div>
 
    </div>

    <div class="col-sm-4">
           <div class="form-group">
            <label>Asal Sekolah</label>
            <input required type="text" class="form-control" name="asal_sekolah"  placeholder="Masukan Asal Sekolah"required value="{{$asal_sekolah}}">
      
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Alamat Sekolah Asal</label>
            <textarea name="alamat_sekolah_asal" class="form-control" rows="5" required>{{$alamat_sekolah_asal}}</textarea>
          </div>
            
        </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Diterima di Sekolah ini</label>
        <input type="text" class="form-control" name="diterima_di_sekolah_ini" required value="{{$diterima_di_sekolah_ini}}">
      
      </div>

    </div>
     <div class="col-sm-4">
       <div class="form-group">
        <label>Kelas</label>

        <select name="kelas" class="form-control" required>
            <option value="X" @if($kelas=="X") selected @endif>X</option>
            <option value="XI" @if($kelas=="XI") selected @endif>XI</option>
            <option value="XII" @if($kelas=="XII") selected @endif>XII</option>
            
        </select>
      
      </div>

    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Kode Jurusan</label>
         <input type="text" class="form-control" name="kode_jurusan" required value="{{$kode_jurusan}}">

      
      </div>

    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Pada Tanggal</label>
        <input type="date" class="form-control" name="pada_tanggal" required value="{{$pada_tanggal}}">
      
      </div>

    </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Nama Orang tua Ayah</label>
        <input type="text" class="form-control" name="nama_orang_tua_ayah" required value="{{$nama_orang_tua_ayah}}">
      
      </div>

      </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Pekerjaan Orang tua Ayah</label>
        <input type="text" class="form-control" name="pekerjaan_orang_tua_ayah" required value="{{$pekerjaan_orang_tua_ayah}}">
      
      </div> 

    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Alamat Orang tua Ayah</label>
        <input type="text" class="form-control" name="alamat_orang_tua_ayah" required value="{{$alamat_orang_tua_ayah}}">
      
      </div>

    </div>
     <div class="col-sm-4">
       <div class="form-group">
        <label>Nama Orang tua Ibu</label>
        <input type="text" class="form-control" name="nama_orang_tua_ibu" required value="{{$nama_orang_tua_ibu}}">
      
      </div>
     </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Pekerjaan Orang tua Ibu</label>
        <input type="text" class="form-control" name="pekerjaan_orang_tua_ibu" required value="{{$pekerjaan_orang_tua_ibu}}">
      
      </div>
        
    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Alamat Orang tua Ibu</label>
        <input type="text" class="form-control" name="alamat_orang_tua_ibu" required value="{{$alamat_orang_tua_ibu}}">
      
      </div>

    </div>
     <div class="col-sm-4">
       <div class="form-group">
        <label>Nama Wali Peserta didik</label>
        <input type="text" class="form-control" name="nama_wali_peserta_didik" required value="{{$nama_wali_peserta_didik}}"> 
      
      </div>

    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Alamat Wali Peserta didik</label>
        <input type="text" class="form-control" name="alamat_wali_peserta_didik" required value="{{$alamat_wali_peserta_didik}}">
      
      </div>
        
    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="text" class="form-control" name="nomor_telepon_rumah" required value="{{$nomor_telepon_rumah}}">
      
      </div>

    </div>
     <div class="col-sm-4">
       <div class="form-group">
        <label>Pekerjaan Wali Peserta Didik</label>
        <input type="text" class="form-control" name="pekerjaan_wali_peserta_didik" required value="{{$pekerjaan_wali_peserta_didik}}">
      
      </div>

    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>Pilih Foto</label>
        <input type="file" class="form-control" name="photo" required value="{{$photo}}">
      
      </div>
    </div>
     <div class="col-sm-4">
       <div class="form-group">
        <label>Status Siswa</label>
        <select name="status_siswa" class="form-control" required>
            <option value="aktif" @if($status_siswa=="aktif") selected @endif>Aktif</option>
            <option value="lulus" @if($status_siswa=="lulus") selected @endif>Lulus</option>
            <option value="pindah" @if($status_siswa=="pindah") selected @endif>Pindah</option>
            
        </select>
      
      </div>
    </div>
  @if(Auth::user()->user_type!="siswa")
   <button type="submit" class="btn btn-primary" >Update Data</button>
  @endif 
</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
