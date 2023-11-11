 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Wali Kelas</h6>
</div>

<div class="card-body">
    <a href="{{route('walikelas.form','create')}}" class="btn btn-sm btn-primary">Tambah Wali Kelas</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Tahun Ajar</th>
                   <th align="center" bgcolor="#F0F8FF">Kelas</th>
                   
                  
                   <th align="center" bgcolor="#F0F8FF">Jurusan</th>
                    <th align="center" bgcolor="#F0F8FF">Guru</th> 
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d['tahun_ajar']['tahun_ajaran']}}</td>
                <td>{{$d['kelas']}}</td>
                <td>{{$d['jurusan']['nama_jurusan']}}</td>
                <td>{{$d['guru']['nama_pendidik_dan_tenaga_kependidikan']}}</td>
               
                <td>
                    <a href="{{route('walikelas.form',$d['kode_walikelas'])}}" class="btn btn-sm btn-warning">Edit</a>

                   <a href="{{route('walikelas.delete',$d['kode_walikelas'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data walikelas ?');">Hapus</a>                                 
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