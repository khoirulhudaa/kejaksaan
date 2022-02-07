
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

    <title>ORGANISASI</title>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <p>KEJAKSAAN NEGERI PAGAR ALAM</p>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 30px;">D.IN.14</span></u> <br />
        <br>
        <div class="cont py-3">
            <h5 class="text-center"><u>KARTU TIK ORGANISASI</u></h5>
            <h6 class="text-center">
                Nomor : {{ $data->nomor }}
            </h6>
        </div>

        <div class="container fs-6 text-sm py-1 px-5 mx-1">
            <div class="row">
                <div class="col-12">I. IDENTITAS</div>
                <div class="row col-12">
                    <div class="row">
                        <div class="col-6 px-4">1. &emsp; Nama Organisasi</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">2. &emsp; Akte Pendirian/ buku pendaftaran
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->akte }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">3. &emsp; Kedudukan / status
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->status }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">4. &emsp; Berdiri sejak</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->berdiri }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">5. &emsp; Domisili hukum / alamat</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->alamat }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">6. &emsp; Nomor Telepon</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->phone }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">7. &emsp; Website/ E-mail</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->web }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-4">8. &emsp; Pengurus</div>
                        <div class="col-1">:</div>
                        <div class="col-5"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5" style="position: relative;left: 8px">- Nama </div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->nama_pengurus }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5" style="position: relative;left: 8px">- Kedudukan</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->kedudukan_pengurus }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5" style="position: relative;left: 8px">- Periode tahun</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->periode_pengurus }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5" style="position: relative;left: 8px">- Alamat</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->alamat_pengurus }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5" style="position: relative;left: 8px">- Nomor Telepon/HP</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->hp_pengurus }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6">9. &emsp; Ruang lingkup kegiatan organisasi</div>
                        <div class="col-1">:</div>
                        <div class="col-5"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5">a. &emsp;Ke dalam</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->kegiatan_kedalam }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 px-5">b. &emsp;Ke Luar</div>
                        <div class="col-1">:</div>
                        <div class="col-5">{{ $data->kegiatan_keluar }}</div>
                    </div><br><br>
                    <div class="row">
                        <p>II. KEGIATAN ORGANISASI PENGURUS ORGANISASI YANG BERKAITAN DENGAN / PELANGGARAN HUKUM :
                        </p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $data->kegiatan }}</textarea>
                    </div>
                    <br />
                </div>
            </div>
            <br />
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>