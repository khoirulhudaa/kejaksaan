<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Model B.2-KWK</title>
    <link rel="stylesheet" href="{{ asset('backend/pdf/style.css') }}">
</head>
<body>
    
    <section class="hero">
        <h1>REKAPITULASI JUMLAH DUKUNGAN BAKAL PASANGAN CALON GUBERNU DALAM PEMILIHAN GUBERNUR DAN WAKIL GUBERNUR</h1>
        <br>
        <div class="wrap-content">
            <p>Rekapitulasi jumlah dukungan bakal pasangan calon perseorangan pemilihan Gunernur dan Wakil Gubernur Provinsi Papua Tahun 2024, atas nama : </p>
            <br>
            <p>1. Nama Bakal Calon Gubernur <span>:</span> <br> <span style="font-weight: bold;text-transform: uppercase;margin-left: 20px;">{{ Request::get('name') }}</span></p>
            <p>2. Nama Bakal Calon Wakil Gubernur : <br> <span style="font-weight: bold;text-transform: uppercase;margin-left: 20px;">{{ Request::get('wakil') }}</span></p>
            <p>Dengan rincian data sebagai berikut :</p>
            <p>Tabel RincianJumalh Pendukung Bakal Pasangan Calon Perseorangan</p>
            <table class="table tg">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kabupaten/kota</th>
                    <th scope="col">Nama Kecamatan</th>
                    <th scope="col">Nama Kel/Desa</th>
                    <th scope="col">Jumlah pendukung</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1
                  @endphp
                  @foreach ($data as $item )
                  <tr style="border-bottom: none;border-top: none;">
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $item->getCity->city_name }}</td>
                    <td>{{ $item->getDistrict->dis_name }}</td>
                    <td>{{ $item->getSubdistrict->subdis_name }}</td>
                    <td>{{ $item->total }} Orang</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <p class="berdasarkan ftr">Berdasarkan tabel tersebut, jumlah dukungan bakal pasangan calon perseorangan adalah :</p>
            <p>a. Jumlah dukungan  <span>:</span> {{ $total }} pendukung</p>
            <p>b. Jumlah sebaran <span>:</span> 6 kabupaten/kecamatan*)</p>
            <div class="footer">
                <div>
                    <p>Bakal Calon Gubernur</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h5>{{ Request::get('name') }}</h5>
                </div>
                <div>
                    <p style="width: max-content;">Papua Tengah, {{ $date }}</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h5>{{ Request::get('wakil') }}</h5>
                </div>
            </div>
        </div>
    </section>
</body>
</html>