 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Wali Kelas</h6>
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
            <label>Guru</label>
            <select name="nip" class="form-control select2" data-selected="{{$nip}}">
               @foreach($dt_guru as $dt)
                 @php
                  $selected = "";
                  if($dt->nip == $nip){
                     $selected = "selected";
                  }
                  @endphp
                  <option value="{{$dt->nip}}" {{$selected}}>{{$dt->nama_pendidik_dan_tenaga_kependidikan}}</option>
               @endforeach
            </select>
         </div>
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label>Jurusan</label>
             <select name="kode_jurusan" class="form-control select2" data-selected="{{$kode_jurusan}}">
               @foreach($dt_jurusan as $dt)
                   @php
                  $selected = "";
                  if($dt->kode_jurusan == $kode_jurusan){
                     $selected = "selected";
                  }
                  @endphp
                  <option value="{{$dt->kode_jurusan}}" {{$selected}}>{{$dt->nama_jurusan}}</option>
               @endforeach
            </select>
         </div>
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control select2" data-selected="{{$kelas}}">
               @foreach($dt_kelas as $dt)
               @php
                  $selected = "";
                  if($dt == $kelas){
                     $selected = "selected";
                  }
                  @endphp
                  <option value="{{$dt}}" {{$selected}}>{{$dt}}</option>
               @endforeach
            </select>
         </div>
        </div>
  
  

</div>
 <button type="submit" class="btn btn-primary" >Submit </button>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
