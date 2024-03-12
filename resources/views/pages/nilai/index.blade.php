
@extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Nilai Akademik</h6>
</div>

<div class="card-body">
    <form class="form_nilai">
   
    <div class="row">
        <div class="col-sm-12">
           <div class="form-group">
            <label class="text-primary">Guru</label>
             @if($nip!=null)
                <input type="hidden" name="nip" value="{{$nip}}" />
             @endif
                       
            <select name="nip" class="form-control select2 nip" @if($nip!=null) disabled  @endif>
                <option value="" selected disabled>Pilih Guru Mapel</option>
                @foreach($dt_guru as $d)
                    @php
                    $selected="";
                    if($nip!=null){
                        if($nip==$d->nip){
                            $selected = "selected";
                        }
                    }
                    @endphp
                    <option {{$selected}} value="{{ $d->nip }}">{{ $d->nama_pendidik_dan_tenaga_kependidikan }}</option>
                
                @endforeach
            </select>
          </div>
            
        </div>
        
       </div>
       <div class="row">
        <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">Mapel</label>
            <select name="kode_mapel" class="form-control select2 kode_mapel">
                
            </select>
          </div>
            
        </div>

         <div class="col-sm-6">
           <div class="form-group">
            <label class="text-primary">KKM</label>
             <input type="text" name="kkm" class="form-control form-control-sm">
          </div>
            
        </div>


        
    </div>

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
                   <th align="center" bgcolor="#F0F8FF">Nilai Tugas</th>  
                   <th align="center" bgcolor="#F0F8FF">Nilai UTS</th>  
                   <th align="center" bgcolor="#F0F8FF">Nilai UAS</th>  
                   
                   <th align="center" bgcolor="#F0F8FF">Nilai Pengetahuan</th>  
                   <th align="center" bgcolor="#F0F8FF">Nilai Keterampilan</th>
                   <th align="center" bgcolor="#F0F8FF">Nilai Akhir</th>
                   <th align="center" bgcolor="#F0F8FF">Predikat</th>
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
                get_mapel(val);
            });
            $(".btn-filter").click(function(){
                get_data();
            });

            $(".btn-submit").click(function(){
                submit();
            });

            @if($nip!=null)
                $(".nip").trigger("change");
            @endif

        

        });

        $(document).on('keyup change','.nilai_tugas',function(){
            var nilai_tugas = $(this).val();
            if(nilai_tugas.length>0){
                var nilai_pengetahuan = $(this).parent().parent().find(".nilai_pengetahuan");
                var nilai_uts = parseFloat($(this).parent().parent().find(".nilai_uts").val());
                var nilai_uas = parseFloat($(this).parent().parent().find(".nilai_uas").val());
              
                var nilai_p = parseFloat((parseFloat(nilai_tugas) + nilai_uts + nilai_uas) / 3) ;
                
                nilai_pengetahuan.val(nilai_p.toFixed(2));


                nilai_pengetahuan.trigger("keyup");
            }
        });

        $(document).on('keyup change','.nilai_uts',function(){
            var nilai_uts = $(this).val();
            if(nilai_uts.length>0){
                var nilai_pengetahuan = $(this).parent().parent().find(".nilai_pengetahuan");
                var nilai_tugas = parseFloat($(this).parent().parent().find(".nilai_tugas").val());
                var nilai_uas = parseFloat($(this).parent().parent().find(".nilai_uas").val());
                
                var nilai_p = parseFloat((nilai_tugas + parseFloat(nilai_uts) + nilai_uas) / 3) ;
                
                nilai_pengetahuan.val(nilai_p.toFixed(2));


                nilai_pengetahuan.trigger("keyup");
            }
        });

        $(document).on('keyup change','.nilai_uas',function(){
            var nilai_uas = $(this).val();
            if(nilai_uas.length>0){
                var nilai_pengetahuan = $(this).parent().parent().find(".nilai_pengetahuan");
                var nilai_tugas = parseFloat($(this).parent().parent().find(".nilai_tugas").val());
                var nilai_uts = parseFloat($(this).parent().parent().find(".nilai_uts").val());
                
                var nilai_p = parseFloat((nilai_tugas + nilai_uts + parseFloat(nilai_uas)) / 3) ;
                
                nilai_pengetahuan.val(nilai_p.toFixed(2));


                nilai_pengetahuan.trigger("keyup");
            }
        });


        $(document).on('keyup change','.nilai_pengetahuan',function(){
            var nilai_pengetahuan = $(this).val();
            if(nilai_pengetahuan.length>0){
                var nilai_keterampilan = $(this).parent().parent().find(".nilai_keterampilan").val();
                var nilai_akhir = (parseFloat(nilai_pengetahuan)+parseFloat(nilai_keterampilan))/2;
                $(this).parent().parent().find(".nilai_akhir").val(nilai_akhir.toFixed(2));
                var predikat = "E";
                if(nilai_akhir>=86 && nilai_akhir<=100){
                    predikat = "A";
                }
                else if(nilai_akhir>=75 && nilai_akhir<=85){
                    predikat = "B";
                }
                else if(nilai_akhir>=60 && nilai_akhir<=74){
                    predikat = "C";
                }
                else if(nilai_akhir>=45 && nilai_akhir<=60){
                    predikat = "D";
                }
                else{
                    predikat = "E";
                }
                $(this).parent().parent().find(".predikat").val(predikat);
            }
        });
        $('.nip').on('change', function(){
            get_mapel(this.value);
        });
        $(document).on('keyup change','.nilai_keterampilan',function(){
            var nilai_keterampilan = $(this).val();
            if(nilai_keterampilan.length>0){
                var nilai_pengetahuan = $(this).parent().parent().find(".nilai_pengetahuan").val();
                var nilai_akhir = (parseFloat(nilai_pengetahuan)+parseFloat(nilai_keterampilan))/2;
                $(this).parent().parent().find(".nilai_akhir").val(nilai_akhir.toFixed(2));
                var predikat = "E";
                if(nilai_akhir>=85 && nilai_akhir<=100){
                    predikat = "A";
                }
                else if(nilai_akhir>=75 && nilai_akhir<=85){
                    predikat = "B";
                }
                else if(nilai_akhir>=60 && nilai_akhir<75){
                    predikat = "C";
                }
                else if(nilai_akhir>=45 && nilai_akhir<60){
                    predikat = "D";
                }
                else{
                    predikat = "E";
                }
                $(this).parent().parent().find(".predikat").val(predikat);
            }
        });
        function get_data(){
            var form  = $(".form_nilai").serializeArray();
            var url = "{{route('nilai.get_data')}}";
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
                                <input type="hidden" name="kode_nilai[]" value="${item.kode_nilai}">
                            </td>
                            <td>${item.nama_peserta_didik}</td>
                            <td><input type='text'  class='form-control form-control-sm nilai_tugas' name='nilai_tugas[]' value='${item.nilai_tugas}'></td>
                            <td><input type='text'  class='form-control form-control-sm nilai_uts' name='nilai_uts[]' value='${item.nilai_uts}'></td>
                            <td><input type='text'  class='form-control form-control-sm nilai_uas' name='nilai_uas[]' value='${item.nilai_uas}'></td>
                            <td><input type='text' readonly class='form-control form-control-sm nilai_pengetahuan' name='nilai_pengetahuan[]' value='${item.nilai_pengetahuan}'></td>
                            <td><input type='text' class='form-control form-control-sm nilai_keterampilan' name='nilai_keterampilan[]' value='${item.nilai_keterampilan}'></td>
                            <td><input type='number' class='form-control form-control-sm nilai_akhir' name='nilai_akhir[]' value='${item.nilai_akhir}' readonly></td>
                            <td><input type='text' class='form-control form-control-sm predikat' name='predikat[]' value='${item.predikat}' readonly></td>
                        </tr>`;
                    });
                    $("#tb_data").html(html);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
        function get_mapel(nip){
             var url = "{{route('nilai.get_mapel')}}";
             $.ajax({
                type:'POST',
                data:{nip:nip},
                url:url,
                beforeSend:function(){
                    $(".kode_mapel").html(`<option value='' selected="selected"> Loading ... </option>`);
                },
                success:function(data){
                    console.log(data);
                    var html = "";
                    $.each(data,function(i,item){
                        var selected = "";
                        html+=`<option value='${item.kode_mapel}' selected='${selected}'> ${item.kode_mapel} - ${item.nama_mapel} - ${item.kelas} </option>`;
                    });
                    $(".kode_mapel").html(html);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
        function submit(){
            var form  = $(".form_nilai").serializeArray();
            var url = "{{route('nilai.store')}}";
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
                      text: 'Nilai berhasil di input'
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

