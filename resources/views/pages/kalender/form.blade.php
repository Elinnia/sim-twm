 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Kalender</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
     
      
        <div class="col-sm-6">
           <div class="form-group">
            <label>Tahun Ajar</label>
            <select name="id_tahun_ajaran" class="form-control select2" data-selected="{{$id_tahun_ajaran}}">
               @foreach($dt_tahun_ajar as $dt)
                  @php
                     $selected = "";
                     if($dt->id_tahun_ajaran == $id_tahun_ajaran){
                        $selected = "selected";
                     }
                  @endphp
                  <option value="{{$dt->id_tahun_ajaran}}" {{$selected}}>{{$dt->tahun_ajaran}}</option>
               @endforeach
            </select>
         </div>
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label>Tanggal</label>
            <input required type="date" name="kalender_date" class="form-control" value="{{$kalender_date}}" />
         </div>
        </div>

        <div class="col-sm-12">
           <div class="form-group">
            <label>Deskripsi</label>
             <textarea required name="kalender_deskripsi" class="form-control" rows="5" cols="10">{{$kalender_deskripsi}}</textarea>
         </div>
        </div>
  
  

</div>
 <button type="submit" class="btn btn-primary" >Submit </button>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
