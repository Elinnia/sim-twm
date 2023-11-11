 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User</h6>
</div>

<div class="card-body">
 <a href="{{route('user.form','create')}}" class="btn btn-sm btn-primary">Tambah User</a>
    <div class="table-responsive mt-4">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th align="center" bgcolor="#F0F8FF">User Email</th>
          
          <th align="center" bgcolor="#F0F8FF">Guru / Staff</th>
          <th align="center" bgcolor="#F0F8FF">User Type</th> 
          <th align="center" bgcolor="#F0F8FF">User Lastlogin</th>  
          <th align="center" bgcolor="#F0F8FF">Aksi</th>
          </tr>    
       </thead>
    <tbody>
        @foreach($data as $d)
        @php
            $nama_guru = "-";
            if($d['guru']!=null){
                $nama_guru =  $d['guru']['nama_pendidik_dan_tenaga_kependidikan'];
            }
        @endphp
        <tr>
            <td>{{$d['user_email']}}</td>
            
            <td>{{$nama_guru}}</td>
            <td>{{$d['user_type']}}</td>
            <td>{{$d['user_lastlogin']}}</td>
            <td>
                <a href="{{route('user.form',$d['user_id'])}}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{route('user.delete',$d['user_id'])}}" class="btn btn-sm btn-danger" onclick="return confirm('Delete data user ?');">Hapus</a>
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