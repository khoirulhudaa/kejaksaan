<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Model B.1.1-KWK</title>
    <link rel="stylesheet" href="{{ asset('backend/pdf/style.css') }}">
</head>
<body>
    <section class="hero">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="logo-kpu" class="kpu">
        <h1 class="title2" style="left: 12%;position: relative;">DAFTAR NAMA PENDUKUNG PEMILIH PERSEORANGAN CALON PESERTA PEMILU ANGGOTA DEWAN PERWAKILAN DAERAH PEMILU TAHUN 2024</h1>
    </section>
    <div class="wrap-content2">
        <div class="alamat" style="width: 100vw;margin-bottom: 40px;margin-left: 40px;display: flex;justify-content: space-between;align-items: center;margin-top: -50px;">
          <div class="alamat2" style="flex-direction: column;display: flex;align-items: center;">
            <div style="font-weight: bold;">KELURAHAN/DESA : <b class="v"><span style="font-weight: bold;margin-left: 10px;">{{ $ktp[0]->getSubdistrict->subdis_name }}</span></b></div>
            <div style="font-weight: bold;">KECAMATAN : <b class="v">{{ $ktp[0]->getDistrict->dis_name }} }}</b></div>
          </div>
          <div class="alamat2" style="flex-direction: column;display: flex;align-items: center;">
            <div style="font-weight: bold;">KABUPATEN/KOTA : <b class="v">{{$ktp[0]->getCity->city_name }}</b></div>
            <div style="font-weight: bold;">PROVINSI : <b class="v">PAPUA TENGAH</b></div>
          </div>
      </div>
        <br>
        <table class="table tbl3" style="width: 111vw;margin-top: 0px;transform: scale(1.15)">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Alamat Lengkap</th>
                <th scope="col">Tanda Tangan / Cap Jempol</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1
              @endphp
              @foreach ($ktp as $value)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->nik }}</td>
                  <td>{{ $value->tanggal_lahir }}</td>
                  <td>{{ $value->jenis_kelamin }}</td>
                  <td>{{ $value->keterangan }}</td>
                  <td>{{ $value->alamat }}</td>
                  <td>-</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          <div class="footer ft23">
            <div class="llr">
                <p style="width: max-content;">Papua Tengah, {{ $date }}</p>
                <h4 style="font-size: 18px;text-transform: uppercase;font-weight: bold;width: max-content;">BAKAL CALON YANG BERSANGKUTAN</h4>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p>(.....................................................)</p>
            </div>
          </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
