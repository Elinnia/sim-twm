 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Mata Pelajaran</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-6">
           <div class="form-group">
            <label>Kode Mapel</label>
            <input type="text" class="form-control" name="kode_mapel"  placeholder="Masukan Kode Mapel" required value="{{$kode_mapel}}">
          </div>
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label>Nama Mapel</label>
            <input type="text" class="form-control" name="nama_mapel"  placeholder="Masukan Nama Mapel" required value="{{$nama_mapel}}">
          </div>
        </div>

        

        <div class="col-sm-4">
           <div class="form-group">
            <label>Nama Guru</label>
             <select name="nip" class="form-control select2" data-placeholder="Pilih Guru">
                 @foreach($dt_guru as $dg)
                    @php
                    $selected = "";
                    if($dg['nip'] == $nip){
                      $selected = "selected";
                    }
                    @endphp
                    <option {{$selected}} value="{{$dg['nip']}}">{{$dg['nama_pendidik_dan_tenaga_kependidikan']}}</option>
                 @endforeach
             </select>
          </div>    
        </div>
        
        <div class="col-sm-4">
           <div class="form-group">
            <label>Kelas</label>
             <select name="kelas" class="form-control select2">
                <option value="X" @if($kelas=="X") selected @endif>X</option>
                <option value="XI" @if($kelas=="XI") selected @endif>XI</option>
                <option value="XII" @if($kelas=="XII") selected @endif>XII</option>
             </select>
          </div>    
        </div>

        <div class="col-sm-4">
           <div class="form-group">
            <label>Jurusan</label>
           <select name="kode_jurusan" class="form-control select2" data-placeholder="Pilih Jurusan">
                 @foreach($dt_jurusan as $dg)
                    @php
                    $selected = "";
                    if($dg['kode_jurusan'] == $kode_jurusan){
                      $selected = "selected";
                    }
                    @endphp
                    <option {{$selected}} value="{{$dg['kode_jurusan']}}">{{$dg['nama_jurusan']}}</option>
                 @endforeach
             </select>
          </div>    
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label>Muatan</label>
             <select name="kode_muatan" class="form-control select2 select-muatan" data-placeholder="Pilih Muatan">
                 @foreach($dt_muatan as $dg)
                    @php
                    $selected = "";
                    if($dg['kode_muatan'] == $kode_muatan){
                      $selected = "selected";
                    }
                    @endphp
                    <option {{$selected}} value="{{$dg['kode_muatan']}}">{{$dg['keterangan']}}</option>
                 @endforeach
             </select>
          </div>    
        </div>
        
        <div class="col-sm-6">
           <div class="form-group ">
            <label>Sub Muatan</label>
             <select name="kode_submuatan" class="form-control sub-muatan select2" data-placeholder="Pilih Submuatan" disabled>
                 @foreach($dt_submuatan as $dg)
                    @php
                    $selected = "";
                    if($dg['kode_submuatan'] == $kode_submuatan){
                      $selected = "selected";
                    }
                    @endphp
                    <option value="{{$dg['kode_submuatan']}}">{{$dg['keterangan']}}</option>
                 @endforeach
             </select>
          </div>    
        </div>
  <div class="col-sm-12" >
    <button type="submit" class="btn btn-primary" >Update Data</button>
    </div>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
@section("javascript")
<script type="text/javascript">
    $(document).ready(function(){
        $(".select-muatan").on("select2:select", function(e) {
            var val = $(this).val();
            if(val==3){
                $(".sub-muatan").attr("disabled",false);
            }
            else{
                $(".sub-muatan").attr("disabled",true);
            }
        });
    });
</script>
@endsection
