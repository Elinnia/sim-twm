 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Kalender Akademik</h6>
</div>

<div class="card-body">
    <a href="{{route('kalender.form','create')}}" class="btn btn-sm btn-primary">Tambah Kalender Akademik</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Tahun Ajar</th>
                   <th align="center" bgcolor="#F0F8FF">Tanggal</th>
                   <th align="center" bgcolor="#F0F8FF">Deskripsi</th>
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d['tahun_ajar']['tahun_ajaran']}}</td>
                <td>{{$d['kalender_date']}}</td>
                <td>{{$d['kalender_deskripsi']}}</td>
               
                <td>
                    <a href="{{route('kalender.form',$d['kalender_id'])}}" class="btn btn-sm btn-warning">Edit</a>

                   <a href="{{route('kalender.delete',$d['kalender_id'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data kalender ?');">Hapus</a>                                 
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