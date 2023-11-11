 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Deskripsi Pekembangan Karakter</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{route('deskripsi_karakter.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">

      <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Deskripsi</label>
            <input type="text" class="form-control" name="kode_deskripsi"  placeholder="Masukan Kode Deskripsi" required value="{{$kode_deskripsi}}">
          </div>
            
        </div>
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Wali Kelas</label>
            <input type="text" class="form-control" name="kode_walikelas"  placeholder="Masukan Kode_Wali Kelas" required value="{{$kode_walikelas}}">
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
            <label>Integritas</label>
            <input type="text" class="form-control" name="integritas"  placeholder="Masukan Integritas" required value="{{$integritas">
          </div>
            
        </div>
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Religius</label>
            <input type="text" class="form-control" name="religius"  placeholder="Masukan Religius" required value="{{$religius}}">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Nasionalis</label>
            <input type="text" class="form-control" name="nasionalis"  placeholder="Masukan Nasionalis" required value="{{$nasionalis}}">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Mandiri</label>
            <input type="text" class="form-control" name="mandiri"  placeholder="Masukan Mandiri" required value="{{$mandiri}}">
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Gotong-royong</label>
            <input type="text" class="form-control" name="gotong_royong"  placeholder="Masukan Gotong-royong" required value="{{$gotong_royong}}">
          </div>    
        </div>

  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
