 @extends('layout/layout')
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form User</h6>
</div>

<div class="card-body">
    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
        <div class="col-sm-6">
           <div class="form-group">
            <label>User Email</label>
            <input type="text" class="form-control" name="user_email"  placeholder="Masukan User Email" required value="{{$user_email}}">
          </div>
            
        </div>
        <div class="col-sm-6">
           <div class="form-group">
            <label>User Password</label>
            <input type="password" class="form-control" name="user_password"  placeholder="Masukan User Password"   @if(strlen($user_password)<1) required @endif>
          </div> 

          @if(strlen($user_password)>0)
            <div class="alert alert-info" role="alert">
             Kosongkan form password bila tidak mengubah
            </div>
          @endif

        </div>
         <div class="col-sm-6">
           <div class="form-group">
            <label>Guru / Staff</label>
            <select name="user_conid" class="form-control select2">
              @foreach($data_guru as $dg)
              @php
                $selected = "";
                if($dg['nip']==$user_conid){
                    $selected = "selected";
                }
              @endphp
              <option value="{{$dg['nip']}}" {{$selected}}>{{$dg['nama_pendidik_dan_tenaga_kependidikan']}}</option>
              @endforeach
            </select>
          </div>
            
        </div>
        <div class="col-sm-6">
           <div class="form-group">
            <label>User Type</label>
             <select name="user_type" class="form-control select2">
              @foreach($data_user_type as $dg)
              @php
                $selected = "";
                if($dg==$user_type){
                    $selected = "selected";
                }
              @endphp
              <option value="{{$dg}}" {{$selected}}>{{$dg}}</option>
              @endforeach
            </select>
          </div>
            
        </div>
     
    </div>

  <button type="submit" class="btn btn-primary" >Update Data</button>

</div>
</form>
</div>

</div>
<!-- /.container-fluid -->

@endsection
