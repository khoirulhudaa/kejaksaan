<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />
    <style>
        @page {
            size: legal landscape;
        }
    </style>

    <title>LAPORAN PERKARA TINDAK PIDANA KORUPSI</title>
</head>

<body  >
    <section class="sheet padding-10mm">
        <p>KEJAKSAAN NEGERI PAGAR ALAM</p>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 30px;">D.IN.12</span></u> <br />
        <br>
        <h4 class="text-center">LAPORAN PERKARA TINDAK PIDANA KORUPSI</h4>
        <h5 class="text-center">Bulan {{ $month }} Tahun {{ $year }}</h5>
        <br />

        <div class="table-responsive">
            <table class="table table-sm table-bordered" id="report">
                <thead class="table">
                    <tr class="text-center text-wrap" style="width: 8rem">
                        <th rowspan="2">No</th>
                        <th rowspan="2">IDENTITAS TERDAKWA</th>
                        <th rowspan="2">PASAL YANG DILANGGAR</th>
                        <th rowspan="2">PENYELIDIKAN</th>
                        <th colspan="2">PENYIDIKAN</th>
                        <th rowspan="2">PENUNTUTAN</th>
                        <th rowspan="2">EKSEKUSI</th>
                        <th rowspan="2">UPAYA HUKUM</th>
                        <th rowspan="2">KETERANGAN</th>
                    </tr>
                    <tr>
                        <th>KEJAKSAAN</th>
                        <th>POLRI</th>
                    </tr>
                    <tr height="5px" class="fs-6 text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                </thead>
                @if (count($data) > 0)
                    @php $no = 1; @endphp
                    @foreach($data as $item)
                        <tbody>
                            <tr height="50px" align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->biodata->nama }}</td>
                                <td>{{ $item->pasal }}</td>
                                <td>{{ $item->penyelidikan }}</td>
                                <td>{{ $item->tgl_surat_kejaksaan }}/{{ $item->nomor_surat_kejaksaan }}</td>
                                <td>{{ $item->tgl_surat_polri }}/{{ $item->nomor_surat_polri }}</td>
                                <td>{{ $item->penuntutan }}</td>
                                <td>{{ $item->eksekusi }}</td>
                                <td>{{ $item->upaya }}</td>
                                <td>{{ $item->keterangan }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                @else
                    <tbody>
                        <tr style="height: 60px;text-align: center; vertical-align: middle">
                            <td colspan="12" style="font-size: 38px;font-weight: bold;">N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>