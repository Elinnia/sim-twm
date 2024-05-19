 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Lihat Nilai</h6>
</div>

<div class="card-body">
    <div class=" mt-4">
        <form class="form_nilai">
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
                </div>
            </div>

        </form>
        <div class="mt-3 data-show">
            
        </div>

    
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

@endsection

@section("javascript")
   
    <!-- Page level custom scripts -->

<script>
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
        $(".btn-filter").click(function(){
                get_data();
        });
    });

    function get_data(){
        var form  = $(".form_nilai").serializeArray();
        var url = "{{route('nilai.get_data_lihat')}}";
        $.ajax({
            type:'POST',
            data:form,
            url:url,
            beforeSend:function(){
                $(".data-show").html("");
            },
            success:function(data){
                console.log(data);
                var html=data;
                $(".data-show").html(html);

               
            },
            error:function(data){
                console.log(data);
            }
        });
    }

</script>

@endsection