@extends('admin.layouts.master')
@section('title', 'Peta Sosial Budaya')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/css/map.css') }}">
@endsection

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Peta & Simbol sektor pada bidang pengamanan pembangunan strategis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fas fa-map"></i>
                        Peta Sosial Budaya
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-primary">
                    <div class="card-body" style="width: mac-content;display: flex;">
                        <div class="row text-center" style="display: block">
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/1_infrastruktur jalan.jpg') }}" alt="" width="40" height="40">
                                <p id="jalan">Infrastuktur Jalan <br> ({{ count($jalan) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/2_infrastruktur perkeretaapian.jpg') }}" alt="" width="40" height="40">
                                <p id="kereta">Infrastuktur <br> Kereta <br> ({{ count($kereta) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/3_infrastruktur kebandarudaraan.jpg') }}" alt="" width="40" height="40">
                                <p id="bandara">Infrastuktur <br> Bandara <br> ({{ count($bandara) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/4_infrastruktur telekomunikasi.jpg') }}" alt="" width="40" height="40">
                                <p id="telekomunikasi">Infrastuktur <br> Telekomunikasi <br> ({{ count($telekomunikasi) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/5_infrastruktur kepelabuhanan.jpg') }}" alt="" width="40" height="40">
                                <p id="pelabuhan">Infrastuktur <br> Pelabuhan <br> ({{ count($pelabuhan) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/12_ketenagalistrikan.jpg') }}" alt="" width="40" height="40">
                                <p id="listrik">Ketenagalistrikan <br> ({{ count($listrik) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/13_energi alternatif.jpg') }}" alt="" width="40" height="40">
                                <p id="energi">Energi Alternatif <br> ({{ count($energi) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/14_minyak dan gas bumi.jpg') }}" alt="" width="40" height="40">
                                <p id="minyak">Minyak dan Gas <br> Bumi <br> ({{ count($minyak) }})</p>
                            </div>
                        </div>
                        <p id="kecamatan">Kecamatan : </p>
                        <section class="map">
                            <div class="wrap-map">
                                <img src="{{ asset('backend/img/yellow.png') }}" alt="full" class="yellow" onclick="yellow()">
                                <img src="{{ asset('backend/img/purple.png') }}" alt="full" class="purple" onclick="purple()">
                                <img src="{{ asset('backend/img/red.png') }}" alt="full" class="red" onclick="red()">
                                <img src="{{ asset('backend/img/green.png') }}" alt="full" class="green" onclick="green()">
                                <img src="{{ asset('backend/img/cream.png') }}" alt="full" class="cream" onclick="cream()">
                            </div>
                        </section>
                        <!-- <br><br><br>
                        <p id="kecamatan">Kecamatan : </p> -->
                        <!-- <br><br> -->
                        <div class="row text-center" style="display: block;left: 0px;position: relative;">
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/15_ilmu pengetahuan dan teknologi.jpg') }}" alt="" width="40" height="40">
                                <p id="ilmu">Ilmu Pengetahuan <br> Teknologi <br> ({{ count($ilmu) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/6_smelter.jpg') }}" alt="" width="40" height="40">
                                <p id="smelter">Smelter <br> ({{ count($smelter) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/7_infrastruktur pengolahan air.jpg') }}" alt="" width="40" height="40">
                                <p id="air">Infrastuktur <br> Pengolahan Air <br> ({{ count($air) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/8_tanggul.jpg') }}" alt="" width="40" height="40">
                                <p id="tanggul">Tanggul <br> ({{ count($tanggul) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/9_bendungan.jpg') }}" alt="" width="40" height="40">
                                <p id="bendungan">Bendungan <br> ({{ count($bendungan) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/10_pertanian.jpg') }}" alt="" width="40" height="40">
                                <p id="pertanian">Pertanian <br> ({{ count($pertanian) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/11_kelautan.jpg') }}" alt="" width="40" height="40">
                                <p id="kelautan">Kelautan <br> ({{ count($kelautan) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/16_perumahan.jpg') }}" alt="" width="40" height="40">
                                <p id="perumahan">Perumahan <br> ({{ count($perumahan) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pembangunan/17_pariwisata.jpg') }}" alt="" width="40" height="40">
                                <p id="pariwisata">Pariwisata <br> ({{ count($pariwisata) }})</p>
                            </div>
                            <div class="col">   
                                <img src="{{ asset('backend/img/pembangunan/18_kawasan industri prioritas.jpg') }}" alt="" width="40" height="40">
                                <p id="industri">Kawasan Industri <br> ({{ count($industri) }})</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
          function yellow() {
            var id = 5
            ajaxurl = '{{ route("admin.peta-pembangunan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Selatan')
                    $('#jalan').html('Infrastuktur Jalan <br>('+ data[0].length +')')
                    $('#kereta').html('Infrastuktur <br> Kereta <br>('+ data[1].length +')')
                    $('#bandara').html('Infrastuktur <br> Bandara <br>('+ data[2].length +')')
                    $('#telekomunikasi').html('Infrastuktur <br> Telekomunikasi <br>('+ data[3].length +')')
                    $('#pelabuhan').html('Infrastuktur <br> Pelabuhan <br>('+ data[4].length +')')
                    $('#listrik').html('Ketenagalistrikan <br>('+ data[5].length +')')
                    $('#energi').html('Energi Alternatif <br>('+ data[6].length+ ')')
                    $('#minyak').html('Minyak dan Gas <br> Bumi <br>('+ data[7].length +')')
                    $('#ilmu').html('Ilmu Pengetahuan <br> Teknologi <Br>('+ data[8].length +')')
                    $('#smelter').html('Smelter <br>('+ data[9].length+ ')')
                    $('#air').html('Infrastuktur <br> Pengolahan Air <br>('+ data[10].length +')')
                    $('#tanggul').html('Tanggul <br>('+ data[11].length +')')
                    $('#bendungan').html('Bendungan <br>('+ data[12].length +')')
                    $('#pertanian').html('Pertanian <br>('+ data[13].length +')')
                    $('#kelautan').html('Kelautan <br>('+ data[14].length +')')
                    $('#perumahan').html('Perumahan <br>('+ data[15].length +')')
                    $('#pariwisata').html('Pariwisata <br>('+ data[16].length +')')
                    $('#industri').html('Kawasan Industri <br>('+ data[17].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function purple() {
            var id = 4
            ajaxurl = '{{ route("admin.peta-pembangunan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Tengah')
                    $('#jalan').html('Infrastuktur Jalan <br>('+ data[0].length +')')
                    $('#kereta').html('Infrastuktur <br> Kereta <br>('+ data[1].length +')')
                    $('#bandara').html('Infrastuktur <br> Bandara <br>('+ data[2].length +')')
                    $('#telekomunikasi').html('Infrastuktur <br> Telekomunikasi <br>('+ data[3].length +')')
                    $('#pelabuhan').html('Infrastuktur <br> Pelabuhan <br>('+ data[4].length +')')
                    $('#listrik').html('Ketenagalistrikan <br>('+ data[5].length +')')
                    $('#energi').html('Energi Alternatif <br>('+ data[6].length+ ')')
                    $('#minyak').html('Minyak dan Gas <br> Bumi <br>('+ data[7].length +')')
                    $('#ilmu').html('Ilmu Pengetahuan <br> Teknologi <Br>('+ data[8].length +')')
                    $('#smelter').html('Smelter <br>('+ data[9].length+ ')')
                    $('#air').html('Infrastuktur <br> Pengolahan Air <br>('+ data[10].length +')')
                    $('#tanggul').html('Tanggul <br>('+ data[11].length +')')
                    $('#bendungan').html('Bendungan <br>('+ data[12].length +')')
                    $('#pertanian').html('Pertanian <br>('+ data[13].length +')')
                    $('#kelautan').html('Kelautan <br>('+ data[14].length +')')
                    $('#perumahan').html('Perumahan <br>('+ data[15].length +')')
                    $('#pariwisata').html('Pariwisata <br>('+ data[16].length +')')
                    $('#industri').html('Kawasan Industri <br>('+ data[17].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function red() {
            var id = 3
            ajaxurl = '{{ route("admin.peta-pembangunan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Utara')
                    $('#jalan').html('Infrastuktur Jalan <br>('+ data[0].length +')')
                    $('#kereta').html('Infrastuktur <br> Kereta <br>('+ data[1].length +')')
                    $('#bandara').html('Infrastuktur <br> Bandara <br>('+ data[2].length +')')
                    $('#telekomunikasi').html('Infrastuktur <br> Telekomunikasi <br>('+ data[3].length +')')
                    $('#pelabuhan').html('Infrastuktur <br> Pelabuhan <br>('+ data[4].length +')')
                    $('#listrik').html('Ketenagalistrikan <br>('+ data[5].length +')')
                    $('#energi').html('Energi Alternatif <br>('+ data[6].length+ ')')
                    $('#minyak').html('Minyak dan Gas <br> Bumi <br>('+ data[7].length +')')
                    $('#ilmu').html('Ilmu Pengetahuan <br> Teknologi <Br>('+ data[8].length +')')
                    $('#smelter').html('Smelter <br>('+ data[9].length+ ')')
                    $('#air').html('Infrastuktur <br> Pengolahan Air <br>('+ data[10].length +')')
                    $('#tanggul').html('Tanggul <br>('+ data[11].length +')')
                    $('#bendungan').html('Bendungan <br>('+ data[12].length +')')
                    $('#pertanian').html('Pertanian <br>('+ data[13].length +')')
                    $('#kelautan').html('Kelautan <br>('+ data[14].length +')')
                    $('#perumahan').html('Perumahan <br>('+ data[15].length +')')
                    $('#pariwisata').html('Pariwisata <br>('+ data[16].length +')')
                    $('#industri').html('Kawasan Industri <br>('+ data[17].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function green() {
            var id = 2
            ajaxurl = '{{ route("admin.peta-pembangunan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Pagar Alam Selatan')
                    $('#jalan').html('Infrastuktur Jalan <br>('+ data[0].length +')')
                    $('#kereta').html('Infrastuktur <br> Kereta <br>('+ data[1].length +')')
                    $('#bandara').html('Infrastuktur <br> Bandara <br>('+ data[2].length +')')
                    $('#telekomunikasi').html('Infrastuktur <br> Telekomunikasi <br>('+ data[3].length +')')
                    $('#pelabuhan').html('Infrastuktur <br> Pelabuhan <br>('+ data[4].length +')')
                    $('#listrik').html('Ketenagalistrikan <br>('+ data[5].length +')')
                    $('#energi').html('Energi Alternatif <br>('+ data[6].length+ ')')
                    $('#minyak').html('Minyak dan Gas <br> Bumi <br>('+ data[7].length +')')
                    $('#ilmu').html('Ilmu Pengetahuan <br> Teknologi <Br>('+ data[8].length +')')
                    $('#smelter').html('Smelter <br>('+ data[9].length+ ')')
                    $('#air').html('Infrastuktur <br> Pengolahan Air <br>('+ data[10].length +')')
                    $('#tanggul').html('Tanggul <br>('+ data[11].length +')')
                    $('#bendungan').html('Bendungan <br>('+ data[12].length +')')
                    $('#pertanian').html('Pertanian <br>('+ data[13].length +')')
                    $('#kelautan').html('Kelautan <br>('+ data[14].length +')')
                    $('#perumahan').html('Perumahan <br>('+ data[15].length +')')
                    $('#pariwisata').html('Pariwisata <br>('+ data[16].length +')')
                    $('#industri').html('Kawasan Industri <br>('+ data[17].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function cream() {
            var id = 1
            ajaxurl = '{{ route("admin.peta-pembangunan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Pagar Alam Utara')
                    $('#jalan').html('Infrastuktur Jalan <br>('+ data[0].length +')')
                    $('#kereta').html('Infrastuktur <br> Kereta <br>('+ data[1].length +')')
                    $('#bandara').html('Infrastuktur <br> Bandara <br>('+ data[2].length +')')
                    $('#telekomunikasi').html('Infrastuktur <br> Telekomunikasi <br>('+ data[3].length +')')
                    $('#pelabuhan').html('Infrastuktur <br> Pelabuhan <br>('+ data[4].length +')')
                    $('#listrik').html('Ketenagalistrikan <br>('+ data[5].length +')')
                    $('#energi').html('Energi Alternatif <br>('+ data[6].length+ ')')
                    $('#minyak').html('Minyak dan Gas <br> Bumi <br>('+ data[7].length +')')
                    $('#ilmu').html('Ilmu Pengetahuan <br> Teknologi <Br>('+ data[8].length +')')
                    $('#smelter').html('Smelter <br>('+ data[9].length+ ')')
                    $('#air').html('Infrastuktur <br> Pengolahan Air <br>('+ data[10].length +')')
                    $('#tanggul').html('Tanggul <br>('+ data[11].length +')')
                    $('#bendungan').html('Bendungan <br>('+ data[12].length +')')
                    $('#pertanian').html('Pertanian <br>('+ data[13].length +')')
                    $('#kelautan').html('Kelautan <br>('+ data[14].length +')')
                    $('#perumahan').html('Perumahan <br>('+ data[15].length +')')
                    $('#pariwisata').html('Pariwisata <br>('+ data[16].length +')')
                    $('#industri').html('Kawasan Industri <br>('+ data[17].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
    </script>
@endsection

