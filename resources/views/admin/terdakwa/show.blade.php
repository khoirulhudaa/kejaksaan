
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />
    <style>
        @page {
            size: A4;
        }
        
        div {
            font-size: 14px;
        }
        .ff {
            width: 150px;
            height: 120px
        }
        .ff img {
            width: 100%;
            height: 100%
        }
    </style>

    <title> TERSANGKA /TERDAKWA/TERPIDANA</title>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <p>KEJAKSAAN NEGERI PAGAR ALAM</p>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 30px;">D.IN.15</span></u> <br />
        <br>
        <div class="cont py-3">
            <h5 class="text-center"><u>KARTU TIK  TERSANGKA /TERDAKWA/TERPIDANA</u></h5>
            <h6 class="text-center">
                Nomor : {{ $data->nomor }}
            </h6>
        </div>

        <div class="container fs-6 text-sm py-1 px-5 mx-1">
            <div class="row">
                <div class="col-12">I. IDENTITAS</div>
                <div class="row col-12">
                    <div class="row">
                        <div class="col-6 px-4">1. &emsp; Nama Lengkap</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">2. &emsp; Nama samaran/panggilan</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->panggilan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">3. &emsp; Tempat/Tgl lahir/Umur</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->tempat_lahir }} / {{ $data->tanggal_lahir }} / {{ $age }} tahun</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">4. &emsp; Jenis Kelamin</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->jenis_kelamin }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">5. &emsp; Bangsa/Suku</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->bangsa->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">6. &emsp; Kewarganegaraan</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->kewarganegaraan->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">7. &emsp; Alamat/Tempat Tinggal</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->alamat }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">8. &emsp; Nomor Telepon/HP </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->phone }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">9. &emsp; Nomor Pasport</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->pasport }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">10. &emsp; Agama/Kepercayaan
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->agama->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">11. &emsp; Pekerjaan</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->pekerjaan->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">12. &emsp;Alamat Kantor</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->alamat_kantor }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">13. &emsp; Status Perkawinan</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->perkawinan->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">14. &emsp; Kepartaian
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->kepartaian }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">15. &emsp; Pendidikan
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->pendidikan->name }}</div>
                    </div>
                    <br />
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-12">II. RIWAYAT PERKARA:</div>
                <div class="row col-12">
                    <div class="row">
                        <div class="col-6 px-4">1. &emsp; Kasus/masalah yang terjadi</div>
                    </div>
                    <div class="row" style="width: max-content;flex-wrap: nowrap;">
                        <div class="col-6 px-5">a &emsp; Kasus posisi secara singkat/ pasal yang dilanggar</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;position: relative;display: flex;flex-wrap:wrap;width: 360px;height: max-content;"><p style="width: 360px;display: flex;flex-wrap: wrap;word-break: break-all">{{ $data->kasus }}</p></div>
                    </div>
                    <div class="row" style="width: max-content;flex-wrap: nowrap;">
                        <div class="col-6 px-5">b &emsp;Latar belakang & akibat- akibat peristiwa/kerugian</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;position: relative;display: flex;flex-wrap:wrap;width: 360px;height: max-content;"><p style="width: 360px;display: flex;flex-wrap: wrap;word-break: break-all">{{ $data->background }}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5">c&emsp;SP3/SK</div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                            <div class="row" style="margin-left: -30px;">
                                <div class="col-1">No. </div>
                                <div class="col-4">{{ $data->no_skpp}}</div>
                                <div class="col-1">Tgl</div>
                                <div class="col-5">{{ $data->tgl_skpp }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5">d &emsp; Putusan pengadilan</div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                            <div class="row" style="margin-left: -30px;">
                                <div class="col-1">PN</div>
                                <div class="col-5">{{ $data->putusan_pengadilan_pn }}</div>
                            </div>
                            <div class="row" style="margin-left: -30px;">
                                <div class="col-1">PT</div>
                                <div class="col-5">{{ $data->putusan_pengadilan_pt }}</div>
                            </div>
                            <div class="row" style="margin-left: -30px;">
                                <div class="col-1">MA</div>
                                <div class="col-5">{{ $data->putusan_pengadilan_ma }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 px-4">
                            2. &emsp; Nama orang tua/alamat

                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -18px;">{{ $data->nama_orangtua }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">
                            3. &emsp; Nama kawan yang dikenal
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -18px;">{{ $data->nama_kawan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">4. &emsp;Lain-lain
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -18px;">{{ $data->lain }}</div>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-sm-3">
                    <p class="card-title">OTENTIKASI <br /> (Stampel dan Paraf)</p>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">SIDIK JARIl</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">TANDA TANGAN</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body p-0 ff">
                            <img src="{{ asset('img/terdakwa').'/'. $data->photo }}" alt="" width="100" height="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>

</html>