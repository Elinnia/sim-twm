   @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Kehadiran</h6>
</div>

<div class="card-body">
    <form class="form_kehadiran">
    
     <div class="row">
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Tahun Ajaran</label>
             <select name="id_tahun_ajaran" class="form-control select2">
                @foreach($dt_tahun_ajar as $d)
                    <option value="{{$d->id_tahun_ajaran}}">{{$d->tahun_ajaran}}</option>
                @endforeach
             </select>
          </div>
            
        </div>
        
         <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Kelas</label>
             <select name="kelas" class="form-control select2 list-kelas">
                @foreach($dt_kelas as $d)
                    <option value="{{$d}}">{{$d}}</option>
                @endforeach
             </select>
          </div>
            
        </div>

        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Semester</label>
            <select name="semester" class="form-control select2 semester list-semester">
                <option value="I">I</option>
                <option value="II">II</option>
            </select>
          </div>
            
        </div>

       
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Jurusan</label>
             <select name="kode_jurusan" class="form-control select2">
                @foreach($dt_jurusan as $d)
                    <option value="{{$d->kode_jurusan}}">{{$d->nama_jurusan}}</option>
                @endforeach
             </select>
          </div>
            
        </div>
        
        <div class="col-sm-3 mt-4">
           <button type="button" class="btn btn-sm btn-success btn-filter">Filter Data</button>
           <button type="button" class="btn btn-sm btn-primary btn-submit">Submit</button>
        </div>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                 <tr>
                   <th align="center" bgcolor="#F0F8FF">NISN</th>   
                   <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                   <th align="center" bgcolor="#F0F8FF">Sakit</th> 
                   <th align="center" bgcolor="#F0F8FF">Izin</th> 
                   <th align="center" bgcolor="#F0F8FF">Tanpa Keterangan</th>
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

            $(".btn-submit").click(function(){
                submit();
            });
        });
        
        function get_data(){
            var form  = $(".form_kehadiran").serializeArray();
            var url = '{{route('kehadiran.get_data')}}';
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
                    $.each(data,function(i,item){
                        html+=`<tr>
                            <td>
                                ${item.nisn}
                                <input type="hidden" name="nisn[]" value="${item.nisn}">
                                <input type="hidden" name="nama_peserta_didik[]" value="${item.nama_peserta_didik}">
                                
                                <input type="hidden" name="kode_kehadiran[]" value="${item.kode_kehadiran}">
                            </td>
                            <td>${item.nama_peserta_didik}</td>
                            
                            <td><input type='text' class='form-control form-control-sm sakit' name='sakit[]' value='${item.sakit}' placeholder="Sakit" ></td>
                            <td><input type='text' class='form-control form-control-sm izin' name='izin[]' value='${item.izin}'
                                placeholder="Izin"></td>
                            <td><input type='text' class='form-control form-control-sm tanpa_keterangan' name='tanpa_keterangan[]' value='${item.tanpa_keterangan}'
                                placeholder="Tanpa Keterangan"></td>


                        </tr>`;
                    });
                    $("#tb_data").html(html);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
        
        function submit(){
            var form  = $(".form_kehadiran").serializeArray();
            var url = '{{route('kehadiran.store')}}';
            $.ajax({
                type:'POST',
                data:form,
                url:url,
                beforeSend:function(){
                    Swal.showLoading();
                },
                success:function(data){
                    console.log(data);
                    Swal.fire({
                      icon: 'success',
                      title: 'Pemberitahuan',
                      text: 'Kehadiran berhasil di input'
                    })
                    get_data();
                },
                error:function(data){
                    console.log(data);
                    Swal.fire({
                      icon: 'error',
                      title: 'Pemberitahuan...',
                      text: 'Lengkapi Form data inputan'
                    })
                }
            });
        }
    </script>

@endsection




        
        




    

        

