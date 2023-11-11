@extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
</div>

<div class="card-body">
   <a href="{{route('siswa.form','create')}}" class="btn btn-sm btn-primary">Tambah Siswa</a>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">Photo</th>
                   <th align="center" bgcolor="#F0F8FF">NISN</th>   
                   <th align="center" bgcolor="#F0F8FF">Nama</th>
                   <th align="center" bgcolor="#F0F8FF">Kelas</th>
                   <th align="center" bgcolor="#F0F8FF">Kode Jurusan</th>
                   <th align="center" bgcolor="#F0F8FF">Jenis Kelamin</th>
                   <th align="center" bgcolor="#F0F8FF">Status Siswa</th>
                      
                   <th align="center" bgcolor="#F0F8FF">Aksi</th>
                </tr>
       </thead>
    <tbody>
        @foreach($data as $d)
          <tr>
        <td><img src="{{ FileUpload::GetFile("siswa",$d['photo'])}}" height="100"></td>
                <td>{{$d['nisn']}}</td>
                <td>{{$d['nama_peserta_didik']}}</td>
                @php
                $status_siswa = "success";
                $kelas=$d["kelas"];
                if($d['status_siswa']=="pindah"){
                    $status_siswa = "warning";
                }
                else if($d['status_siswa']=="lulus"){
                    $status_siswa = "info";
                    $kelas="-";
                }
                @endphp
                <td>{{$kelas}}</td>
                <td>{{$d['kode_jurusan']}}</td>
                <td>{{$d['jenis_kelamin']}}</td>
                
                <td><span class="badge  badge-{{$status_siswa}}">{{ucfirst($d['status_siswa'])}}</span></td>
                <td>
                    <a href="{{route('siswa.form_akun',$d['nisn'])}}" class="btn btn-sm btn-info">Akun Siswa</a>
                    <a href="{{route('siswa.form',$d['nisn'])}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('siswa.delete',$d['nisn'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data siswa ?');">Hapus</a>
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