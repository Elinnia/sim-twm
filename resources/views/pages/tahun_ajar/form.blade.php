 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Tahun Ajar</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label>Tahun Pelajaran</label>
            <input type="text" class="form-control" name="tahun_ajaran"  placeholder="Masukan Tahun Pelajaran" required value="{{$tahun_pelajaran}}">
          </div>
      </div>
    </div>
     
     
        
  
  <button type="submit" class="btn btn-primary" >Submit</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
