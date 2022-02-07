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
                <h1>Peta & Simbol sektor pada bidang teknologi dan produksi intelijen</h1>
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
                                <img src="{{ asset('backend/img/teknologi/1_produksi intelijen.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="produksi">Produksi <br> Intelijen ({{ count($produksi) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/2_pemantauan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pemantauan">Pemantauan ({{ count($pemantauan) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/3_intelijen sinyal.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="signal">Intelijen <br> signal ({{ count($signal) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/4_intelijen siber.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="siber">Intelijen <br> siber ({{ count($siber) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/5_klandestine.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="klandestine">Klandestine ({{ count($klandestine) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/12_pengembangan sdm intelijen lainnya.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="sdm">Pengembangan <br> SDM Intelijen ({{ count($sdm) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/14_pengembangan prosedur dan aplikasi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="prosedur">Pengembangan <br> Prosedur Aplikasi ({{ count($prosedur) }})</p>
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
                                <img src="{{ asset('backend/img/teknologi/6_digital forensik.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="digital">Digital <br> Forensik ({{ count($digital) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/7_transmisi berita sandi.jpg') }}" alt="" width="40" height="40">
                            </a> 
                                <p id="berita">Transmisi <br> Berita Sandi ({{ count($berita) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/8_kontra penginderaan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="kontra">Kontra <br> Penginderaan ({{ count($kontra) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/9_audit & pengujian sistem keamanan informasi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="audit">Audit Keamanan <br> Informasi ({{ count($audit) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/10_pengamanan sinyal.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pengamanan">Pengamanan <br> Signal ({{ count($pengamanan) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/teknologi/11_pengembangan sdm & sandi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="sandi">Pengembangan <br> SDM & Sandi ({{ count($sandi) }})</p>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="card-body" style="width: max-content;display: flex;">
                        <div class="row text-center" style="display: block;z-index: 44444;">
                            <div class="col">
                            <a href="{{ route('admin.produksi.index') }}">
                                <img src="{{ asset('backend/img/teknologi/1_produksi intelijen.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="produksi">Produksi <br> Intelijen ({{ count($produksi) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pemantauan.index') }}">
                                <img src="{{ asset('backend/img/teknologi/2_pemantauan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pemantauan">Pemantauan ({{ count($pemantauan) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.signal.index') }}">
                                <img src="{{ asset('backend/img/teknologi/3_intelijen sinyal.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="signal">Intelijen <br> signal ({{ count($signal) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.siber.index') }}">
                                <img src="{{ asset('backend/img/teknologi/4_intelijen siber.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="siber">Intelijen <br> siber ({{ count($siber) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.klandestine.index') }}">
                                <img src="{{ asset('backend/img/teknologi/5_klandestine.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="klandestine">Klandestine ({{ count($klandestine) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.sdm.index') }}">
                                <img src="{{ asset('backend/img/teknologi/12_pengembangan sdm intelijen lainnya.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="sdm">Pengembangan <br> SDM Intelijen ({{ count($sdm) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.prosedur.index') }}">
                                <img src="{{ asset('backend/img/teknologi/14_pengembangan prosedur dan aplikasi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="prosedur">Pengembangan <br> Prosedur Aplikasi ({{ count($prosedur) }})</p>
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
                            <a href="{{ route('admin.digital.index') }}">
                                <img src="{{ asset('backend/img/teknologi/6_digital forensik.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="digital">Digital <br> Forensik ({{ count($digital) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.berita.index') }}">
                                <img src="{{ asset('backend/img/teknologi/7_transmisi berita sandi.jpg') }}" alt="" width="40" height="40">
                            </a> 
                                <p id="berita">Transmisi <br> Berita Sandi ({{ count($berita) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.kontra.index') }}">
                                <img src="{{ asset('backend/img/teknologi/8_kontra penginderaan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="kontra">Kontra <br> Penginderaan ({{ count($kontra) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.audit.index') }}">
                                <img src="{{ asset('backend/img/teknologi/9_audit & pengujian sistem keamanan informasi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="audit">Audit Keamanan <br> Informasi ({{ count($audit) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pengamanan-signal.index') }}">
                                <img src="{{ asset('backend/img/teknologi/10_pengamanan sinyal.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pengamanan">Pengamanan <br> Signal ({{ count($pengamanan) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.sandi.index') }}">
                                <img src="{{ asset('backend/img/teknologi/11_pengembangan sdm & sandi.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="sandi">Pengembangan <br> SDM & Sandi ({{ count($sandi) }})</p>
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
            ajaxurl = '{{ route("admin.peta-teknologi.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Selatan')
                    $('#produksi').html('Produksi <br> Intelijen ('+ data[0].length +')')
                    $('#pemantauan').html('Pemantauan ('+ data[1].length +')')
                    $('#signal').html('Intelijen <br> Signal ('+ data[2].length +')')
                    $('#siber').html('Intelijen <br> Siber ('+ data[3].length +')')
                    $('#klandestine').html('Klandestine ('+ data[4].length +')')
                    $('#sdm').html('Pengembangan <br> SDM Intelijen ('+ data[5].length +')')
                    $('#prosedur').html('Pengembangan <br> Prosedur Aplikasi ('+ data[6].length+ ')')

                    $('#digital').html('Digital <br> Forensik ('+ data[7].length +')')
                    $('#berita').html('Transmisi <br> Berita Sandi ('+ data[8].length+ ')')
                    $('#kontra').html('Kontra <br> Penginderaan ('+ data[9].length +')')
                    $('#audit').html('Audit Keamanan <br> Informasi ('+ data[10].length +')')
                    $('#pengamanan').html('Pengamanan <br> Signal ('+ data[11].length +')')
                    $('#sandi').html('Pengembangan <br> SDM & Sandi ('+ data[12].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function purple() {
            var id = 4
            ajaxurl = '{{ route("admin.peta-teknologi.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Tengah')
                    $('#produksi').html('Produksi <br> Intelijen ('+ data[0].length +')')
                    $('#pemantauan').html('Pemantauan ('+ data[1].length +')')
                    $('#signal').html('Intelijen <br> Signal ('+ data[2].length +')')
                    $('#siber').html('Intelijen <br> Siber ('+ data[3].length +')')
                    $('#klandestine').html('Klandestine ('+ data[4].length +')')
                    $('#sdm').html('Pengembangan <br> SDM Intelijen ('+ data[5].length +')')
                    $('#prosedur').html('Pengembangan <br> Prosedur Aplikasi ('+ data[6].length+ ')')

                    $('#digital').html('Digital <br> Forensik ('+ data[7].length +')')
                    $('#berita').html('Transmisi <br> Berita Sandi ('+ data[8].length+ ')')
                    $('#kontra').html('Kontra <br> Penginderaan ('+ data[9].length +')')
                    $('#audit').html('Audit Keamanan <br> Informasi ('+ data[10].length +')')
                    $('#pengamanan').html('Pengamanan <br> Signal ('+ data[11].length +')')
                    $('#sandi').html('Pengembangan <br> SDM & Sandi ('+ data[12].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function red() {
            var id = 3
            ajaxurl = '{{ route("admin.peta-teknologi.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Utara')
                    $('#produksi').html('Produksi <br> Intelijen ('+ data[0].length +')')
                    $('#pemantauan').html('Pemantauan ('+ data[1].length +')')
                    $('#signal').html('Intelijen <br> Signal ('+ data[2].length +')')
                    $('#siber').html('Intelijen <br> Siber ('+ data[3].length +')')
                    $('#klandestine').html('Klandestine ('+ data[4].length +')')
                    $('#sdm').html('Pengembangan <br> SDM Intelijen ('+ data[5].length +')')
                    $('#prosedur').html('Pengembangan <br> Prosedur Aplikasi ('+ data[6].length+ ')')

                    $('#digital').html('Digital <br> Forensik ('+ data[7].length +')')
                    $('#berita').html('Transmisi <br> Berita Sandi ('+ data[8].length+ ')')
                    $('#kontra').html('Kontra <br> Penginderaan ('+ data[9].length +')')
                    $('#audit').html('Audit Keamanan <br> Informasi ('+ data[10].length +')')
                    $('#pengamanan').html('Pengamanan <br> Signal ('+ data[11].length +')')
                    $('#sandi').html('Pengembangan <br> SDM & Sandi ('+ data[12].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function green() {
            var id = 2
            ajaxurl = '{{ route("admin.peta-teknologi.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Pagar Alam Selatan')
                    $('#produksi').html('Produksi <br> Intelijen ('+ data[0].length +')')
                    $('#pemantauan').html('Pemantauan ('+ data[1].length +')')
                    $('#signal').html('Intelijen <br> Signal ('+ data[2].length +')')
                    $('#siber').html('Intelijen <br> Siber ('+ data[3].length +')')
                    $('#klandestine').html('Klandestine ('+ data[4].length +')')
                    $('#sdm').html('Pengembangan <br> SDM Intelijen ('+ data[5].length +')')
                    $('#prosedur').html('Pengembangan <br> Prosedur Aplikasi ('+ data[6].length+ ')')

                    $('#digital').html('Digital <br> Forensik ('+ data[7].length +')')
                    $('#berita').html('Transmisi <br> Berita Sandi ('+ data[8].length+ ')')
                    $('#kontra').html('Kontra <br> Penginderaan ('+ data[9].length +')')
                    $('#audit').html('Audit Keamanan <br> Informasi ('+ data[10].length +')')
                    $('#pengamanan').html('Pengamanan <br> Signal ('+ data[11].length +')')
                    $('#sandi').html('Pengembangan <br> SDM & Sandi ('+ data[12].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function cream() {
            var id = 1
            ajaxurl = '{{ route("admin.peta-teknologi.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Pagar Alam Utara')
                    $('#produksi').html('Produksi <br> Intelijen ('+ data[0].length +')')
                    $('#pemantauan').html('Pemantauan ('+ data[1].length +')')
                    $('#signal').html('Intelijen <br> Signal ('+ data[2].length +')')
                    $('#siber').html('Intelijen <br> Siber ('+ data[3].length +')')
                    $('#klandestine').html('Klandestine ('+ data[4].length +')')
                    $('#sdm').html('Pengembangan <br> SDM Intelijen ('+ data[5].length +')')
                    $('#prosedur').html('Pengembangan <br> Prosedur Aplikasi ('+ data[6].length+ ')')

                    $('#digital').html('Digital <br> Forensik ('+ data[7].length +')')
                    $('#berita').html('Transmisi <br> Berita Sandi ('+ data[8].length+ ')')
                    $('#kontra').html('Kontra <br> Penginderaan ('+ data[9].length +')')
                    $('#audit').html('Audit Keamanan <br> Informasi ('+ data[10].length +')')
                    $('#pengamanan').html('Pengamanan <br> Signal ('+ data[11].length +')')
                    $('#sandi').html('Pengembangan <br> SDM & Sandi ('+ data[12].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
    </script>
@endsection

