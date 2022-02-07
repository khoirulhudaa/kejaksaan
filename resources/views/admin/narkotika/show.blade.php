
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

    <title>PIDANA NARKOTIKA</title>
</head>

<body  >
    <section class="sheet padding-10mm">
        <p>KEJAKSAAN NEGERI PAGAR ALAM</p>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 30px;">D.IN.12</span></u> <br />
        <br>
        <h4 class="text-center">LAPORAN PERKARA TINDAK PIDANA NARKOTIKA</h4>
        <h5 class="text-center">Bulan {{ $month }} Tahun {{ $year }}</h5>
        <br />
        <div class="table-responsive">
            <table class="table table-sm table-bordered" id="report">
                <thead class="table">
                    <tr height="50px" class="text-center text-wrap" style="width: 8rem">
                        <th scope="col">No</th>
                        <th scope="col">IDENTITAS TERDAKWA</th>
                        <th scope="col">PASAL YANG DILANGGAR</th>
                        <th scope="col">PRA PENUNTUTAN</th>
                        <th scope="col">PENUNTUTAN</th>
                        <th scope="col">EKSEKUSI</th>
                        <th scope="col">UPAYA HUKUM</th>
                        <th scope="col">KETERANGAN</th>
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
                    </tr>
                </thead>
                @if (count($data) > 0)
                    @php
                        $no = 1;
                    @endphp
                    @foreach($data as $item)
                    <tbody>
                        <tr height="40px" align="center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->biodata->nama }}</td>
                            <td>{{ $item->pasal }}</td>
                            <td>{{ $item->nomor_surat_pra_penuntutan }} / {{ $item->tgl_surat_pra_penuntutan }}</td>
                            <td>{{ $item->nomor_surat_penuntutan }} / {{ $item->tgl_surat_penuntutan }}</td>
                            <td>{{ $item->eksekusi }}</td>
                            <td>{{ $item->upaya }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                @else
                    <tbody>
                        <tr style="height: 60px;text-align: center; vertical-align: middle">
                            <td colspan="12">N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L</td>
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