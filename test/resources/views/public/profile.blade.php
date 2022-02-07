<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('frontend/bs/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/icons/css/all.min.css') }}">
    <title>Profil</title>
    <style>
        .details {
            display: none;
        }
        .fa-home {
            font-size: 30px;
            border-radius: 10000px;
            width: 60px;
            height: 60px;
            margin-top: 45px;
            display: flex;
            position: relative;
            color: white;
            text-align: center;
            justify-content: center;
            cursor: pointer;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(39, 39, 39);
            transition: 0.4s;
        }
        .fa-home:hover {
            filter: brightness(80%);
            transform: scale(0.9);
            transition: 0.4s;
        }
        @media screen and (max-width: 720px) {
            .ff {
                flex-direction: column;
            }    
            .profile.card {
                width: 90vw;
                margin-left: auto;
                margin-right: auto;
                height: max-content;
            }    
            .profile.card-img-top {
                width: 60%;
            }
            .profile-details {
                display: none;
            }    
            .open {
                width: 80px;
            }
            .dot {
                margin-right: 16px;
            }
            .details {
                width: 90vw;
                border-radius: 12px;
                padding: 16px;
                display: inline;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            }
            .jbt {
                border-radius: 100px;
                color: white;
                width: max-content;
                text-align: center;
                padding: 10px;
                background-color: rgb(83, 82, 82);
                box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            }
            .ul {
                position: relative;
                bottom: 20px;
                margin-left: -33px
            }
        }
    </style>
