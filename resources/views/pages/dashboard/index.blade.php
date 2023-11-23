@extends('layout/layout')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SELAMAT DATANG DI SMK TARUNA WIYATAMANDALA</h1>
      </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Siswa Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data_siswa}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Siswa Lulus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data_siswa_lulus}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Tenaga Pengajar
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data_guru}}</div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-school fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Ekstrakurikuler</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Profile SMK TARUNA WIYATAMANDALA</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" style="height: 350px !important;object-fit: cover;" src="https://foto.data.kemdikbud.go.id/getImage/69957268/9.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" style="height: 350px !important;object-fit: cover;" src="https://foto.data.kemdikbud.go.id/getImage/69957268/3.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" style="height: 350px !important;object-fit: cover;" src="https://dnntv.id/wp-content/uploads/2023/10/IMG-20231009-WA0293.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>

                    <div class="row mt-4">

                         <div class="col-md-6">
                            <label class="text-primary">Nama Sekolah</label>
                            <p class="text-sm">
                                {{$data_profil->nama_sekolah}}
                            </p>
                            
                        </div>

                         <div class="col-md-3">
                            <label class="text-primary">NPSN</label>
                            <p class="text-sm">
                                {{$data_profil->npsn}}
                            </p>
                            
                        </div>

                         <div class="col-md-3">
                            <label class="text-primary">NIS/NSS/NDS</label>
                            <p class="text-sm">
                                {{$data_profil->nis_nss_nds}}
                            </p>
                            
                        </div>

                        <div class="col-md-6">
                            <label class="text-primary">Alamat Sekolah</label>
                            <p class="text-sm d-flex justify-content-start">
                                {{$data_profil->alamat_sekolah}}
                            </p>
                            
                        </div>

                         <div class="col-md-3">
                            <label class="text-primary">Website</label>
                            <p class="text-sm d-flex justify-content-start">
                                {{$data_profil->website}}
                            </p>
                            
                        </div>

                         <div class="col-md-3">
                            <label class="text-primary">Email</label>
                            <p class="text-sm d-flex justify-content-start">
                                {{$data_profil->email}}
                            </p>
                            
                        </div>

                        <div class="col-md-8">
                            <label class="text-primary">Tentang Sekolah</label>
                            <p class="text-sm d-flex justify-content-start">
                                "SMK Taruna Wiyatamandala Nagreg adalah Sekolah unggulan yang berada di Kab. Bandung yang membina keahlian vokasi dan pembangunan karakter sehingga lulusannya punya keahlian vokasi yang sesuai dengan dunia kerja dan mempunyai kedisiplinan tinggi."
                            </p>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-8 col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown (kalender akademik)-->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kalender Akademik</h6>
                  
                </div>
                <!-- Card Body (kalender akademik)-->
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="calendar" style="height:100%;">

                        </div>
                    </div>
                    <div class="table-responsive mt-4 d-none">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th align="center" bgcolor="#F0F8FF">No</th>   
                                    <th align="center" bgcolor="#F0F8FF">Tanggal</th>
                                    <th align="center" bgcolor="#F0F8FF">Keterangan</th>  
                                    </tr>
                                </thead>
                                <tbody id="tb_data">
                                
                                </tbody>
                        </table>
                
                    </div>
                  
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown (kalender akademik)-->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Siswa dengan nilai terbaik</h6>
                  
                </div>
                <!-- Card Body (kalender akademik)-->
                <div class="card-body">
                    <div class="col-md-12">
                       @if($data_siswa_terbaik==null)
                        <span>
                            Belum ada data nilai
                        </span>
                       @else
                         <img src="{{ FileUpload::GetFile("siswa",$data_siswa_terbaik['photo'])}}"   class="mx-auto img-thumbnail img-responsive img-fluid" />
                         <div class="row mt-4">
                            <div class="col-md-12">
                                <label class="text-primary">Nama Siswa</label>
                                <p class="text-sm">
                                    {{$data_siswa_terbaik->nama_peserta_didik}}
                                </p>
                                
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary">NISN</label>
                                <p class="text-sm">
                                    {{$data_siswa_terbaik->nisn}}
                                </p>
                                
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary">Kelas</label>
                                <p class="text-sm">
                                    {{$data_siswa_terbaik->kelas}}  {{$data_siswa_terbaik->jurusan->nama_jurusan}}
                                </p>
                                
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary">Rata-rata Nilai</label>
                                <p class="text-sm">
                                    {{$data_siswa_terbaik->nilai_rata}}
                                </p>
                                
                            </div>
                             <div class="col-md-6">
                                <label class="text-primary">Nilai Tertinggi</label>
                                <p class="text-sm">
                                    {{$data_siswa_terbaik->nilai_tinggi}}
                                </p>
                                
                            </div>
                         </div>
                         @endif
                    </div>
                   
                  
                </div>
            </div>
        </div>
    </div>

   

</div>

@endsection
@section("javascript")
 <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
 
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          //contentHeight: 360
          events: function (info, callback) {
                    // Get your parameters dynamically
                var month = moment(info.start.valueOf()).add("1","month").format('MM');
                var year =  moment(info.start.valueOf()).add("1","month").format('YYYY');

                
                
                // Make an AJAX request with parameters
                $.ajax({
                    url: "{{route('dashboard.get_calendar')}}",
                    method: 'GET',
                    data: {
                        month: month,
                        year: year
                    },
                    success: function (data) {
                        console.log(data);
                        // Process the data and pass it to FullCalendar
                       // var events = JSON.parse(data);
                        callback(data);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
        calendar.render();
      });

    </script>
@endsection

