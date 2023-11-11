 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Catatan Pekembangan Karakter</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{route('karakter.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Catatan</label>
            <input type="text" class="form-control" name="kode_catatan"  placeholder="Masukan Kode Catatan">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Wali Kelas</label>
            <input type="text" class="form-control" name="kode_walikelas"  placeholder="Masukan Kode Walikelas">
          </div>
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn"  placeholder="Masukan NISN">
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
            <label>Tahun Ajaran</label>
            <input type="text" class="form-control" name="tahun_ajaran"  placeholder="Masukan Tahun Ajaran">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Semester</label>
            <input type="text" class="form-control" name="semester"  placeholder="Masukan Semester">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Catatan Perkembangan Karakter</label>
            <input type="text" class="form-control" name="catatan_perkembangan_karakter"  placeholder="Masukan Catatan Perkembangan Karakter">
          </div>    
        </div>
  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
