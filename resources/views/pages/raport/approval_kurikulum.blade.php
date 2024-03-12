@extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Approval Kurikulum</h6>
</div>

<div class="card-body">
    <form class="form_raport">
    <input type="hidden" name="type" value="akademik" />  
    <div class="row">
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Tahun Ajaran</label>
             <select name="form_id_tahun_ajaran" class="form-control select2">
                @foreach($dt_tahun_ajar as $d)
                    <option value="{{$d->id_tahun_ajaran}}">{{$d->tahun_ajaran}}</option>
                @endforeach
             </select>
          </div>
            
        </div>
        
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Kelas</label>
             <select name="form_kelas" class="form-control select2 list-kelas">
                @foreach($dt_kelas as $d)
                    <option value="{{$d}}">{{$d}}</option>
                @endforeach
             </select>
          </div>
            
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Semester</label>
            <select name="form_semester" class="form-control select2 semester list-semester">
                <option value="I">I</option>
                <option value="II">II</option>
                
            </select>
          </div>
            
        </div>

        
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Jurusan</label>
             <select name="form_kode_jurusan" class="form-control select2">
                @foreach($dt_jurusan as $d)
                    <option value="{{$d->kode_jurusan}}">{{$d->nama_jurusan}}</option>
                @endforeach
             </select>
          </div>
            
        </div>
       
        
        <div class="col-sm-3 mt-4">
           <button type="button" class="btn btn-sm btn-success btn-filter">Filter Data</button>
           <button type="button" class="btn btn-sm btn-primary btn-approve">Approve Raport</button>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">NISN</th>   
                   <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                   <th align="center" bgcolor="#F0F8FF">Status Raport</th>
                   <th align="center" bgcolor="#F0F8FF"> Raport </th> 
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
    <link href="{{asset('/')}}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <!-- Page level plugins -->
    <script src="{{asset('/')}}vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page level custom scripts -->
   
    <script type="text/javascript">
        var dataTable;
        var approve = false;
        $(document).ready(function(){
             $(".list-kelas").change(function(){
                var value = $(this).val();
                $(".list-semester").empty();
                if(value == "X"){
                    $(".list-semester").append(`<option value="I">I</option>`);
                    $(".list-semester").append(`<option value="II">II</option>`);
                }
                else if(value=="XI"){
                    $(".list-semester").append(`<option value="III">III</option>`);
                    $(".list-semester").append(`<option value="IV">IV</option>`);
                }
                else{
                    $(".list-semester").append(`<option value="V">V</option>`);
                    $(".list-semester").append(`<option value="VI">VI</option>`);
                }
                $(".list-semester").trigger("change");
            });
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

            $(".btn-approve").click(function(){
                
                if(!approve){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Informasi',
                        text: 'Tidak ada data raport yang di approve, lakukan filter data terlebih dahulu !'
                    });
                    
                }
                else{
                     Swal.fire({
                        title: 'Konfirmasi',
                        html: 'Apakah anda yakin ingin mengapprove raport ?',
                        icon: 'question',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Ya',
                        denyButtonText: `Tidak`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                approve_raport();
                            } 
                        });
                }
               
            });

            
        });
        
        function get_data(){
            var form  = $(".form_raport").serializeArray();
            var url = "{{route('raport.get_data_kurikulum')}}";
            
            $.ajax({
                type:'POST',
                data:form,
                url:url,
                beforeSend:function(){
                    approve = false;
                    $(".tb_data").html(``);
                },
                success:function(data){
                    console.log(data);
                    var html="";
                    var semester  = $("select[name='semester'] option:selected").val();
                    $.each(data,function(i,item){
                        var status_raport = `<span class="badge badge-sm badge-danger">Belum Approve Kurikulum</span>`;
                        
                        if(item.raport.approve_akademik!=null){
                            status_raport = `<span class="badge badge-sm badge-success">Sudah Approve Kurikulum</span>`;
                        }
                        html+=`<tr>
                            <td>
                                <input type="hidden" name="nisn[]" value="${item.nisn}" />
                                <input type="hidden" name="raport_id[]" value="${item.raport_id}" />
                                <input type="hidden" name="id_tahun_ajaran[]" value="${item.id_tahun_ajaran}" />
                                <input type="hidden" name="kelas[]" value="${item.kelas}" />
                                <input type="hidden" name="kode_jurusan[]" value="${item.kode_jurusan}" />
                                <input type="hidden" name="semester[]" value="${item.semester}" />
                                <input type="hidden" name="kode_walikelas[]" value="${item.kode_walikelas}" />
                                <input type="hidden" name="nip[]" value="${item.nip}" />
                                ${item.nisn}
                            </td>
                            <td>${item.nama_peserta_didik}</td>
                            <td>${status_raport}</td>
                            <td>
                                <a target='__blank' href='{{route('raport.cetak')}}?nisn=${item.nisn}&&semester=${item.semester}&&id_tahun_ajaran=${item.id_tahun_ajaran}&&kelas=${item.kelas}&&kode_jurusan=${item.kode_jurusan}' class='btn btn-sm btn-danger'>CETAK RAPORT</a>
                            </td>
                        </tr>`;
                        approve = true;
                    });
                    $("#tb_data").html(html);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }

        function approve_raport(){
            var form  = $(".form_raport").serializeArray();
            var url = "{{route('raport.approve_raport')}}";
            
            $.ajax({
                type:'POST',
                data:form,
                url:url,
                beforeSend:function(){
                    
                },
                success:function(data){
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Informasi',
                        text: 'Raport berhasil di approve'
                    });

                    get_data();
                    
                },
                error:function(data){
                    console.log(data);
                }
            });
        }


    </script>

@endsection

