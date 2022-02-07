@extends('admin.layouts.master')
@section('title', 'Peta Sosial Budaya')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/css/map.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body" style="display: flex; justify-content: center; align-items: center">
                <a href="{{ route('admin.pengawasan.index') }}" class="btn btn-primary mr-3">Pengawasan Lalu Lintas orang asing</a>
                <a href="{{ route('admin.asing-pidana.index') }}" class="btn btn-secondary">WNA yang Terlibat Tindak Pidana</a>
            </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Peta & Simbol sektor pada bidang ideologi, politik, pertahanan, dan keamanan</h1>
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
                    <div class="card-body" style="width: mac-content;display: flex;">
                        <div class="row text-center" style="display: block;z-index: 44444;">
                            <div class="col">
                                <a href="#">
                                    <img src="{{ asset('backend/img/pertahanan/1_Pengamanan Pancasila.jpg') }}" alt="" width="40" height="40">
                                </a>
                                <p id="pancasila">Pengamanan <br> Pancasila ({{ count($pancasila) }})</p>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <img src="{{ asset('backend/img/pertahanan/2_Persatuan dan Kesatuan Bangsa.jpg') }}" alt="" width="40" height="40">
                                </a>
                                <p id="persatuan">Persatuan & Kesatuan <br> Indonesia <br> ({{ count($persatuan) }})</p>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <img src="{{ asset('backend/img/pertahanan/3_Gerakan Separatis.jpg') }}" alt="" width="40" height="40">
                                </a>
                                <p id="gerakan">Gerakan <br> Separatis ({{ count($gerakan) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/4_Penyelenggaraan Pemerintahan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="penyelenggaraan">Penyelenggaraan <br> Pemerintahan ({{ count($penyelenggaraan) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/5_partai Politik, Pemilu, Pilkada.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="parpol">Parpol Pemilu <br> Pilkada ({{ count($parpol) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/6_gerakan terorisme dan radikalisme.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="terorisme">Terorisme & <br> Radikalisme ({{ count($terorisme) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/8_pengawasan wilayah teritorial.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="teritorial">Pengawasan <br> Wilayah Teritorial ({{ count($teritorial) }})</p>
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
                        <div class="row text-center" style="display: block;left: 0px;position: relative;">
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/9_kejahatan siber.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="cyber">Cyber Crime ({{ count($cyber) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/10_cekal.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pencegahan">Cegah Tangkal ({{ count($pencegahan) }})</p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('backend/img/pertahanan/11_pengawasan orang asing.jpg') }}" alt="" width="40" height="40">
                                <p id="pengawasan">Pengawasan <br> Orang Asing ({{ $pengawasan }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/12_pengamanan sumber daya organisasi kejaksaan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pam">PAM-SDO <br> Kejaksaan ({{ count($pam) }})</p>
                            </div>
                            <div class="col">
                            <a href="#">
                                <img src="{{ asset('backend/img/pertahanan/13_Pengamanan penanganan perkara.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="perkara">PAM Penanganan <br> Perkara ({{ count($perkara) }})</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card-body" style="width: mac-content;display: flex;">
                        <div class="row text-center" style="display: block;z-index: 44444;">
                            <div class="col">
                                <a href="{{ route('admin.pancasila.index') }}">
                                    <img src="{{ asset('backend/img/pertahanan/1_Pengamanan Pancasila.jpg') }}" alt="" width="40" height="40">
                                </a>
                                <p id="pancasila">Pengamanan <br> Pancasila <br>({{ count($pancasila) }})</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.persatuan.index') }}">
                                    <img src="{{ asset('backend/img/pertahanan/2_Persatuan dan Kesatuan Bangsa.jpg') }}" alt="" width="40" height="40">
                                </a>
                                <p id="persatuan">Persatuan & <br> Kesatuan Indonesia <br>({{ count($persatuan) }})</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.separatis.index') }}">
                                    <img src="{{ asset('backend/img/pertahanan/3_Gerakan Separatis.jpg') }}" alt="" width="40" height="40">
                                </a>
                                <p id="gerakan">Gerakan <br> Separatis <br>({{ count($gerakan) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.penyelenggaraan.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/4_Penyelenggaraan Pemerintahan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="penyelenggaraan">Penyelenggaraan <br> Pemerintahan <br>({{ count($penyelenggaraan) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.parpol.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/5_partai Politik, Pemilu, Pilkada.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="parpol">Parpol Pemilu <br> Pilkada <br>({{ count($parpol) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.terorisme.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/6_gerakan terorisme dan radikalisme.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="terorisme">Terorisme & <br> Radikalisme <br>({{ count($terorisme) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.teritorial.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/8_pengawasan wilayah teritorial.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="teritorial">Pengawasan <br> Wilayah Teritorial <br>({{ count($teritorial) }})</p>
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
                        <div class="row text-center" style="display: block;left: 0px;position: relative;">
                            <div class="col">
                            <a href="{{ route('admin.cyber.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/9_kejahatan siber.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="cyber">Cyber Crime <br>({{ count($cyber) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pencegahan.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/10_cekal.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pencegahan">Cegah Tangkal <br>({{ count($pencegahan) }})</p>
                            </div>
                            <div class="col">
                            <!-- <a href="/yolooooo"> -->
                                <img src="{{ asset('backend/img/pertahanan/11_pengawasan orang asing.jpg') }}" alt="" width="40" height="40" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <!-- </a> -->
                                <p id="pengawasan">Pengawasan <br> Orang Asing <br>({{ $pengawasan }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.pengamanan.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/12_pengamanan sumber daya organisasi kejaksaan.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="pam">PAM-SDO <br> Kejaksaan <br>({{ count($pam) }})</p>
                            </div>
                            <div class="col">
                            <a href="{{ route('admin.perkara.index') }}">
                                <img src="{{ asset('backend/img/pertahanan/13_Pengamanan penanganan perkara.jpg') }}" alt="" width="40" height="40">
                            </a>
                                <p id="perkara">PAM Penanganan <br> Perkara <br>({{ count($perkara) }})</p>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function yellow() {
            var id = 5
            ajaxurl = '{{ route("admin.peta-pertahanan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Dempo Selatan')

                    $('#pancasila').html('Pengamanan <br> Pancasila <br>('+ data[0].length +')')
                    $('#persatuan').html('Persatuan & <br> Kesatuan Indonesia <br>('+ data[1].length +')')
                    $('#gerakan').html('Gerakan <br> Separatis <br>('+ data[2].length +')')
                    $('#penyelenggaraan').html('Penyelenggaraan <br> Pemerintahan <br>('+ data[3].length +')')
                    $('#parpol').html('Parpol Pemilu <br> Pilkada  <br>('+ data[4].length +')')
                    $('#terorisme').html('Terorisme & <br> Radikalisme <br>('+ data[5].length +')')
                    $('#teritorial').html('Pengawasan <br> Wilayah Teritorial <br>('+ data[6].length+ ')')

                    $('#cyber').html('Cyber Crime <br>('+ data[7].length +')')
                    $('#pencegahan').html('Cegah Tangkal <br>('+ data[8].length+ ')')
                    $('#pengawasan').html('Pengawasan <br> Orang Asing <br>('+ data[9].length +')')
                    $('#pam').html('PAM-SDO <br> Kejaksaan <br>('+ data[10].length +')')
                    $('#perkara').html('PAM Penanganan <br> Perkara <br>('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function purple() {
            var id = 4
            ajaxurl = '{{ route("admin.peta-pertahanan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Dempo Tengah')
                    $('#pancasila').html('Pengamanan <br> Pancasila <br>('+ data[0].length +')')
                    $('#persatuan').html('Persatuan & <br> Kesatuan Indonesia <br>('+ data[1].length +')')
                    $('#gerakan').html('Gerakan <br> Separatis <br>('+ data[2].length +')')
                    $('#penyelenggaraan').html('Penyelenggaraan <br> Pemerintahan <br>('+ data[3].length +')')
                    $('#parpol').html('Parpol Pemilu <br> Pilkada  <br>('+ data[4].length +')')
                    $('#terorisme').html('Terorisme & <br> Radikalisme <br>('+ data[5].length +')')
                    $('#teritorial').html('Pengawasan <br> Wilayah Teritorial <br>('+ data[6].length+ ')')

                    $('#cyber').html('Cyber Crime <br>('+ data[7].length +')')
                    $('#pencegahan').html('Cegah Tangkal <br>('+ data[8].length+ ')')
                    $('#pengawasan').html('Pengawasan <br> Orang Asing <br>('+ data[9].length +')')
                    $('#pam').html('PAM-SDO <br> Kejaksaan <br>('+ data[10].length +')')
                    $('#perkara').html('PAM Penanganan <br> Perkara <br>('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function red() {
            var id = 3
            ajaxurl = '{{ route("admin.peta-pertahanan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Dempo Utara')
                    $('#pancasila').html('Pengamanan <br> Pancasila <br>('+ data[0].length +')')
                    $('#persatuan').html('Persatuan & <br> Kesatuan Indonesia <br>('+ data[1].length +')')
                    $('#gerakan').html('Gerakan <br> Separatis <br>('+ data[2].length +')')
                    $('#penyelenggaraan').html('Penyelenggaraan <br> Pemerintahan <br>('+ data[3].length +')')
                    $('#parpol').html('Parpol Pemilu <br> Pilkada  <br>('+ data[4].length +')')
                    $('#terorisme').html('Terorisme & <br> Radikalisme <br>('+ data[5].length +')')
                    $('#teritorial').html('Pengawasan <br> Wilayah Teritorial <br>('+ data[6].length+ ')')

                    $('#cyber').html('Cyber Crime <br>('+ data[7].length +')')
                    $('#pencegahan').html('Cegah Tangkal <br>('+ data[8].length+ ')')
                    $('#pengawasan').html('Pengawasan <br> Orang Asing <br>('+ data[9].length +')')
                    $('#pam').html('PAM-SDO <br> Kejaksaan <br>('+ data[10].length +')')
                    $('#perkara').html('PAM Penanganan <br> Perkara <br>('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function green() {
            var id = 2
            ajaxurl = '{{ route("admin.peta-pertahanan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#kecamatan').html('Kecamatan : Pagar Alam Selatan')
                    $('#pancasila').html('Pengamanan <br> Pancasila <br>('+ data[0].length +')')
                    $('#persatuan').html('Persatuan & <br> Kesatuan Indonesia <br>('+ data[1].length +')')
                    $('#gerakan').html('Gerakan <br> Separatis <br>('+ data[2].length +')')
                    $('#penyelenggaraan').html('Penyelenggaraan <br> Pemerintahan <br>('+ data[3].length +')')
                    $('#parpol').html('Parpol Pemilu <br> Pilkada  <br>('+ data[4].length +')')
                    $('#terorisme').html('Terorisme & <br> Radikalisme <br>('+ data[5].length +')')
                    $('#teritorial').html('Pengawasan <br> Wilayah Teritorial <br>('+ data[6].length+ ')')

                    $('#cyber').html('Cyber Crime <br>('+ data[7].length +')')
                    $('#pencegahan').html('Cegah Tangkal <br>('+ data[8].length+ ')')
                    $('#pengawasan').html('Pengawasan <br> Orang Asing <br>('+ data[9].length +')')
                    $('#pam').html('PAM-SDO <br> Kejaksaan <br>('+ data[10].length +')')
                    $('#perkara').html('PAM Penanganan <br> Perkara <br>('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
        function cream() {
            var id = 1
            ajaxurl = '{{ route("admin.peta-pertahanan.search", "id") }}'
            $.ajax({
                type: 'GET',
                url: ajaxurl,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(data);
                    $('#kecamatan').html('Kecamatan : Pagar Alam Utara')
                    $('#pancasila').html('Pengamanan <br> Pancasila <br>('+ data[0].length +')')
                    $('#persatuan').html('Persatuan & <br> Kesatuan Indonesia <br>('+ data[1].length +')')
                    $('#gerakan').html('Gerakan <br> Separatis <br>('+ data[2].length +')')
                    $('#penyelenggaraan').html('Penyelenggaraan <br> Pemerintahan <br>('+ data[3].length +')')
                    $('#parpol').html('Parpol Pemilu <br> Pilkada  <br>('+ data[4].length +')')
                    $('#terorisme').html('Terorisme & <br> Radikalisme <br>('+ data[5].length +')')
                    $('#teritorial').html('Pengawasan <br> Wilayah Teritorial <br>('+ data[6].length+ ')')

                    $('#cyber').html('Cyber Crime <br>('+ data[7].length +')')
                    $('#pencegahan').html('Cegah Tangkal <br>('+ data[8].length+ ')')
                    $('#pengawasan').html('Pengawasan <br> Orang Asing <br>('+ data[9].length +')')
                    $('#pam').html('PAM-SDO <br> Kejaksaan <br>('+ data[10].length +')')
                    $('#perkara').html('PAM Penanganan <br> Perkara <br>('+ data[11].length +')')
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
    </script>
@endsection

