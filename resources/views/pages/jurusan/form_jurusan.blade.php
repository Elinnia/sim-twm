 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Jurusan</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kode-Jurusan</label>
            <select name="kode_jurusan" class="form-control" required>
                <option value="01" @if($kode_jurusan=="01") selected @endif>01</option>
                <option value="02" @if($kode_jurusan=="02") selected @endif>02</option>
                <option value="03" @if($kode_jurusan=="03") selected @endif>03</option>
                <option value="04" @if($kode_jurusan=="04") selected @endif>04</option>
            </select>
         </div>
        </div>
      <div class="col-sm-4">
       <div class="form-group">
       <label>Nama-Jurusan</label>
        <select name="nama_jurusan"class="form-control" required>
         <option value="01" @if($nama_jurusan=="01") selected @endif>Mapel Umum</option>
         <option value="02" @if($nama_jurusan=="02") selected @endif>RPL</option>
         <option value="03" @if($nama_jurusan=="03") selected @endif>TEI</option>
         <option value="04" @if($nama_jurusan=="04") selected @endif>TKR</option>
        </select>
       </div>
      </div>
        
  
  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
