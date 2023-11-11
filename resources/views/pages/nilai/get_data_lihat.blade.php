@if($nip==null)
    <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1">Nilai Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2">Catatan Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3">Catatan PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab4">Catatan Ekstrakurikuler</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab5">Kehadiran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab6">Catatan Karakter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab7">Deskripsi Karakter</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab1" class="tab-pane fade show active">
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-primary">Mapel</label>
                                        <select name="mapel" class="form-control select2 select_mapel">
                                           <option value="">Semua Mapel</option>
                                           @foreach($data_mapel as $dm)
                                                <option value="{{$dm->nama_mapel}}">{{$dm->nama_mapel}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    
                             </div>
                        </div>
                        <table class="table table-bordered" id="tbl_nilai_akademik" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>   
                                    <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Mapel</th>
                                    <th align="center" bgcolor="#F0F8FF">KKM</th>
                                    <th align="center" bgcolor="#F0F8FF">Nilai Tugas</th>  
                                    <th align="center" bgcolor="#F0F8FF">Nilai UTS</th>  
                                    <th align="center" bgcolor="#F0F8FF">Nilai UAS</th>  
                                    
                                    <th align="center" bgcolor="#F0F8FF">Nilai Pengetahuan</th>  
                                    <th align="center" bgcolor="#F0F8FF">Nilai Keterampilan</th>
                                    <th align="center" bgcolor="#F0F8FF">Nilai Akhir</th>
                                    <th align="center" bgcolor="#F0F8FF">Predikat</th>
                                    <th align="center" bgcolor="#F0F8FF">Keterangan</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data_nilai_akademik as $dn)
                                @php
                                    $keterangan = "<span class='badge badge-danger'>Tidak Lulus</span>";
                                    if($dn->nilai_akhir >= $dn->kkm){
                                        $keterangan = "<span class='badge badge-success'>Lulus</span>";
                                    }
                                @endphp
                                <tr>
                                    <td>{{$dn->nisn}}</td>
                                    <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                    <td>{{$dn->mapel->nama_mapel}}</td>
                                    <td>{{$dn->kkm}}</td>
                                    <td>{{$dn->nilai_tugas}}</td>
                                    <td>{{$dn->nilai_uts}}</td>
                                    <td>{{$dn->nilai_uas}}</td>
                                    <td>{{$dn->nilai_pengetahuan}}</td>
                                    <td>{{$dn->nilai_keterampilan}}</td>
                                    <td>{{$dn->nilai_akhir}}</td>
                                    <td>{{$dn->predikat}}</td>
                                    <td>{!!$keterangan!!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div id="tab2" class="tab-pane fade">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered my-3" id="tbl_catatan_akademik" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>   
                                    <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Catatan Akademik</th>  
                                    </tr>
                                </thead>
                                <tbody id="tb_data">
                                @foreach($data_catatan_akademik as $dn)
                                     <tr>
                                        <td>{{$dn->nisn}}</td>
                                        <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                        <td>{{$dn->keterangan}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <div id="tab3" class="tab-pane fade">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="tbl_catatan_pkl" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>
                                    <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Mitra DUDI</th>   
                                    <th align="center" bgcolor="#F0F8FF">Lokasi</th>
                                    <th align="center" bgcolor="#F0F8FF">Masa / Bulan</th>  
                                    <th align="center" bgcolor="#F0F8FF">Keterangan</th> 
                                    </tr>
                                </thead>
                                <tbody id="tb_data">
                                @foreach($data_pkl as $dn)
                                     <tr>
                                        <td>{{$dn->nisn}}</td>
                                        <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                        <td>{{$dn->mitra_dudi}}</td>
                                        <td>{{$dn->lokasi}}</td>
                                        <td>{{$dn->masa}}</td>
                                        <td>{{$dn->keterangan}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <div id="tab4" class="tab-pane fade">
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-primary">Eskul</label>
                                        <select name="mapel" class="form-control select2 select_eskul">
                                           <option value="">Semua Eskul</option>
                                            <option value="Kegiatan Kepramukaan">Kegiatan Kepramukaan</option>
                                            <option value="Kegiatan Seni Musik">Kegiatan Seni Musik</option>
                                            <option value="Kegiatan Sepak Bola">Kegiatan Sepak Bola</option>
                                            <option value="Kegiatan Pencaksilat">Kegiatan Pencaksilat</option>
                                            <option value="Kegiatan Seni Tari">Kegiatan Seni Tari</option>
       
                                           
                                        </select>
                                    </div>
                                    
                             </div>
                        </div>
                         <table class="table table-bordered" id="tbl_catatan_eskul" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>   
                                    <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Eskul</th>
                                    <th align="center" bgcolor="#F0F8FF">Keterangan</th>  
                                    </tr>
                        </thead>
                        <tbody id="tb_data">
                            @foreach($data_eskul as $dn)
                                     <tr>
                                        <td>{{$dn->nisn}}</td>
                                        <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                        <td>{{ucwords(str_replace("_"," ",$dn->kegiatan_ekstrakurikuler))}}</td>
                                        <td>{{$dn->keterangan}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div id="tab5" class="tab-pane fade">
                    <div class="table-responsive mt-3">
                         <table class="table table-bordered" id="tbl_kehadiran" width="100%" cellspacing="0">
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
                             @foreach($data_kehadiran as $dn)
                                     <tr>
                                        <td>{{$dn->nisn}}</td>
                                        <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                        <td>{{$dn->sakit}}</td>
                                        <td>{{$dn->izin}}</td>
                                        <td>{{$dn->tanpa_keterangan}}</td>
                                        
                                    </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div id="tab6" class="tab-pane fade">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="tbl_karakter" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>   
                                        <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Catatan Perkembangan Karakter</th>  
                                    </tr>
                        </thead>
                        <tbody id="tb_data">
                            @foreach($data_catatan_karakter as $dn)
                                     <tr>
                                        <td>{{$dn->nisn}}</td>
                                        <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                        <td>{{$dn->catatan_perkembangan_karakter}}</td>
                                        
                                    </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div id="tab7" class="tab-pane fade">
                    <div class="table-responsive mt-3">
                         <table class="table table-bordered" id="tbl_deskripsi_karakter" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>
                                    <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Integritas</th>
                                    <th align="center" bgcolor="#F0F8FF">Religius</th>
                                    <th align="center" bgcolor="#F0F8FF">Nasionalis</th>
                                    <th align="center" bgcolor="#F0F8FF">Mandiri</th>
                                    <th align="center" bgcolor="#F0F8FF">Gotong-royong</th>
                                </tr>
                            </thead>
                            <tbody id="tb_data">
                                @foreach($data_deskripsi_karakter as $dn)
                                     <tr>
                                        <td>{{$dn->nisn}}</td>
                                        <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                        <td>{{$dn->integritas}}</td>
                                        <td>{{$dn->religius}}</td>
                                        <td>{{$dn->nasionalis}}</td>
                                        <td>{{$dn->mandiri}}</td>
                                        <td>{{$dn->gotong_royong}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
</div>
@else
<ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1">Nilai Akademik</a>
                </li>
               
                
            </ul>

            <div class="tab-content">
                <div id="tab1" class="tab-pane fade show active">
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="text-primary">Mapel</label>
                                        <select name="mapel" class="form-control select2 select_mapel">
                                           <option value="">Semua Mapel</option>
                                           @foreach($data_mapel as $dm)
                                                <option value="{{$dm->nama_mapel}}">{{$dm->nama_mapel}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    
                             </div>
                        </div>
                        <table class="table table-bordered" id="tbl_nilai_akademik" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th align="center" bgcolor="#F0F8FF">NISN</th>   
                                    <th align="center" bgcolor="#F0F8FF">Nama Siswa</th>
                                    <th align="center" bgcolor="#F0F8FF">Mapel</th>
                                    <th align="center" bgcolor="#F0F8FF">KKM</th>
                                    <th align="center" bgcolor="#F0F8FF">Nilai Tugas</th>  
                                    <th align="center" bgcolor="#F0F8FF">Nilai UTS</th>  
                                    <th align="center" bgcolor="#F0F8FF">Nilai UAS</th>  
                                    
                                    <th align="center" bgcolor="#F0F8FF">Nilai Pengetahuan</th>  
                                    <th align="center" bgcolor="#F0F8FF">Nilai Keterampilan</th>
                                    <th align="center" bgcolor="#F0F8FF">Nilai Akhir</th>
                                    <th align="center" bgcolor="#F0F8FF">Predikat</th>
                                    <th align="center" bgcolor="#F0F8FF">Keterangan</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data_nilai_akademik as $dn)
                                @php
                                    $keterangan = "<span class='badge badge-danger'>Tidak Lulus</span>";
                                    if($dn->nilai_akhir >= $dn->kkm){
                                        $keterangan = "<span class='badge badge-success'>Lulus</span>";
                                    }
                                @endphp
                                <tr>
                                    <td>{{$dn->nisn}}</td>
                                    <td>{{$dn->siswa->nama_peserta_didik}}</td>
                                    <td>{{$dn->mapel->nama_mapel}}</td>
                                    <td>{{$dn->kkm}}</td>
                                    <td>{{$dn->nilai_tugas}}</td>
                                    <td>{{$dn->nilai_uts}}</td>
                                    <td>{{$dn->nilai_uas}}</td>
                                    <td>{{$dn->nilai_pengetahuan}}</td>
                                    <td>{{$dn->nilai_keterampilan}}</td>
                                    <td>{{$dn->nilai_akhir}}</td>
                                    <td>{{$dn->predikat}}</td>
                                    <td>{!!$keterangan!!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
               
                
               
               
</div>
@endif

 <link href="{{asset('/')}}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <!-- Page level plugins -->
    <script src="{{asset('/')}}vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
         var tbl_nilai_akademik = $('#tbl_nilai_akademik').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });

        $('.select_mapel').on('change', function () {
            var mapel = $(this).val();
            tbl_nilai_akademik.column(2).search(mapel).draw(); // Assuming category column is at index 1
        });

        var tbl_catatan_akademik = $('#tbl_catatan_akademik').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });

        var tbl_catatan_pkl = $('#tbl_catatan_pkl').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });

        var tbl_catatan_eskul = $('#tbl_catatan_eskul').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });

         $('.select_eskul').on('change', function () {
            var mapel = $(this).val();
            tbl_catatan_eskul.column(2).search(mapel).draw(); // Assuming category column is at index 1
        });

        var tbl_kehadiran = $('#tbl_kehadiran').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });

        var tbl_karakter = $('#tbl_karakter').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });

        var tbl_deskripsi_karakter = $('#tbl_deskripsi_karakter').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });
    });
</script>