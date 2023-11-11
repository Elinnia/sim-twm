 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Ekstrakurikuler</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{route('ekstrakurikuler.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode Ekstrakurikuler</label>
            <input type="text" class="form-control" name="kode_ekstrakurikuler"  placeholder="Masukan Kode_Ekstrakurikuler" required value="{{$kode_ekstrakurikuler}}"> 
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
            <label>Kegiatan Ekstrakurikuler</label>
            <select name="kegiatan_ekstrakurikuler"class="form-control" required>
                <option value="kegiatan_kepramukaan" 
                @if($kegiatan_ekstrakurikuler=="kegiatan_kepramukaan")"selected"@endif >Kegiatan Kepramukaan</option>
                 <option value="kegiatan_pencaksilat" @if($kegiatan_ekstrakurikuler=="kegiatan_pencaksilat")"selected"@endif>Kegiatan Pencaksilat</option>
                <option value="kegiatan_seni_musik"@if($kegiatan_ekstrakurikuler=="kegiatan_seni_musik")"selected"@endif>Kegiatan Seni Musik</option>
                <option value="kegiatan_sepak_bola"@if($kegiatan_ekstrakurikuler=="kegiatan_sepak_bola")"selected"@endif>Kegiatan Sepak Bola</option>
            </select>
            
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
