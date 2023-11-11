 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Akademik</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Akademik</label>
            <input type="text" class="form-control" name="kode_akademik"  placeholder="Masukan Kode Akademik" required value="{{$kode_akademik}}">
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
            <label>Nama Peserta Didik</label>
            <input type="text" class="form-control" name="nama_peserta_didik"  placeholder="Masukan Nama_Peserta_Didik" required value="{{$nama_peserta_didik}}">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan"  placeholder="Masukan Keterangan" required value="{{$keterangan}}">
          </div>    
        </div>
  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
