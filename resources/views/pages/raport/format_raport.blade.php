<html>

<head>
    <style>
        .header, .footer {
            position: fixed;
        }
        @page {
            margin-left: 90px;
            margin-right: 90px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .page-break-before {
            page-break-before: always;
        }
         .page-break-after {
            page-break-after: always;
        }

        .table {
            font-family: "Calibri, sans-serif";
            font-size: 14pt;
        }

        .approval {
            font-family: "Calibri, sans-serif";
            font-size: 10pt;
        }

        header {
            position: fixed;
            top: -70px;
            left: 0px;
            right: 0px;
            height: 200px;
            padding: 20px 0 0 0;
            /* display: none; */
            font-family: "Calibri, sans-serif";
        }

        footer {
            position: fixed;
            bottom: -190px;
            left: 0px;
            right: 0px;
            height: 170px;
            padding: 20px 0;
            /* display: none; */

        }

        main {
            font-family: "Calibri, sans-serif";
        }

        .table-header {
            border-collapse: collapse;
            width: 100%;
            font-family: "Calibri, sans-serif";
        }

        .table-header td,
        .table-header th {
            border: .7px solid black;
        }

        .table-header th,
        .table-header td {
            text-align: left;
            padding: .2rem .5rem;
        }

        .table-data {
            border-collapse: collapse;
            width: 100%;
            font-family: "Calibri, sans-serif";
        }

        .table-data td,
        .table-data th {
            font-size: 10px;
            border: .7px solid black;
            text-align: left;
            padding: .2rem .3rem;
        }

        .table-data td {
            text-align: center;
        }

        .table-data thead th {
            background-color: #CAF7B7;
            text-align: center;
            text-transform: uppercase;
        }

        .table-data tfoot th .table-data.no-border td,
        .table-data.no-border th {
            border: 0;
        }

        .warning {
            border-collapse: collapse;
            width: 100%;
            font-family: "Calibri, sans-serif";

        }

        .warning td {
            padding: 10px 20px;
            text-align: center;

            border: 2px solid black;
            font-size: 12px;
        }

        .dev {
            background-color: #EEE;
        }

        p.text-uuid {
            text-align: left;
            font-family: courier;
            font-size: 10pt;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-sign {
            text-align: center;
            font-style: italic;
            font-size: 8pt;
        }

        .text-sm {
            font-size: 7pt;
        }

        .text-note {
            font-size: 8pt;
        }

        .text-xs {
            font-size: 5pt;
        }

        .text-9 {
            font-size: 9pt;
        }

        .text-strong {
            font-weight: bold;
        }

        .text-underline {
            text-decoration: underline;
        }

        .margin-sm {
            margin: 5px;
            margin-bottom: 10px;
        }

        .table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .table-layout td {
            border: 0 solid transparent;
        }


        .dev .table-layout td {
            border: 1pt solid orange;
        }

        .dev .table-layout th {
            border: 1pt solid orange;
        }

        .table-border td {
            border: 0.5pt solid #000;
        }

        .table-border th {
            border: 0.5pt solid #000;
        }

        .row-head {
            background-color: #EEE;
        }

        .row-continue td {
            border-top: 0 solid transparent;
            border-bottom: 0 solid transparent;
        }

        .row-continue-start td {
            border-bottom: 0 solid transparent;
        }

        .row-continue-end td {
            border-top: 0 solid transparent;
        }

        .pb10 {
            margin-top: 100px;
        }

        .c5 {
            width: 5%;
        }

        .c6 {
            width: 6%;
        }

        .c7 {
            width: 7%;
        }

        .c10 {
            width: 10%;
        }

        .c11 {
            width: 11%;
        }

        .c12 {
            width: 12%;
        }

        .c13 {
            width: 13%;
        }

        .c15 {
            width: 15%;
        }

        .c17 {
            width: 17%;
        }

        .c20 {
            width: 20%;
        }

        .c25 {
            width: 25%;
        }

        .c28 {
            width: 26.4%;
        }

        .c27 {
            width: 30.6%;
        }

        .c30 {
            width: 30%;
        }

        .c33 {
            width: 33%;
        }

        .c35 {
            width: 34.4%;
        }

        .c37 {
            width: 37%;
        }

        .c39 {
            width: 30%
        }

        .c62 {
            width: 62%;
        }

        .c65 {
            width: 65%;
        }

        .c40 {
            width: 40%;
        }

        .c43 {
            width: 43%;
        }

        .c50 {
            width: 50%;
        }

        .c55 {
            width: 55%;
        }

        .c75 {
            width: 75%;
        }

        .c76 {
            width: 79.2%;
        }

        .c100 {
            width: 100%;
        }

        .h2 {
            height: 2pt;
        }

        .h5 {
            height: 5pt;

        }

        .logofont {
            line-height: 1.5rem;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 12px;
            font-family: "Calibri, sans-serif";
        }

        .h10 {
            height: 10pt;
        }

        .h15 {
            height: 15pt;
        }

        .h20 {
            height: 18pt;
        }

        .h25 {
            height: 25pt;
        }

        .h30 {
            height: 30pt;
        }

        .c37 {
            width: 37%;
        }

        .c39 {
            width: 42.0%
        }

        .h40 {
            height: 40pt;
        }

        .h50 {
            height: 50pt;
        }

        .h60 {
            height: 60pt;
        }

        .h90 {
            height: 82pt;
        }

        .h140 {
            height: 100pt;
        }

        .fpc-header {
            font-size: 16pt;
        }

        .border-bottom {
            border-bottom: 2pt solid #000;
        }

        .border-all {
            border: 1pt solid #000;
        }

        .border-all-sm {
            border: 0.5pt solid #000;
            padding: 2pt 10pt;
        }

        .cell-vertical {
            vertical-align: top;
        }

        .upn {
            background: url("{{ public_path('/img/logo.jpeg') }}");
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            background-size: cover;
        }

        #header {
            position: fixed;
            top: -60px;
            height: 100px;
            text-align: left;
        }
    </style>
</head>

<body>
    
    <div style="text-align: center;margin-top:125px;">
        <h1 class="table">RAPOR PESERTA DIDIK</h1>
        <h1 class="table">SEKOLAH MENENGAH KEJURUAN</h1>
        <h1 class="table">(SMK)</h1>
        <img src="{{ $logo }}" height="175" style="margin-top:150px;" />
        <div style="text-align: center;margin-top: 150px;">
            <h2 class="table">Nama Peserta Didik:</h2>

            <div class="border-all-sm" style="margin-left: auto;
margin-right: auto;font-size:14pt;width:300px;">
                {{ $data_siswa->nama_peserta_didik }}
            </div>
            <h2 class="table">NIS/NISN:</h2>
            <div class="border-all-sm" style="margin-left: auto;
margin-right: auto;font-size:14pt;width:300px;">
                {{ $data_siswa->nisn }}
            </div>
        </div>
    </div>

    <div class="page-break-before"></div>
   
    <div>
        <div>
             <center>
                <h1 class="table">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</h1>
                <h1 class="table">REPUBLIK INDONESIA</h1>
               
                <br />
                <h1 class="table">RAPOR PESERTA DIDIK</h1>
                <h1 class="table">SEKOLAH MENENGAH KEJURUAN</h1>
                <h1 class="table">(SMK)</h1>
            </center>
            <br />
            <table>
                <tr>
                    <td>Nama Sekolah</td>
                    <td></td>
                    <td>:</td>
                    <td>SMK Taruna Wiyatamandala</td>
                </tr>
                <tr>
                    <td>NPSN</td>
                    <td></td>
                    <td>:</td>
                    <td>69957268</td>
                </tr>
                <tr>
                    <td>NIS/NSS/NDS</td>
                    <td></td>
                    <td>:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td></td>
                    <td>:</td>
                    <td>Jl. Raya Nagreg KM. 39 Rt/Rw 04/04 Kode Pos: 40397</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td></td>
                    <td>:</td>
                    <td>Ciherang</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td></td>
                    <td>:</td>
                    <td>Nagreg</td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td></td>
                    <td>:</td>
                    <td>Bandung</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td></td>
                    <td>:</td>
                    <td>Jawa Barat</td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td></td>
                    <td>:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td></td>
                    <td>:</td>
                    <td>smktaruna.wiyatamandala@gmail.com</td>
                </tr>
            </table>
        </div>

    </div>
    <div class="page-break-before"></div>
    <div>
            <table>
                <tr>
                    <td>Nama Peserta Didik</td>
                    <td></td>
                    <td>:</td>
                    <td>{{ $data_siswa->nama_peserta_didik }}</td>
                </tr>
                <tr>
                    <td>NIS/NISN</td>
                    <td></td>
                    <td>:</td>
                    <td>{{ $data_siswa->nisn }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td></td>
                    <td>:</td>
                    <td>{{ $data_siswa->kelas }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td></td>
                    <td>:</td>
                    <td>{{ $semester }}</td>
                </tr>
            </table>
    </div>
    <div>
        <main>
            <h4>A. Nilai Akademik</h4>
            <table class="table-data" cellpadding="10" cellspacing="1" style="width:100%;">
                <thead>
                    <tr>
                        <th width="5">No</th>
                        <th width="60">Mata Pelajaran</th>
                        <th width="40">KKM</th>
                        <th width="40">Pengetahuan</th>
                        <th width="40">Keterampilan</th>
                        <th width="40">Nilai Akhir</th>
                        <th width="10">Predikat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="7" align="left">A. Muatan Nasional</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dt_nilai_a as $dn)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td>{{ $dn->mapel->nama_mapel }}</td>
                            <td>{{ $dn->kkm }}</td>
                            <td>{{ $dn->nilai_pengetahuan }}</td>
                            <td>{{ $dn->nilai_keterampilan }}</td>
                            <td>{{ $dn->nilai_akhir }}</td>
                            <td>{{ $dn->predikat }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                    <tr>
                        <th colspan="7" align="left">B. Muatan Kewilayahan</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dt_nilai_b as $dn)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td>{{ $dn->mapel->nama_mapel }}</td>
                            <td>{{ $dn->kkm }}</td>
                            <td>{{ $dn->nilai_pengetahuan }}</td>
                            <td>{{ $dn->nilai_keterampilan }}</td>
                            <td>{{ $dn->nilai_akhir }}</td>
                            <td>{{ $dn->predikat }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                    <tr>
                        <th colspan="7" align="left">C. Muatan Peminatan Kejuruan</th>
                    </tr>
                    <tr>
                        <th colspan="7" align="left">C1. Dasar Bidang Keahlian</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dt_nilai_c1 as $dn)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td>{{ $dn->mapel->nama_mapel }}</td>
                            <td>{{ $dn->kkm }}</td>
                            <td>{{ $dn->nilai_pengetahuan }}</td>
                            <td>{{ $dn->nilai_keterampilan }}</td>
                            <td>{{ $dn->nilai_akhir }}</td>
                            <td>{{ $dn->predikat }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                    <tr>
                        <th colspan="7" align="left">C2. Dasar Program Keahlian</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dt_nilai_c2 as $dn)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td>{{ $dn->mapel->nama_mapel }}</td>
                            <td>{{ $dn->kkm }}</td>
                            <td>{{ $dn->nilai_pengetahuan }}</td>
                            <td>{{ $dn->nilai_keterampilan }}</td>
                            <td>{{ $dn->nilai_akhir }}</td>
                            <td>{{ $dn->predikat }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                    <tr>
                        <th colspan="7" align="left">C3. Kompentensi Keahlian</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dt_nilai_c3 as $dn)
                        <tr align="center">
                            <td>{{ $no }}</td>
                            <td>{{ $dn->mapel->nama_mapel }}</td>
                            <td>{{ $dn->kkm }}</td>
                            <td>{{ $dn->nilai_pengetahuan }}</td>
                            <td>{{ $dn->nilai_keterampilan }}</td>
                            <td>{{ $dn->nilai_akhir }}</td>
                            <td>{{ $dn->predikat }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
            <h4>B. Catatan Akademik</h4>
            <div class="border-all-sm" style="font-size:10pt;padding: 15px;">
                @if ($dt_akademik)
                    {{ $dt_akademik->keterangan }}
                @else
                    -
                @endif
            </div>

            <div>
                <h4>C. Praktik Kerja Lapangan</h4>
                <table class="table-data" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th width="60">Mitra DU/DI</th>
                            <th width="20">Lokasi</th>
                            <th width="20">Lamanya(Bulan)</th>
                            <th width="60">Keterangan</th>
                        </tr>
                    </thead>
                    @if ($dt_pkl)
                        <tr>
                            <td width="10">1</td>
                            <td width="60">{{ $dt_pkl->mitra_dudi }}</td>
                            <td width="20">{{ $dt_pkl->lokasi }}</td>
                            <td width="20">{{ $dt_pkl->masa_bulan }}</td>
                            <td width="60">{{ $dt_pkl->keterangan }}</td>
                        </tr>
                    @else
                        <tr>
                            <td width="10">-</td>
                            <td width="60">-</td>
                            <td width="20">-</td>
                            <td width="20">-</td>
                            <td width="60">-</td>
                        </tr>
                    @endif

                </table>
                <h4>D. Ekstrakurikuler</h4>
                <table class="table-data" style="width:100%;text-align: center;">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th width="60">Kegiatan Ekstrakurikuler</th>
                            <th width="60">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dt_eskul as $dn)
                            <tr align="center">
                                <td>{{ $no }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $dn->kegiatan_ekstrakurikuler)) }}</td>
                                <td>{{ $dn->keterangan }}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <h4>E. Ketidakhadiran</h4>
                <table class="table-data" style="width:50%;" cellpadding="10">
                    @if ($dt_kehadiran)
                        <tr>
                            <td>Sakit</td>
                            <td>:</td>
                            <td>{{ $dt_kehadiran->sakit }} Hari</td>
                        </tr>
                        <tr>
                            <td>Izin</td>
                            <td>:</td>
                            <td>{{ $dt_kehadiran->izin }} Hari</td>
                        </tr>
                        <tr>
                            <td>Tanpa Keterangan</td>
                            <td>:</td>
                            <td>{{ $dt_kehadiran->tanpa_keterangan }} Hari</td>
                        </tr>
                    @else
                        <tr>
                            <td>Sakit</td>
                            <td>:</td>
                            <td>- Hari</td>
                        </tr>
                        <tr>
                            <td>Izin</td>
                            <td>:</td>
                            <td>- Hari</td>
                        </tr>
                        <tr>
                            <td>Tanpa Keterangan</td>
                            <td>:</td>
                            <td>- Hari</td>
                        </tr>
                    @endif
                </table>
                @php
                    $status_naik = "-";
                    $title_naik = "Kenaikan Kelas";
                    if($dt_kenaikan!=null){
                        $status_naik = ucwords(str_replace("-"," ",$dt_kenaikan->status));
                        if($dt_kenaikan->status=="lulus" || $dt_kenaikan->status=="tidak-lulus"){
                            $title_naik = "Kelulusan";
                        }
                    }
                @endphp

                <h4>F. {{$title_naik}}</h4>
                <div class="border-all-sm" style="font-size:9pt;padding: 10px">
                    {{$status_naik}}
                </div>
                <h4>G. Deskripsi Perkembangan Karakter</h4>
                <table class="table-data"  cellpadding="10">
                    <thead>
                        <tr>
                            <th>Karakter yang dibangun</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($dt_deskripsi)
                           <tr>
                                <td>Integritas</td>
                                <td>{{$dt_deskripsi->integritas}}</td>
                            </tr>
                            <tr>
                                <td>Religius</td>
                                <td>{{$dt_deskripsi->religius}}</td>
                            </tr>
                            <tr>
                                <td>Nasionalis</td>
                                <td>{{$dt_deskripsi->nasionalis}}</td>
                            </tr>
                            <tr>
                                <td>Mandiri</td>
                                <td>{{$dt_deskripsi->mandiri}}</td>
                            </tr>
                            <tr>
                                <td>Gotong-royong</td>
                                <td>{{$dt_deskripsi->gotong_royong}}</td>
                            </tr>
                        @else
                            <tr>
                                <td>Integritas</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Religius</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Nasionalis</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Mandiri</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Gotong-royong</td>
                                <td>-</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <h4>H. Catatan Perkembangan Karakter</h4>
                <div class="border-all-sm" style="font-size:9pt;padding: 10px">
                    @php
                        if($dt_karakter==null){
                            echo "-";
                        }
                        else{
                            if(strlen($dt_karakter->catatan_perkembangan_karakter)>0){
                                echo $dt_karakter->catatan_perkembangan_karakter;
                            }
                            else{
                                echo "-";
                            }
                        }
                    @endphp
                </div>
               
               

                <table border="0" style="width:100%;margin-top:10px;">
                    <tr>
                        <td style="width: 40%;">Mengetahui: </td>
                        <td style="width: 60%;" align="right">Nagreg, 22 Desember 2023</td>
                    </tr>
                    <tr>
                        <td style="width:50%;">Orang Tua/Wali, </td>
                        <td style="width:50%;text-align: center;" align="right">Wali Kelas, </td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td style="width:100%;">
                            <br />
                            <br/>
                            <br />
                            <br/>
                            <br />
                            <br/>
                            <br />
                            <br/>
                            <br />
                            ------------------------------
                        </td>

                        <td style="width:50%;" align="center">
                           
                                <div  class="mb-3">
                                    <div style="margin-left:50px;">
                                        {!! DNS2D::getBarcodeHTML($dt_walikelas->guru->nip, 'QRCODE',7,7) !!}
                                    </div>
                                </div>
                            <br />
                           {{$dt_walikelas->guru->nama_pendidik_dan_tenaga_kependidikan}}
                        </td>

                    </tr>
                </table>

                <br />
                <center>
                    Mengetahui,<br/>
                    Kepala Sekolah
                    <br />
                    <br />
                        <div class="mb-3">
                            <div style="margin-left:225px;">
                                {!! DNS2D::getBarcodeHTML($dt_kepsek->guru->nip, 'QRCODE',7,7) !!}
                            </div>
                        </div>
                    <br/>
                    {{$dt_kepsek->guru->nama_pendidik_dan_tenaga_kependidikan}}
                </center>
            </div>
        </main>
    </div>

   
   
   
   
   
</body>

</html>
