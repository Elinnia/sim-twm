 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Nilai Akademik</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{route('nilai.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Tahun Ajaran</label>
            <input type="text" class="form-control" name="tahun_ajaran"  placeholder="Masukan Tahun Ajaran" required value="{{tahun_ajaran}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Semester</label>
            <input type="text" class="form-control" name="semester"  placeholder="Masukan Semester" required value="{{semester}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn"  placeholder="Masukan NISN" required value="{{nisn}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Mapel</label>
            <input type="text" class="form-control" name="kode_mapel"  placeholder="Masukan Kode Mapel" required value="{{kode_mapel}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>KKM</label>
            <input type="text" class="form-control" name="kkm"  placeholder="Masukan KKM" required value="{{kkm}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Nilai Pengetahuan</label>
            <input type="text" class="form-control" name="nilai_pengetahuan"  placeholder="Masukan Nilai Pengetahuan" required value="{{nilai_pengetahuan}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Nilai Keterampilan</label>
            <input type="text" class="form-control" name="nilai_keterampilan"  placeholder="Masukan Nilai Keterampilan" required value="{{nilai_keterampilan}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Nilai Akhir</label>
            <input type="text" class="form-control" name="nilai_akhir"  placeholder="Masukan Nilai Akhir" required value="{{nilai_akhir}}">
          </div>    
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Predikat</label>
            <input type="text" class="form-control" name="predikat"  placeholder="Masukan Predikat" required value="{{predikat}}">
          </div>    
        </div>
  
  <button type="submit" class="btn btn-primary">Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
