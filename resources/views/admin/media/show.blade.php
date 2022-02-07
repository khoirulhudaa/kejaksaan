
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
    </style>

    <title>PENGAWASAN MEDIA KOMUNIKASI</title>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <p>KEJAKSAAN NEGERI PAGAR ALAM</p>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 30px;">D.IN.16</span></u> <br />
        <br>    
        <div class="cont py-3">
            <h5 class="text-center"><u>KARTU TIK PENGAWASAN MEDIA KOMUNIKASI</u></h5>
            <h6 class="text-center">
                Nomor : {{ $data->nomor }}
            </h6>
        </div>

        <div class="container fs-6 text-sm py-1 mx-1" style="position: relative;left: -10px;">
            <div class="row">
                <div class="col-12">I. IDENTITAS</div>
                <div class="row col-12">
                    <div class="row"></div>
                        <div class="col-7 px-4">1. &emsp; Nama media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">2. &emsp; Nama/NPWP pemsahaan media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->npwp }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">3. &emsp; Jenis usaha media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->jenis }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">4. &emsp; Alamat perusahaan media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->alamat }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">5. &emsp; Nomor telepon/website/email</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->phone }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">6. &emsp; Nama pimpinan media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->nama_pimpinan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">7. &emsp; Penanggungjawab media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->penanggung_jawab }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">8. &emsp; Ijin usaha media kornunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->ijin_usaha }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">9. &emsp; Waktu peredaran media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->waktu }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">10. &emsp; Daerah peredaran media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->daerah }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">11. &emsp; Jumlah peredaran media komunikasi</div>
                        <div class="col-1" style="margin-left: -50px;">:</div>
                        <div class="col-4" style="margin-left: -23px;">{{ $data->jumlah }}</div>
                    </div>
                    <br />
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-12">II. BIOGRAFI INTELIJEN</div>
                <div class="row col-12">
                    <div class="row" style="width: max-content;flex-wrap: nowrap;">
                        <div class="col-7 px-4">1. &emsp; Kasus/masalah yang terjadi</div>
                        <div class="col-1" style="margin-left: 1px">:</div>
                        <div class="col-4" style="margin-left: -20px;position: relative;display: flex;flex-wrap:wrap;width: 360px;height: max-content;"><p style="width: 360px;display: flex;flex-wrap: wrap;word-break: break-all">{{ $data->kasus }}</p></div>
                    </div>
                    <div class="row" style="width: max-content;flex-wrap: nowrap;">
                        <div class="col-7 px-4">
                            2. &emsp; Latar belakang dan akibatnnya
                        </div>
                        <div class="col-1" style="margin-left: -6px;">:</div>
                        <div class="col-4" style="margin-left: -20px;position: relative;display: flex;flex-wrap:wrap;width: 360px;height: max-content;"><p style="width: 360px;display: flex;flex-wrap: wrap;word-break: break-all">{{ $data->background }}></p></div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">
                            3. &emsp; Tindakan yang dilakukan oleh
                        </div>
                        <div class="col-1" style="margin-left: -43px;">:</div>
                        <div class="col-4" style="margin-left: -25px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-5">
                            &emsp;a. Kejaksaan
                        </div>
                        <div class="col-1" style="margin-left: -43px;">:</div>
                        <div class="col-4" style="margin-left: -25px;">{{ $data->tindakan_kejaksaan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-5">
                            &emsp;b. Kepolisian
                        </div>
                        <div class="col-1" style="margin-left: -43px;">:</div>
                        <div class="col-4" style="margin-left: -25px;">{{ $data->tindakan_kepolisian }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-5">
                            &emsp;c. Kominfo/diskominfo
                        </div>
                        <div class="col-1" style="margin-left: -43px;">:</div>
                        <div class="col-4" style="margin-left: -25px;">{{ $data->tindakan_kominfo }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-5">
                            &emsp;d. Pengadilan

                        </div>
                        <div class="col-1" style="margin-left: -43px;">:</div>
                        <div class="col-4" style="margin-left: -25px;">{{ $data->tindakan_pengadilan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-7 px-4">4. &emsp; Keterangan lain-lain</div>
                        <div class="col-1" style="margin-left: -43px;">:</div>
                        <div class="col-4" style="margin-left: -25px;">{{ $data->keterangan }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 py-5">
                    OTENTIKASI <br /> (Stampel dan Paraf)
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>