@extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Cetak Raport</h6>
</div>

<div class="card-body">
    <form class="form_raport">
    <div class="row">
         <div class="col-sm-12">
           <div class="form-group">
            <label class="text-primary">Wali Kelas</label>
            <select name="kode_walikelas" class="form-control select2 kode_walikelas">
                <option value="" selected disabled>Pilih Wali Kelas</option>
                @foreach($dt_walikelas as $d)
                    @if($d['guru']!=null)
                        <option value="{{$d['kode_walikelas']}}" data-jurusan="{{$d['kode_jurusan']}}" data-kelas="{{$d['kelas']}}">{{$d['guru']['nama_pendidik_dan_tenaga_kependidikan']}} - {{$d['kelas']}} ({{strtoupper($d['jurusan']['nama_jurusan'])}})</option>
                    @endif
                @endforeach
            </select>
          </div>
            
        </div>
        </div>
      
    <div class="row">
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Semester</label>
            <select name="semester" class="form-control select2 semester">
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
            </select>
          </div>
            
        </div>
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Tahun Ajaran</label>
             <input type="text" name="tahun_ajaran" class="form-control form-control-sm">
          </div>
            
        </div>
        
        <div class="col-sm-3 mt-4">
           <button type="button" class="btn btn-sm btn-success btn-filter">Filter Data</button>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">NISN</th>   
                   <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                   <th align="center" bgcolor="#F0F8FF">Kelas</th> 
                   <th align="center" bgcolor="#F0F8FF">Jurusan</th> 
                   <th align="center" bgcolor="#F0F8FF">Cetak</th> 
                </tr>
    </thead>
    <tbody id="tb_data">
       
    </tbody>
    </table>
  
    </div>
    </form>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page level custom scripts -->
   
    <script type="text/javascript">
        var dataTable;
        $(document).ready(function(){
            dataTable = $('#dataTable').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
            $(".kode_walikelas").on("select2:select", function(e) {
                var val = $(this).val();
                
            });
            $(".btn-filter").click(function(){
                get_data();
            });

            
        });
        
        function get_data(){
            var form  = $(".form_raport").serializeArray();
            var url = "{{route('raport.get_data')}}";
            $.ajax({
                type:'POST',
                data:form,
                url:url,
                beforeSend:function(){
                    $(".tb_data").html(``);
                },
                success:function(data){
                    console.log(data);
                    var html="";
                    var semester  = $("select[name='semester'] option:selected").val();
                    $.each(data,function(i,item){
                        html+=`<tr>
                            <td>
                                ${item.nisn}
                            </td>
                            <td>${item.nama_peserta_didik}</td>
                            <td>${item.kelas}</td>
                            <td>${item.jurusan.nama_jurusan}</td>
                            <td>
                                <a target='__blank' href='{{route('raport.cetak')}}?nisn=${item.nisn}&&semester=${semester}' class='btn btn-sm btn-danger'>CETAK RAPORT</a>
                            </td>
                        </tr>`;
                    });
                    $("#tb_data").html(html);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
    </script>

@endsection

