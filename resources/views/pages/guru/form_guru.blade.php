 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Guru</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" name="nip"  placeholder="Masukan NIP" required value="{{$nip}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Guru</label>
            <input type="text" class="form-control" name="kode_guru"  placeholder="Masukan Kode Guru" required value="{{$kode_guru}}">
          </div> 

        </div>
         <div class="col-sm-4">
           <div class="form-group">
            <label>Nama Pendidik dan Tenaga Kependidikan</label>
            <input type="text" class="form-control" name="nama_pendidik_dan_tenaga_kependidikan"  placeholder="Masukan Nama Pendidik dan Tenaga Kependidikan" required value="{{$nama_pendidik_dan_tenaga_kependidikan}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Jabatan</label>
            <input required type="text" class="form-control" name="jabatan"  placeholder="Masukan Jabatan" required value="{{$jabatan}}">
          </div>
            
        </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Tempat, Tanggal Lahir</label>
        <input type="text" class ="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required value="{{$tempat_lahir}}">
        </div>
    </div>

    <div class="col-sm-4">
       <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class ="form-control" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required value="{{$tanggal_lahir}}">
      </div>
   </div>

    <div class="col-sm-4">
           <div class="form-group">
            <label>No NUPTK</label>
            <input type="text" class="form-control" name="no_nuptk"  placeholder="Masukan No NUPTK" required value="{{$no_nuptk}}">
      
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>No SK Pengangkatan</label>
            <input type="text" class="form-control" name="no_sk_pengangkatan"  placeholder="Masukan No SK Pengangkatan" required value="{{$no_sk_pengangkatan}}">
          </div>
            
        </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Tanggal SK Pengangkatan</label>
        <input type="date" required class="form-control" name="tanggal_sk_pengangkatan"  placeholder="Masukan Tanggal SK Pengangkatan" required value="{{$tanggal_sk_pengangkatan}}">
      
      </div>

    </div>

    <div class="col-sm-4">
           <div class="form-group">
            <label>Pekerjaan</label>
            <select name="pekerjaan" class="form-control" required>
            <option value="guru_honorer" @if($pekerjaan=="guru_honorer") selected @endif>Guru Honorer</option>
            <option value="guru_tetap_yayasan" @if($pekerjaan=="guru_tetap_yayasan") selected @endif>Guru Tetap Yayasan</option>
            <option value="pegawai_yayasan" @if($pekerjaan=="pegawai_yayasan") selected @endif>Pegawai Yayasan</option>
            
        </select>
      
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Riwayat Pendidikan</label>
            <textarea name="riwayat_pendidikan" class="form-control" rows="5" required>{{$riwayat_pendidikan}}</textarea>
          </div>
            
        </div>
      <div class="col-sm-4">
       <div class="form-group">
        <label>Pendidikan Terakhir</label>
        <select name="pendidikan_terakhir" class="form-control" required>
            <option value="sma_sederajat" @if($pendidikan_terakhir=="sma_sederajat") selected @endif>SMA Sederajat</option>
            <option value="si" @if($pendidikan_terakhir=="si") selected @endif>SI</option>
            <option value="s2" @if($pendidikan_terakhir=="s2") selected @endif>S2</option>
            
        </select>
      
      </div>
        
    </div>
     <div class="col-sm-4">
       <div class="form-group">
        <label>No Tlp Rumah</label>
        <input type="text" required class="form-control" name="no_tlp_rumah"  placeholder="Masukan No Tlp Rumah" required value="{{$no_tlp_rumah}}">
      
      </div>

    </div>
    <div class="col-sm-4">
       <div class="form-group">
        <label>No Hp</label>
         <input type="text" required class="form-control" name="no_hp"  placeholder="Masukan No Hp" required value="{{$no_hp}}">
      </div>

    </div>

    <div class="col-sm-4">
       <div class="form-group">
        <label>Alamat Email</label>
        <input type="text" class="form-control" name="alamat_email" placeholder="Masukan Alamat Email" required value="{{$alamat_email}}">
      </div>

    </div>

      <div class="col-sm-4">
       <div class="form-group">
        <label>Alamat Rumah Sesuai KTP</label>
        <textarea name="alamat_rumah_sesuai_ktp" class="form-control" rows="5" required>{{$alamat_rumah_sesuai_ktp}}</textarea>
      </div>
      </div>

      <div class="col-sm-4">
       <div class="form-group">
       <label>Alamat Rumah Saat Ini</label>
       <textarea name="alamat_rumah_saat_ini"class="form-control"rows="5" required>{{$alamat_rumah_saat_ini}}</textarea> 
      </div> 
    </div>

    <div class="col-sm-4">
       <div class="form-group">
        <label>Nama Ibu Kandung</label>
        <input type="text" class="form-control" name="nama_ibu_kandung" required value="{{$nama_ibu_kandung}}">
      </div>
    </div>

     <div class="col-sm-4">
       <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="menikah" @if($status=="menikah") selected @endif>Menikah</option>
            <option value="tidak_menikah" @if($status=="tidak_menikah") selected @endif>Tidak Menikah</option>
        </select>
      </div>
     </div>

      <div class="col-sm-4">
       <div class="form-group">
        <label>Nama Suami/Istri</label>
        <select name="nama_suami_istri" class="form-control" required>
            <option value="suami" @if($nama_suami_istri=="suami") selected @endif>Suami</option>
            <option value="istri" @if($nama_suami_istri=="istri") selected @endif>Istri</option>

         <input type="text" class="form-control" name="nama_suami_istri" required value="{{$nama_suami_istri}}">
        </select>
      </div>
    </div>

    <div class="col-sm-4">
       <div class="form-group">
        <label>Jumlah Anak</label>
        <input type="text" class="form-control" name="jumlah_anak" required value="{{$jumlah_anak}}">
      </div>
    </div>

    <div class="col-sm-4">
       <div class="form-group">
        <label>Pilih Foto</label>
        <input type="file" class="form-control" name="photo" required value="{{$photo}}">
      </div> 
    </div>
   @if(Auth::user()->user_type=="admin")
    <button type="submit" class="btn btn-primary" >Update Data</button>
  @endif

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
