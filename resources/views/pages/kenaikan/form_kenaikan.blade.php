 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Kenaikan Kelas</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{route('kenaikan.store')}}" enctype="multipart/form-data">
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
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan"  placeholder="Masukan Keterangan" required value="{{$keterangan}}">
          </div>    
        </div>
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Naik Kelas</label>
            <input type="text" class="form-control" name="naik_kelas"  placeholder="Masukan Naik Kelas" required value="{{$naik_kelas}}">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Tahun</label>
            <input type="text" class="form-control" name="tahun"  placeholder="Masukan Tahun" required value="{{$tahun}}">
          </div>    
        </div>
  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
