<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Model B-KWK</title>
    <link rel="stylesheet" href="{{ asset('backend/pdf/style.css') }}">
</head>
<body>
    <section class="hero">
        <h1 style="width: 50vw">PERSEORANGAN PEMILIHAN GUBERNUR DAN WAKIL GUBERNUR</h1>
    </section>
    <div class="wrap-content">
        <p>Berdasarkan ketentuan Undang-Undang dan Peraturan Komisi Pemilihan Umum, bersama ini kami atas nama :</p>
        1. Nama Bakal Calon Gubernur : <br><span style="font-weight: bold;text-transform: uppercase;margin-left: 20px;"> <span style="font-weight: bold;">{{ Request::get('name') }}</span></span>
        <br>
        <br>
        2. Nama Bakal Calon Wakil Gubernur : <br>   <span style="font-weight: bold;text-transform: uppercase;margin-left: 20px;">{{ Request::get('wakil') }}</span>
        <br>
        <br>
        <p>Menyatakan :</p>
        <p>1. Mendaftarkan diri sebagai Bakal Pasangan Calon Gubernur dan Wakil Gubernur <b>Provinsi Papua Tengah</b> Tahun 2024 dengan jumlah pendukung <b>319.000</b> orang <b>(7.5%)</b> dari jumlah pemilih, yang tersebar di <b>6 kabupaten (100%)</b> Kabupaten dan telah memnuhi ketentuan jumlah dukungan dan sebaran sesuai ketentuan peraturan perundang-undangan yang berlaku.</p>
        <p>2. Bahwa naskah visi, misi dan program yang kami susun, telah sesuai dengan Rencana Pembangunan Jangka Panjang (RPJP) Daerah.</p>
        <p>Surat pencalonan ini sebagai bukti pemenuhan syarat pengajuan Bakal Pasangan Calon Gubernur dan Wakil Gubernur/Bupati dan Wakil Bupati/Wali kota dan Wakil Wali Kota, dan dilampiri dokumen lainnya sesuai ketentuan peraturan perundang-undangan yang</p>
        <p>Demikian Surat Pencalonan ini dibuat dengan sebenarnya untuk digunakan sebagaimana mestinya.</p>
        <div class="footer">
            <div>
                <p>Bakal Calon Gubernur</p>
                <br>
                <br>
                <br>
                <br>
                <h4 style="font-size: 16px;font-weight: bold;text-transform: uppercase;">{{ Request::get('name') }}</h4>
            </div>
            <div>
                <p style="width: max-content">Papua Tengah, {{ $date }}</p>
                <br>
                <br>
                <br>
                <br>
                <h4 style="font-size: 16px;font-weight: bold;text-transform: uppercase;">{{ Request::get('name') }}</h4>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>