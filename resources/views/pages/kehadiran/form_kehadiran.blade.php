 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Kehadiran</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Kehadiran</label>
            <input type="text" class="form-control" name="kode_kehadiran"  placeholder="Masukan Kode Kediran" required value="{{$kode_kehadiran}}">
          </div>   
        </div>

      <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Wali Kelas</label>
            <input type="text" class="form-control" name="kode_walikelas"  placeholder="Masukan Kode Wali Kelas" required value="{{$kode_walikelas}}">
          </div>   
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn"  placeholder="Masukan NISN" required value="{{$nisn}}">
          </div>   
        </div>  
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Sakit</label>
            <input type="text" class="form-control" name="sakit"  placeholder="Masukan Sakit" required value="{{$sakit}}">
          </div>   
        </div>
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Izin</label>
            <input type="text" class="form-control" name="izin"  placeholder="Masukan Izin" required value="{{$izin}}">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Tanpa Keterangan</label>
            <input type="text" class="form-control" name="tanpa_keterangan"  placeholder="Masukan Tanpa Keterangan" required value="{{$tanpa_keterangan}}">
          </div>    
        </div>
  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
