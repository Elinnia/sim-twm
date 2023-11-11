 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tahun Pelajaran</h6>
</div>

<div class="card-body">
    <a href="{{route('tahun_ajar.form','create')}}" class="btn btn-sm btn-primary">Tambah Tahun Ajar</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Tahun Pelajaran</th> 
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($dt_tahun_ajar as $d)
            <tr>
                <td>{{$d['tahun_ajaran']}}</td>
                <td>
                    <a href="{{route('tahun_ajar.form',$d['id_tahun_ajaran'])}}" class="btn btn-sm btn-warning">Edit</a>

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