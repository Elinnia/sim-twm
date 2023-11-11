
@extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Mata Pelajaran</h6>
</div>

<div class="card-body">
    <a href="{{route('mapel.form','create')}}" class="btn btn-sm btn-primary">Tambah Mata Pelajaran</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Kode Mapel</th>   
                   <th align="center" bgcolor="#F0F8FF">Nama Mapel</th>
                   <th align="center" bgcolor="#F0F8FF">Nama Guru</th>
                   <th align="center" bgcolor="#F0F8FF">Kelas</th> 
                   <th align="center" bgcolor="#F0F8FF">Jurusan</th>
                   <th align="center" bgcolor="#F0F8FF">Muatan</th>
                   <th align="center" bgcolor="#F0F8FF">Sub Muatan</th>
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        
            <tr>
                <td>{{$d['kode_mapel']}}</td>
                <td>{{$d['nama_mapel']}}</td>
                <td>{{$d->guru->nama_pendidik_dan_tenaga_kependidikan}}</td>
                <td>{{$d['kelas']}}</td>
                <td>{{$d->jurusan->nama_jurusan}}</td>
                <td>{{$d->muatan->keterangan}}</td>
                @php
                    $submuatan = "-";
                    if($d->submuatan!=null){
                        $submuatan = $d->submuatan->keterangan;
                    }
                @endphp
                <td>{{$submuatan}}</td>
                
                <td>
                     <a href="{{route('mapel.form',$d['kode_mapel'])}}" class="btn btn-sm btn-warning">Edit</a>

                    <a href="{{route('mapel.delete',$d['kode_mapel'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data mapel ?');">Hapus</a>
                    
                </td>

            </tr>
        @endforeach
    </tbody>
    </table>
  
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

@endsection

@section("javascript")
<!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

@endsection