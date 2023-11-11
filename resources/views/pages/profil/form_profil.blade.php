 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Profil SMK Taruna Wiyatamandala</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{route('profil.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah"  placeholder="Masukan Nama Sekolah" required value="{{$nama_sekolah}}">
          </div>    

        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>NPSN</label>
            <input type="text" class="form-control" name="npsn"  placeholder="Masukan NPSN" required value="{{$npsn}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>NIS/NSS/NDS</label>
            <input type="text" class="form-control" name="nis_nss_nds"  placeholder="Masukan NIS/NSS/NDS" required value="{{$nis_nss_nds}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Alamat Sekolah</label>
            <input type="text" class="form-control" name="alamat_sekolah"  placeholder="Masukan Alamat Sekolah" required value="{{$alamat_sekolah}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kelurahan</label>
            <input type="text" class="form-control" name="kelurahan"  placeholder="Masukan Kelurahan" required value="{{$kelurahan}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan"  placeholder="Masukan Kecamatan" required value="{{$kecamatan}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kabupaten/Kota</label>
            <input type="text" class="form-control" name="kabupaten_kota"  placeholder="Masukan Kabupaten/Kota" required value="{{$kabupaten_kota}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Provinsi</label>
            <input type="text" class="form-control" name="provinsi"  placeholder="Masukan Provinsi" required value="{{$provinsi}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Website</label>
            <input type="text" class="form-control" name="website"  placeholder="Masukan Website" required value="{{$website}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email"  placeholder="Masukan Email" required value="{{$email}}">
          </div>    
        </div>
  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
