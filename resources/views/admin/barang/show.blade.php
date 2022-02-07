
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

    <title>BARANG CETAKAN</title>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <p>KEJAKSAAN NEGERI PAGAR ALAM</p>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 30px;">D.IN.13</span></u> <br />
        <br>
        <div class="cont py-3">
            <h5 class="text-center"><u>KARTU TIK BARANG CETAKAN</u></h5>
            <h6 class="text-center">
                Nomor : {{ $data->nomor }}
            </h6>
        </div>

        <div class="container fs-6 text-sm py-1 px-5 mx-1">
            <div class="row">
                <div class="col-12">I. IDENTITAS</div>
                <div class="row col-12">
                    <div class="row">
                        <div class="col-6 px-4">1. &emsp; Nama barang cetakan</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">2. &emsp;Penerbit</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->penerbit }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">3. &emsp; Pengarang</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->pengarang }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">4. &emsp; Waktu peredaran</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->waktu }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">5. &emsp; Daerah peredaran</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->daerah }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">6. &emsp; Pencetak</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->pencetak }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">7. &emsp; Nama Pimpinan Redaksi</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->nama_pimpinan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">8. &emsp; Alamat penerbit</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">
                            {{ $data->alamat_penerbit }}
                        </div>
                    </div>
                    <div class=" row ">
                        <div class="col-6 px-4 ">9. &emsp; Alamat percetakan</div>
                        <div class="col-1 ">:</div>
                        <div class="col-5" style="margin-left: -20px;">
                            {{ $data->alamat_percetakan }}
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6 px-4">10. &emsp;Jumlah Oplah</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->jumlah_oplah }}</div>
                    </div>
                    <br />
                </div>
            </div>
            <br />
            <div class="row ">
                <div class="col-12 ">II. BIOGRAFI INTELIJEN</div>
                <div class="row col-12 ">
                    <div class="row" style="width: max-content;flex-wrap: nowrap;">
                        <div class="col-6 px-4 ">1. &emsp; Kasus/masalah yang terjadi</div>
                        <div class="col-1 ">:</div>
                        <div class="col-5" style="margin-left: -20px;position: relative;display: flex;flex-wrap:wrap;width: 360px;height: max-content;"><p style="width: 360px;display: flex;flex-wrap: wrap;word-break: break-all">{{ $data->kasus }}</p></div>
                    </div>
                    <div class="row" style="width: max-content;flex-wrap: nowrap;">
                        <div class="col-6 px-4 ">
                            2. &emsp; Latar belakang dan akibatnya
                        </div>
                        <div class="col-1 ">:</div>
                        <div class="col-5" style="margin-left: -20px;position: relative;display: flex;flex-wrap:wrap;width: 360px;height: max-content;"><p style="width: 360px;display: flex;flex-wrap: wrap;word-break: break-all">{{ $data->background }}</p></div>
                    </div>
                    <div class="row ">
                        <div class="col-6 px-4 ">
                            3. &emsp; Tindakan yang dilakukan oleh
                        </div>
                        <div class="col-1 ">:</div>
                        <div class="col-5" style="margin-left: -20px;"></div>
                    </div>
                    <div class="row ">
                        <div class="col-6 px-5 ">
                            &emsp; a. Kejaksaan
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->tindakan_kejaksaan }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-6 px-5 ">
                            &emsp; b. Kepolisian
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->tindakan_kepolisian }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-6 px-5 ">
                            &emsp;c. Pengadilan
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->tindakan_pengadilan }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-6 px-4">4. &emsp; Keterangan lain-lain</div>
                        <div class="col-1">:</div>
                        <div class="col-5" style="margin-left: -20px;">{{ $data->keterangan }}</div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-6 py-5 ">
                    OTENTIKASI <br /> (Stampel dan Paraf)
                </div>
            </div>
        </div>
    </section>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>
</body>

</html>