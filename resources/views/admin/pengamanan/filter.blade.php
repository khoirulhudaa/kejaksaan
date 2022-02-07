@extends('admin.layouts.master')
@section('title', 'Pengamanan Sumber Daya Organisasi')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengamanan Sumber Daya Organisasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-file-pdf"></i>
                        Pengamanan Sumber Daya Organisasi
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-success">  
                    <div class="card-body">
                        <form action="{{ route('admin.pengamanan.download') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <select class="select2 form-control form-control-sm @error('bulan') is-invalid @enderror" name="bulan" id="bulan">
                                            <option value="" selected disabled>-- Pilih Bulan --</option>
                                            <option value="JANUARI">Januari</option>
                                            <option value="FEBRUARI">Februari</option>
                                            <option value="MARET">Maret</option>
                                            <option value="APRIL">April</option>
                                            <option value="MEI">Mei</option>
                                            <option value="JUNI">Juni</option>
                                            <option value="JULI">Juli</option>
                                            <option value="AGUSTUS">Agustus</option>
                                            <option value="SEPTEMBER">September</option>
                                            <option value="OKTOBER">Oktober</option>
                                            <option value="NOVEMBER">November</option>
                                            <option value="DESEMBER">Desember</option>
                                        </select>
                                        <div class="invalid-feedback" id="valid-bulan">{{ $errors->first('bulan') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="select2 form-control form-control-sm @error('tahun') is-invalid @enderror" name="tahun" id="tahun">
                                            <option value="" selected disabled>-- Pilih Tahun --</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                        <div class="invalid-feedback" id="valid-tahun">{{ $errors->first('tahun') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="atas_nama">Atas Nama</label>
                                        <input type="text" class="form-control form-control-sm @error('atas_nama') is-invalid @enderror" name="atas_nama" id="atas_nama" value="{{ old('atas_nama') }}">
                                        <div class="invalid-feedback" id="valid-atas_nama">{{ $errors->first('atas_nama') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control form-control-sm @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ old('jabatan') }}">
                                        <div class="invalid-feedback" id="valid-jabatan">{{ $errors->first('jabatan') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
                                        <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control form-control-sm @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip') }}">
                                        <div class="invalid-feedback" id="valid-nip">{{ $errors->first('nip') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-success btn-round" id="btn-submit">
                                        <i class="fas fa-check"></i>
                                        Download 
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

