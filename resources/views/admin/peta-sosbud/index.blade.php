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
                <h1>Peta & Simbol sektor pada bidang sosial, budaya, dan kemasyarakatan</h1>
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
                <div class="card card-success">
                    @if (auth()->user()->isUser())
                    <div class="card-body" style="width: max-content;display: flex;">
                        <div class="row text-center" style="display: block;z-index: 44444;"> 
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/1_pengawasan peredaran cetakan dalam negeri.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="barcet">Pengawasan Bar.Cet <br> Dalam Negeri ({{ count($barcet) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/2_pengawasan peredaran import.jpeg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="import">Was Import Bar.Cet <br> Dalam Negeri ({{ count($import) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/3_pengawasan sistem perbukuan.jpeg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pembukuan">Pengawasan <br> Sistem Pembukuan ({{ count($pembukuan) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/4_pengawasan media komunikasi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="media">Pengawasan <br> Media Komunikasi ({{ count($media) }})</p>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <img src="{{ asset('backend/img/sosbud/5_pengawasan aliran kepercayaan.jpg') }}" alt="" width="40" height="40">
                                </a>        
                                <p id="pakem">Pakem ({{ count($pakem) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/6_pencegahan penyalahgunaan.jpg') }}" alt="" width="40" height="40">
                            </a>    
                                <p id="penodaan">Pencegahan <br> Penodaan Agama ({{ count($penodaan) }})</p>
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
                        <div class="row text-center" style="display: block;">
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/7 ketahanan budaya.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="budaya">Ketahanan <br> Budaya ({{ count($budaya) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/8_pemberdayaan masyarakat desa.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pemberdayaan">Pemberdayaan <br> Masyarakat Desa ({{ count($pemberdayaan) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/9_pengawasan organisasi masyarakat dan lembaga swadaya masyarakat.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="ormas">Pengawasan <br> Ormas dan LSM ({{ count($ormas) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/10_pencegahan konlik sosial.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="konflik">Pencegahan <br> Konflik Sosial ({{ count($konflik) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/11_ketertiban dan ketentraman umum.jpg') }}" alt="" width="40" height="40">
                            </a> 
                                <p id="tramtibum">Tramtibum ({{ count($tramtibum) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/sosbud/12_pembinaan masyarakat taat hukum.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pembinaan">Pembinaan Masyarakat <br> Taat Hukum ({{ count($pembinaan) }})</p>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="card-body" style="width: max-content;display: flex;">
                        <div class="row text-center" style="display: block;z-index: 44444;"> 
                            <div class="col">
                            <a href="{{ route('admin.pengawasan_barang.index') }}">
                                <img src="{{ asset('backend/img/sosbud/1_pengawasan peredaran cetakan dalam negeri.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="barcet">Pengawasan Bar.Cet <br> Dalam Negeri ({{ count($barcet) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pengawasan_barang.index') }}">
                                <img src="{{ asset('backend/img/sosbud/2_pengawasan peredaran import.jpeg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="import">Was Import Bar.Cet <br> Dalam Negeri ({{ count($import) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pembukuan.index') }}">
                                <img src="{{ asset('backend/img/sosbud/3_pengawasan sistem perbukuan.jpeg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pembukuan">Pengawasan <br> Sistem Pembukuan ({{ count($pembukuan) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pengawasan_media.index') }}">
                                <img src="{{ asset('backend/img/sosbud/4_pengawasan media komunikasi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="media">Pengawasan <br> Media Komunikasi ({{ count($media) }})</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.kepercayaan.index') }}">
                                    <img src="{{ asset('backend/img/sosbud/5_pengawasan aliran kepercayaan.jpg') }}" alt="" width="40" height="40">
                                </a>        
                                <p id="pakem">Pakem ({{ count($pakem) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.keagamaan.index') }}">
                                <img src="{{ asset('backend/img/sosbud/6_pencegahan penyalahgunaan.jpg') }}" alt="" width="40" height="40">
                            </a>    
                                <p id="penodaan">Pencegahan <br> Penodaan Agama ({{ count($penodaan) }})</p>
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
                        <div class="row text-center" style="display: block;">
                            <div class="col">
                            <a href="{{ route('admin.budaya.index') }}">
                                <img src="{{ asset('backend/img/sosbud/7 ketahanan budaya.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="budaya">Ketahanan <br> Budaya ({{ count($budaya) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pemberdayaan.index') }}">
                                <img src="{{ asset('backend/img/sosbud/8_pemberdayaan masyarakat desa.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pemberdayaan">Pemberdayaan <br> Masyarakat Desa ({{ count($pemberdayaan) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pengawasan_organisasi.index') }}">
                                <img src="{{ asset('backend/img/sosbud/9_pengawasan organisasi masyarakat dan lembaga swadaya masyarakat.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="ormas">Pengawasan <br> Ormas dan LSM ({{ count($ormas) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.konflik.index') }}">
                                <img src="{{ asset('backend/img/sosbud/10_pencegahan konlik sosial.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="konflik">Pencegahan <br> Konflik Sosial ({{ count($konflik) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.ketertiban.index') }}">
                                <img src="{{ asset('backend/img/sosbud/11_ketertiban dan ketentraman umum.jpg') }}" alt="" width="40" height="40">
                            </a> 
                                <p id="tramtibum">Tramtibum ({{ count($tramtibum) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pembinaan.index') }}">
                                <img src="{{ asset('backend/img/sosbud/12_pembinaan masyarakat taat hukum.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pembinaan">Pembinaan Masyarakat <br> Taat Hukum ({{ count($pembinaan) }})</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        function yellow() {
            var id = 5
            ajaxurl = '{{ route("admin.peta-sosbud.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Dempo Selatan')
                    $('#barcet').html('Pengawasan Bar.Cet <br> Dalam Negeri ('+ data[0].length +')')
                    $('#import').html('Was Import Bar.Cet <br> Dalam Negeri ('+ data[1].length +')')
                    $('#pembukuan').html('Pengawasan <br> Sistem Pembukuan ('+ data[2].length +')')
                    $('#media').html('Pengawasan <br> Media Komunikasi ('+ data[3].length +')')
                    $('#pakem').html('Pakem ('+ data[4].length +')')
                    $('#penodaan').html('Pencegahan <br> Penodaan Agama ('+ data[5].length +')')
                    $('#budaya').html('Ketahanan <br> Budaya ('+ data[6].length+ ')')
                    $('#pemberdayaan').html('Pemberdayaan <br> Masyarakat Desa ('+ data[7].length +')')
                    $('#ormas').html('Pengawasan <br> Ormas dan LSM ('+ data[8].length +')')
                    $('#konflik').html('Pencegahan <br> Konflik Sosial ('+ data[9].length+ ')')
                    $('#tramtibum').html('Tramtibum ('+ data[10].length +')')
                    $('#pembinaan').html('Pembinaan Masyarakat <br> Taat Hukum ('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function purple() {
            var id = 4
            ajaxurl = '{{ route("admin.peta-sosbud.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Dempo Tengah')
                    $('#barcet').html('Pengawasan Bar.Cet <br> Dalam Negeri ('+ data[0].length +')')
                    $('#import').html('Was Import Bar.Cet <br> Dalam Negeri ('+ data[1].length +')')
                    $('#pembukuan').html('Pengawasan <br> Sistem Pembukuan ('+ data[2].length +')')
                    $('#media').html('Pengawasan <br> Media Komunikasi ('+ data[3].length +')')
                    $('#pakem').html('Pakem ('+ data[4].length +')')
                    $('#penodaan').html('Pencegahan <br> Penodaan Agama ('+ data[5].length +')')
                    $('#budaya').html('Ketahanan <br> Budaya ('+ data[6].length+ ')')
                    $('#pemberdayaan').html('Pemberdayaan <br> Masyarakat Desa ('+ data[7].length +')')
                    $('#ormas').html('Pengawasan <br> Ormas dan LSM ('+ data[8].length +')')
                    $('#konflik').html('Pencegahan <br> Konflik Sosial ('+ data[9].length+ ')')
                    $('#tramtibum').html('Tramtibum ('+ data[10].length +')')
                    $('#pembinaan').html('Pembinaan Masyarakat <br> Taat Hukum ('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function red() {
            var id = 3
            ajaxurl = '{{ route("admin.peta-sosbud.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Dempo Utara')
                    $('#barcet').html('Pengawasan Bar.Cet <br> Dalam Negeri ('+ data[0].length +')')
                    $('#import').html('Was Import Bar.Cet <br> Dalam Negeri ('+ data[1].length +')')
                    $('#pembukuan').html('Pengawasan <br> Sistem Pembukuan ('+ data[2].length +')')
                    $('#media').html('Pengawasan <br> Media Komunikasi ('+ data[3].length +')')
                    $('#pakem').html('Pakem ('+ data[4].length +')')
                    $('#penodaan').html('Pencegahan <br> Penodaan Agama ('+ data[5].length +')')
                    $('#budaya').html('Ketahanan <br> Budaya ('+ data[6].length+ ')')
                    $('#pemberdayaan').html('Pemberdayaan <br> Masyarakat Desa ('+ data[7].length +')')
                    $('#ormas').html('Pengawasan <br> Ormas dan LSM ('+ data[8].length +')')
                    $('#konflik').html('Pencegahan <br> Konflik Sosial ('+ data[9].length+ ')')
                    $('#tramtibum').html('Tramtibum ('+ data[10].length +')')
                    $('#pembinaan').html('Pembinaan Masyarakat <br> Taat Hukum ('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function green() {
            var id = 2
            ajaxurl = '{{ route("admin.peta-sosbud.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Pagar Alam Selatan')
                    $('#barcet').html('Pengawasan Bar.Cet <br> Dalam Negeri ('+ data[0].length +')')
                    $('#import').html('Was Import Bar.Cet <br> Dalam Negeri ('+ data[1].length +')')
                    $('#pembukuan').html('Pengawasan <br> Sistem Pembukuan ('+ data[2].length +')')
                    $('#media').html('Pengawasan <br> Media Komunikasi ('+ data[3].length +')')
                    $('#pakem').html('Pakem ('+ data[4].length +')')
                    $('#penodaan').html('Pencegahan <br> Penodaan Agama ('+ data[5].length +')')
                    $('#budaya').html('Ketahanan <br> Budaya ('+ data[6].length+ ')')
                    $('#pemberdayaan').html('Pemberdayaan <br> Masyarakat Desa ('+ data[7].length +')')
                    $('#ormas').html('Pengawasan <br> Ormas dan LSM ('+ data[8].length +')')
                    $('#konflik').html('Pencegahan <br> Konflik Sosial ('+ data[9].length+ ')')
                    $('#tramtibum').html('Tramtibum ('+ data[10].length +')')
                    $('#pembinaan').html('Pembinaan Masyarakat <br> Taat Hukum ('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function cream() {
            var id = 1
            ajaxurl = '{{ route("admin.peta-sosbud.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Pagar Alam Utara')
                    $('#barcet').html('Pengawasan Bar.Cet <br> Dalam Negeri ('+ data[0].length +')')
                    $('#import').html('Was Import Bar.Cet <br> Dalam Negeri ('+ data[1].length +')')
                    $('#pembukuan').html('Pengawasan <br> Sistem Pembukuan ('+ data[2].length +')')
                    $('#media').html('Pengawasan <br> Media Komunikasi ('+ data[3].length +')')
                    $('#pakem').html('Pakem ('+ data[4].length +')')
                    $('#penodaan').html('Pencegahan <br> Penodaan Agama ('+ data[5].length +')')
                    $('#budaya').html('Ketahanan <br> Budaya ('+ data[6].length+ ')')
                    $('#pemberdayaan').html('Pemberdayaan <br> Masyarakat Desa ('+ data[7].length +')')
                    $('#ormas').html('Pengawasan <br> Ormas dan LSM ('+ data[8].length +')')
                    $('#konflik').html('Pencegahan <br> Konflik Sosial ('+ data[9].length+ ')')
                    $('#tramtibum').html('Tramtibum ('+ data[10].length +')')
                    $('#pembinaan').html('Pembinaan Masyarakat <br> Taat Hukum ('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
    </script>
@endsection

