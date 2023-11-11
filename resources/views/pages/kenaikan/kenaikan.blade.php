 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Kenaikan Kelas</h6>
</div>

<div class="card-body">
    <a href="{{route('kenaikan.form','create')}}" class="btn btn-sm btn-primary">Tambah Kenaikan Kelas</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">NISN</th>   
                   <th align="center" bgcolor="#F0F8FF">Keterangan</th>
                   <th align="center" bgcolor="#F0F8FF">Naik Kelas</th> 
                   <th align="center" bgcolor="#F0F8FF">Tahun</th>
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d['nisn']}}</td>
                <td>{{$d['keterangan']}}</td>
                <td>{{$d['naik_kelas']}}</td>
                <td>{{$d['tahun']}}</td>
                <td>
                    <a href="{{route('kenaikan.form',$d['kode_kenaikan_kelas'])}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('kenaikan.delete',$d['kode_kenaikan_kelas'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data Kenaikan ?');">Hapus</a>
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