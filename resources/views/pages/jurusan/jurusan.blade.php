 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Jurusan</h6>
</div>

<div class="card-body">
   <!-- <a href="{{route('jurusan.form','create')}}" class="btn btn-sm btn-primary">Tambah Jurusan</a>!-->
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Kode-Jurusan</th>   
                   <th align="center" bgcolor="#F0F8FF">Nama-Jurusan</th> 
                  <!-- <th align="center" bgcolor="#F0F8FF">Aksi</th>!-->
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d['kode_jurusan']}}</td>
                <td>{{$d['nama_jurusan']}}</td>
                <!--<td>
                    <a href="{{route('jurusan.form',$d['kode_jurusan'])}}" class="btn btn-sm btn-warning">Edit</a>

                   <a href="{{route('jurusan.delete',$d['kode_jurusan'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data jurusan ?');">Hapus</a>                                 
                </td>!-->

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