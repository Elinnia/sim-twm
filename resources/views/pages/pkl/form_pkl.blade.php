 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Praktek Kerja Lapangan</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode PKL</label>
            <input type="text" class="form-control" name="kode_pkl"  placeholder="Masukan Kode_PKL" required value="{{$kode_pkl}}">
          </div>
            
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Wali Kelas</label>
            <input type="text" class="form-control" name="kode_walikelas"  placeholder="Masukan Kode_walikelas" required value="{{$kode_walikelas}}">
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
            <label>Mitra DUDI</label>
            <input type="text" class="form-control" name="mitra_dudi"  placeholder="Masukan Mitra DUDI" required value="{{$mitra_dudi}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" name="lokasi"  placeholder="Masukan Lokasi" required value="{{$lokasi}}">
          </div>
            
        </div>
        <div class="col-sm-4">
           <div class="form-group">
            <label>Masa / Bulan</label>
            <input type="text" class="form-control" name="masa_bulan"  placeholder="Masukan Masa / Bulan" required value="{{$masa_bulan}}">
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
