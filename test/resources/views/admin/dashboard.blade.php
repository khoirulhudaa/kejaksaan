@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="section-body">
        <div class="card card-primary">  
            <div class="card-header">
                <h4>Data Kabupaten Nabire</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($nabire as $data )  
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $data->nik }}</td>
                              <td>{{ $data->nama }}</td>
                              <td>{{ $data->alamat }}</td>
                              <td>{{ $data->provinsi }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
      </div>
      <div class="section-body">
        <div class="card card-primary">  
            <div class="card-header">
                <h4>Data Kabupaten Dogiyai</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach ($dogiyai as $data )  
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $data->nik }}</td>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->alamat }}</td>
                          <td>{{ $data->provinsi }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
          </div>
      </div>
      <div class="section-body">
        <div class="card card-primary">  
            <div class="card-header">
                <h4>Data Kabupaten Deiyai</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach ($deiyai as $data )  
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $data->nik }}</td>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->alamat }}</td>
                          <td>{{ $data->provinsi }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
          </div>
      </div>
      <div class="section-body">
        <div class="card card-primary">  
            <div class="card-header">
                <h4>Data Kabupaten Paniai</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach ($paniai as $data )  
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $data->nik }}</td>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->alamat }}</td>
                          <td>{{ $data->provinsi }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
          </div>
      </div>
      <div class="section-body">
        <div class="card card-primary">  
            <div class="card-header">
                <h4>Data Kabupaten Intan Jaya</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach ($intan as $data )  
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $data->nik }}</td>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->alamat }}</td>
                          <td>{{ $data->provinsi }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
          </div>
      </div>
      <div class="section-body">
        <div class="card card-primary">  
            <div class="card-header">
                <h4>Data Kabupaten Mimika</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach ($mimika as $data )  
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $data->nik }}</td>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->alamat }}</td>
                          <td>{{ $data->provinsi }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
          </div>
      </div>
    </section>
  </div>
@endsection

@section('js')
    <script src="{{ asset('backend/modules/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('.myTable').DataTable();
      });
</script>
@endsection