</head>
<body>
    <div class="container my-5 px-0 d-flex ff">
        <!-- Profile Card -->
        <div class="profile card shadow border-0 p-3 rounded-3">
            <img src={{ asset('frontend/assets/img/hero-img.png') }} class="profile card-img-top mx-auto pt-2 ps-2" alt="profile" />
            <div class="card-body">
                <h5 class="card-text text-center fs-4">
                    SENATOR
                </h5>
                <h6 class="card-text text-center fw-bold fs-5">
                    OTOPIANUS P.TEBAI
                </h6>
                <p class="card-text text-center fs-6">
                    ANGGOTA DPD-RI/MPR-RI DAPIL PAPUA
                </p>
                <br>
                <hr>
                <a href="/"><i class="fas fa-home"></i></a>
            </div>
        </div>

        <div class="details shadow">
            <div class="d-flex">
                <p class="open">Nama</p> <p class="dot">:</p> <p>Otopianus P. Tebai</p>
            </div>
            <div class="d-flex">
                <p class="open">TTL</p> <p class="dot">:</p> <p>Modio, 5 Oktober 1991</p>
            </div>
            <div class="d-flex">
                <p class="open">Usia</p> <p class="dot">:</p> <p>30 Tahun</p>
            </div>
            <hr>
            <div class="d-block">
                <p class="open jbt">Jabatan</p> <p>DPD RI terpilih perwakilan Papua</p>
            </div>
            <hr>
            <div class="d-flex">
                <p class="open">Pasangan</p> <p class="dot">:</p> <p>Editha Tekege</p>
            </div>
            <div class="d-flex">
                <p class="open">Anak</p> <p class="dot">:</p> <p>7 Orang</p>
            </div>
            <div class="d-flex">
                <p class="open">Agama</p> <p class="dot">:</p> <p>Katholik</p>
            </div>
            <hr>
            <div class="d-block">
                <p class="open jbt">Pendidikan  </p>
                <br>
                <ul class="ul">
                    <li>SD YPPK DON BOSCO MODIO (1997-2003)</li>
                    <li>SMP PGRI NABIRE (2003-2006)</li>
                    <li>SMA YPPG NABIRE (2006-2009)</li>
                </ul>
            </div>
            <hr>
            <p>
                <span class="fw-bold">Otopianus P. Tebai</span>, (lahir di Modio, Dogiyai, Papua, 05
                Oktober 1991; umur 29 tahun), adalah anggota DPD RI terpilih mewakili daerah
                pemilihan Papua pada Pemilu 2019. Sebelum terpilih sebagai anggota MPR RI/[1]DPD RI,
                Otopianus adalah seorang tokoh pemuda papua yang pekerja keras Mulai dari menjadi
                Pengojek Hingga Terakhir tenaga honorer hingga dilantik menjadi Senator Papua.
            </p> <br>
            <p>
                Nama lengkap pria kelahiran Modio, Dogiyai, Papua, tanggal 5 Oktober 1991 ini adalah
                Otopianus Petrus Tebai. Ia akrab disapa ‘Otopet’. Pria yang menikah dengan Editha
                Tekege dan memiliki 7 orang anak ini (Jakson Paulus Gaibii Tebai, Rosalina Tebai,
                Maya Tebai (Alm) Sonny Habel Tebai, Rafael Wadibi Tebai ( Alm) Clarita Tebai, Daud
                Kobehawi Tebai dan Maria Tebai), lahir dari pasangan Leonard Tebai, S.Sos, M.Kes
                (seorang mantri) dan Maria Kedeikoto, Amd. Kep, S.Kep (seorang perawat), pasangan
                asli Papua, yang menjalani hidup dan kehidupan di Tanah Papua, dengan sederhana.
                Sejak kecil, Otopet memiliki sejuta mimpi. Salah satu mimpinya adalah ia ingin
                mengubah Papua dan kehidupan masyarakat di sana menjadi lebih baik. Sejahtera dan
                menjalani hidup penuh suka cita. Dan mimpi Otopet ini adalah juga mimpi dirinya
                dengan 5 (lima) orang saudara kandungnya, yakni Yohanes Tebai, yang bekerja sebagai
                PNS; Mikael Tebai – yang masih berstatus pengangguran; Desi Kristina Tebai – seorang
                mahasiswa; Emanuel Tebai – yang juga seorang mahasiswa dan si bungsu, Deksander
                Tebai – seorang pelajar. Orangtua Otopet, banyak membekali dirinya sejak kecil untuk
                selalu rajin beribadah, jujur dan baik dan hormat terhadap sesama. Sesuai dengan
                ajaran Katholik yang ia anut.
            </p>
            <p>
                Bersyukurlah Otopet, dengan dukungan keluarga, sahabat, dan masyarakat Papua serta
                dilandasi keinginan yang kuat, maju ikut pemilihan Anggota Parlemen. Tujuannya focus
                membawa kemajuan bagi Papua dan masyarakatnya. Pucuk dicinta, ulam pun tiba. 2019
                –2024, Otopianus P. Tebai terpilih sebagai salah satu Anggota Dewam Perwakilan
                Daerah Republik Indonesia mewakili Provinsi Papua[2]. Ia bercita-cita dalam beberapa
                tahun mendatang dengan terpilih sebagai Anggota Dewan Perwakilan Daerah, Otopet
                ingin membawa harun nama Bangsa dan Papua. Otopet, ingin mengajak semua komponen
                masyarakat duduk bersama bicara masalah Papua. Termasuk mau dibawa kemana Papua.
            </p> <br>
            <p>
                Dengan dukungan 425.159 suara (suara kedua terbanyak dalam Pileg 17 April 2019
                lalu), kini Otopet adalah Anggota Dewan Perwakilan Daerah Republik Indonesia
                mewakili Provinsi Papua dengan no Anggota B.130. Ia bergabung di Komite 1 bersama
                dengan Anggota Dewan Perwakilan Daerah dari 34 Provinsi lainnya yang ada di
                Indonesia. Otopet akan terus berjuang. Tugas dan tanggungjawab Komite 1 DPD RI,
                yaitu:
            </p>
        </div>

        <!-- Profile Summary -->
        <div class="container shadow ms-5 px-5 py-4 rounded-3 profile-details">
            <h4 class="fw-bold">Profil</h4>
            <hr class="border border-dark">
            <div class="row">
                <div class="col-4 px-0">
                    <ul class="px-3">
                        <li>Nama</li>
                        <li>Tempat, tanggal lahir</li>
                        <li>Usia</li>
                        <li>Jabatan</li>
                        <li>Pasangan</li>
                        <li>Anak</li>
                        <li>Agama</li>
                        <li>Pendidikan</li>
                        <br><br>
                        <li>Pernah bekerja di</li>
                    </ul>
                </div>
                <div class="col-8 px-0">
                    <ul class="px-0">
                        <li>: <span class="px-3">Otopianus P. Tebai</span></li>
                        <li>: <span class="px-3">Modio, 5 Oktober 1991</span></li>
                        <li>: <span class="px-3">30 tahun</span></li>
                        <li>: <span class="px-3">DPD RI terpilih perwakilan Papua</span></li>
                        <li>: <span class="px-3">Editha Tekege</span></li>
                        <li>: <span class="px-3">7 orang</span></li>
                        <li>: <span class="px-3">Katholik</span></li>
                        <li>: <span class="px-3">SD YPPK DON BOSCO MODIO (1997-2003)
                                <br>
                                <span class="px-4">SMP PGRI NABIRE (2003-2006)</span>
                                <br>
                                <span class="px-4">SMA YPPG NABIRE (2006-2009)</span>
                        </li>
                        <li>: <span class="px-3">BPMPK di Kabupaten Dogiyagi (2014-2016)</span></li>
                        <li> <span class="px-4">Dishub di Kabupaten Namire (2017-2018)</span></li>
                    </ul>
                </div>

                <!-- Profile Details Button -->
                <button type="button" class="btn px-4 py-2 mx-auto mt-4 mb-2 text-white btn-profile"
                    data-bs-toggle="modal" data-bs-target="#ProfileDetails">
                    Selengkapnya
                </button>

                <!-- Profile Details -->
                <div class="modal fade" id="ProfileDetails" tabindex="-1" aria-labelledby="ProfileDetailsLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen w-100">
                        <div class="modal-content profile-details">
                            <div class="modal-header">
                                <h5 class="modal-title mx-5 ps-2" id="ProfileDetailsLabel">Profil Lengkap</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5 py-4 ms-4">
                                <p>
                                    <span class="fw-bold">Otopianus P. Tebai</span>, (lahir di Modio, Dogiyai, Papua, 05
                                    Oktober 1991; umur 29 tahun), adalah anggota DPD RI terpilih mewakili daerah
                                    pemilihan Papua pada Pemilu 2019. Sebelum terpilih sebagai anggota MPR RI/[1]DPD RI,
                                    Otopianus adalah seorang tokoh pemuda papua yang pekerja keras Mulai dari menjadi
                                    Pengojek Hingga Terakhir tenaga honorer hingga dilantik menjadi Senator Papua.
                                </p> <br>
                                <p>
                                    Nama lengkap pria kelahiran Modio, Dogiyai, Papua, tanggal 5 Oktober 1991 ini adalah
                                    Otopianus Petrus Tebai. Ia akrab disapa ‘Otopet’. Pria yang menikah dengan Editha
                                    Tekege dan memiliki 7 orang anak ini (Jakson Paulus Gaibii Tebai, Rosalina Tebai,
                                    Maya Tebai (Alm) Sonny Habel Tebai, Rafael Wadibi Tebai ( Alm) Clarita Tebai, Daud
                                    Kobehawi Tebai dan Maria Tebai), lahir dari pasangan Leonard Tebai, S.Sos, M.Kes
                                    (seorang mantri) dan Maria Kedeikoto, Amd. Kep, S.Kep (seorang perawat), pasangan
                                    asli Papua, yang menjalani hidup dan kehidupan di Tanah Papua, dengan sederhana.
                                    Sejak kecil, Otopet memiliki sejuta mimpi. Salah satu mimpinya adalah ia ingin
                                    mengubah Papua dan kehidupan masyarakat di sana menjadi lebih baik. Sejahtera dan
                                    menjalani hidup penuh suka cita. Dan mimpi Otopet ini adalah juga mimpi dirinya
                                    dengan 5 (lima) orang saudara kandungnya, yakni Yohanes Tebai, yang bekerja sebagai
                                    PNS; Mikael Tebai – yang masih berstatus pengangguran; Desi Kristina Tebai – seorang
                                    mahasiswa; Emanuel Tebai – yang juga seorang mahasiswa dan si bungsu, Deksander
                                    Tebai – seorang pelajar. Orangtua Otopet, banyak membekali dirinya sejak kecil untuk
                                    selalu rajin beribadah, jujur dan baik dan hormat terhadap sesama. Sesuai dengan
                                    ajaran Katholik yang ia anut.
                                </p> <br>
                                <p>
                                    Orang tuanya juga selalu menanamkan ke dirinya bahwa manusia itu terlahir sebagai
                                    mahluk Tuhan yang sama dan juga mempunyai hak yang sama untuk mendapatkan apapun di
                                    dunia ini. Termasuk dalam hal mendapatkan pendidikan dan penghidupan yang layak.
                                    Ketika umur sekitar 6 tahun, pada tahun 1997, Otopet sangat bersyukur ia bisa
                                    mengenyam pendidikan di SD DON BOSCO YPPK, di Modio, Dogiyai, Papua. Kemudian
                                    setelah lulus Sekolah Dasar tahun 2003, Otopet melanjutkan tekadnya menimba ilmu
                                    lebih tinggi lagi dan ia terdaftar sebagai murid SMP di SMP PGRI di Nabire, Papua.
                                    Selepas lulus SMP pada tahun 2006, Otopet terus bersemangat untuk melanjutkan
                                    sekolahnya ke SMA YPPGI, dan ia memilih Jurusan IPA di Nabire, Papua. Diakui Otopet
                                    sejak di SMA, tekadnya untuk terus maju dan sejajar dengan anak-anak muda lainnya
                                    selalu membara. Meskipun, ia terlahir dari keluarga yang sangat sederhana. Dorongan
                                    dari kedua orangtuanya juga diakuinya sebagai salah satu sumber semangat hidupnya.
                                    Otopet, sosok anak muda sederhana dan pekerja keras ini, acap kali mencari tahu
                                    hal-hal yang bisa membuka wawasannya untuk terus berkembang dan maju. Karena Otopet
                                    memang ingin betul-betul mewujudkan mimpinya: membuka tabir gelap yang selalu
                                    mewarnai Papua, tanah kelahiran yang dicintainya dengan segenap jiwa dan raganya.
                                    Tidak heran bila, sejak menjadi siswa berseragam putih abu-abu, Otopet gemar
                                    menambah ilmunya selain dari buku, juga melalui media online. Ia selalu menanamkan
                                    ke dirinya untuk melek informasi, dan bisa menguasai teknologi di tengah situasi dan
                                    kondisi di Tanah Papua yang diakuinya belum kondusif dan seperti dianaktirikan oleh
                                    Pemerintah.
                                </p> <br>
                                <p>
                                    Di sisi lain, situasi yang tidak bersahabat di Papua, dan juga insiden-insiden
                                    berdarah, dan juga keamanan yang kurang kondusif, Otopet selalu berusaha membuat
                                    dirinya senang dan selalu bersemangat. Apalagi sejak ia sadar bahwa ia gemar
                                    menulis. Karena lewat tulisan lah Otopet bisa mencurahkan apa yang ingin dia
                                    ungkapkan. Mulai tentang diri, keluarga, sahabat, dan tentu saja tentang Papua dan
                                    masyarakat yang ada di sana. Tekad Otopet ingin membuat Papua maju dan layak
                                    bersanding dengan Provinsi-Provinsi lain di Indonesia. Apalagi diakui Otopet Papua
                                    adalah tanah yang kaya. Papua sendiri memiliki 7 wilayah adat dengan 257 suku di
                                    dalamnya. Mungkin tidak mudah memahami Papua. Namun Otopet yakin, dengan ‘good
                                    will’, tidak ada yang tidak mungkin untuk Papua. Untuk itulah, Otopet muda, selepas
                                    SMA, dan sebelum mendapatkan pekerjaan, Otopet terus memperkaya diri dan wawasannya
                                    dengan hal-hal yang positif. Ia terus belajar. Otopet terus mencari tahu banyak hal
                                    demi kemajuan Papua, baik itu melalui kegiatan yang ia lakukan, lewat teman, lewat
                                    media. Dan di dalam lembar demi lembar perjalanan hidupnya, dan di tengah
                                    penantiannya, Otopet yang masih ingin melanjutkan sekolahnya hingga ke jenjang
                                    Perguruan Tinggi, mendapatkan kesempatan bekerja sebagai seorang tenaga kontrak di
                                    dua instansi, yakni di BPMPK, Kabupaten Dogiyai 2014-2016 dan DISHUB Kabupaten
                                    Nabire 2017-2018). Dengan menjadi seorang karyawan, meski hanya sebagai tenaga
                                    honorer, Otopet terus membuka diri selebar-lebarnya, dan mencari tahu apa yang bisa
                                    ia lakukan demi membawa Papua dan masyarakatnya maju. Dan perjuangan itu
                                    belumselesai. Termasuk menimba ilmu dan membuka wawasan.
                                </p> <br>
                                <p>
                                    Bersyukurlah Otopet, dengan dukungan keluarga, sahabat, dan masyarakat Papua serta
                                    dilandasi keinginan yang kuat, maju ikut pemilihan Anggota Parlemen. Tujuannya focus
                                    membawa kemajuan bagi Papua dan masyarakatnya. Pucuk dicinta, ulam pun tiba. 2019
                                    –2024, Otopianus P. Tebai terpilih sebagai salah satu Anggota Dewam Perwakilan
                                    Daerah Republik Indonesia mewakili Provinsi Papua[2]. Ia bercita-cita dalam beberapa
                                    tahun mendatang dengan terpilih sebagai Anggota Dewan Perwakilan Daerah, Otopet
                                    ingin membawa harun nama Bangsa dan Papua. Otopet, ingin mengajak semua komponen
                                    masyarakat duduk bersama bicara masalah Papua. Termasuk mau dibawa kemana Papua.
                                </p> <br>
                                <p>
                                    Dengan dukungan 425.159 suara (suara kedua terbanyak dalam Pileg 17 April 2019
                                    lalu), kini Otopet adalah Anggota Dewan Perwakilan Daerah Republik Indonesia
                                    mewakili Provinsi Papua dengan no Anggota B.130. Ia bergabung di Komite 1 bersama
                                    dengan Anggota Dewan Perwakilan Daerah dari 34 Provinsi lainnya yang ada di
                                    Indonesia. Otopet akan terus berjuang. Tugas dan tanggungjawab Komite 1 DPD RI,
                                    yaitu:
                                </p>
                                <ul>
                                    <li class="mb-3">Pemerintah Daerah</li>
                                    <li class="mb-3">Hubungan pusat dan daerah serta antar daerah</li>
                                    <li class="mb-3">Pembentukan, pemekaran dan penggabungan daerah</li>
                                    <li class="mb-3">Pemukiman dan kependudukan</li>
                                    <li class="mb-3">Pertanahan dan tata ruang</li>
                                    <li class="mb-3">Politik, hukum, HAM dan ketertiban umum; dan</li>
                                    <li class="mb-3">Permasalahan daerah di wilayah perbatasan Negara</li>
                                </ul>
                                <p>
                                    Akan terus diembannya. Dan the last but not least, dengan 3 kata TANGGAP, TINDAK dan
                                    KERJA, Otopianus P. Tebai berkomitmen untuk memajukan Papua dan masyarakatnya dengan
                                    mencoba fokus ke beberapa hal yang diakuinya sangat penting, yaitu:
                                </p>
                                <ul>
                                    <li class="mb-3">Pemberdayaan Perempuan</li>
                                    <li class="mb-3">Kesehatan</li>
                                    <li class="mb-3">Pendidikan</li>
                                    <li class="mb-3">Pengembangan Ekonomi Kerakyatan</li>
                                    <li class="mb-3">Pariwisata, dan</li>
                                    <li class="mb-3">Kepastian Hukum dan HAM serta Peraturan PerUndang-Undangan di Tanah
                                        Papua</li>
                                </ul> <br>
                                <p>
                                    Semua bisa dilakukan untuk kemajuan Papua dengan sarat ada kemauan membuka diri bagi
                                    semua pihak. Dan menyelesaikan masalah Papua harus tanpa masalah. Lihatlah dan
                                    selesaikan lah masalah Papua sebagai sebuah kesatuan yang saling melengkapi. Papua,
                                    Otopet, anak muda dari suku Mee, dan siapapun yang berada di pulau nomor dua
                                    terbesar di dunia itu adalah Indonesia. Saatnya anak muda Papua membangun daerahnya
                                    sendiri. Semua harus peka.
                                </p> <br>
                                <p>
                                    Ayo, TANGGAP, TINDAK dan KERJA!!!
                                </p>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn px-4 py-2 fw-bold text-white mx-auto btn-closeProfile"
                                    data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('frontend/bs/js/bootstrap.min.js') }}"></script>
</body>
</html>
