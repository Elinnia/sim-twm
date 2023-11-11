 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Profil SMK Taruna Wiyatamandala</h6>
</div>

<div class="card-body">
    <a href="{{route('profil.form','create')}}" class="btn btn-sm btn-primary">Tambah Profil SMK Taruna Wiyatamandala</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Nama Sekolah</th>   
                   <th align="center" bgcolor="#F0F8FF">NPSN</th>
                   <th align="center" bgcolor="#F0F8FF">NIS/NSS/NDS</th>  
                   <th align="center" bgcolor="#F0F8FF">Alamat Sekolah</th>
                   <th align="center" bgcolor="#F0F8FF">Kelurahan</th>
                   <th align="center" bgcolor="#F0F8FF">Kecamatan</th>
                   <th align="center" bgcolor="#F0F8FF">Kabupaten/Kota</th>
                   <th align="center" bgcolor="#F0F8FF">Provinsi</th>
                   <th align="center" bgcolor="#F0F8FF">Website</th>
                   <th align="center" bgcolor="#F0F8FF">Email</th>
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d['nama sekolah']}}</td>
                <td>{{$d['npsn']}}</td>
                <td>{{$d['nis_nss_nds']}}</td>
                <td>{{$d['alamat_sekolah']}}</td>
                <td>{{$d['kelurahan']}}</td>
                <td>{{$d['kecamatan']}}</td>
                <td>{{$d['kabupaten_kota']}}</td>
                <td>{{$d['provinsi']}}</td>
                <td>{{$d['website']}}</td>
                <td>{{$d['email']}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('profil.delete',$d['npsn'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data profil ?');">Hapus</a>
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