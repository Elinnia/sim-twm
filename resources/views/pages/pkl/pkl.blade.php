 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Praktek Kerja Lapangan</h6>
</div>

<div class="card-body">
    <a href="{{route('pkl.form','create')}}" class="btn btn-sm btn-primary">Tambah Praktek Kerja Lapangan</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Kode PKL</th>
                   <th align="center" bgcolor="#F0F8FF">Kode Wali Kelas</th>
                   <th align="center" bgcolor="#F0F8FF">NISN</th>
                   <th align="center" bgcolor="#F0F8FF">Mitra DUDI</th>   
                   <th align="center" bgcolor="#F0F8FF">Lokasi</th>
                   <th align="center" bgcolor="#F0F8FF">Masa / Bulan</th>  
                   <th align="center" bgcolor="#F0F8FF">Keterangan</th>
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d['kode_pkl']}}</td>
                <td>{{$d['kode_walikelas']}}</td>
                <td>{{$d['nisn']}}</td>
                <td>{{$d['mitra_dudi']}}</td>
                <td>{{$d['lokasi']}}</td>
                <td>{{$d['masa_bulan']}}</td>
                <td>{{$d['keterangan']}}</td>
                <td>
                    
                     <a href="{{route('pkl.form',$d['kode_pkl'])}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('pkl.delete',$d['kode_pkl'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data pkl ?');">Hapus</a>
                    
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