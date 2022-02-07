@extends('admin.layouts.master')
@section('title', 'Pengobatan Tradisional')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pengobatan Tradisional</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.pengobatan.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Pengobatan Tradisional
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.pengobatan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Pengobatan Tradisional</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tgl">Tanggal <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="{{ old('tgl') }}">
                                                <div class="invalid-feedback" id="valid-tgl">{{ $errors->first('tgl') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_klinik">Nama Klinik <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama_klinik') is-invalid @enderror" name="nama_klinik" id="nama_klinik" value="{{ old('nama_klinik') }}" placeholder="Masukkan Nama Klinik">
                                                <div class="invalid-feedback" id="valid-nama_klinik">{{ $errors->first('nama_klinik') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat Klinik <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}">
                                                <div class="invalid-feedback" id="valid-alamat">{{ $errors->first('alamat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="identitas">Identitas Lengkap <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('identitas') is-invalid @enderror" name="identitas" id="identitas" value="{{ old('identitas') }}" placeholder="Masukkan Identitas Lengkap">
                                                <div class="invalid-feedback" id="valid-identitas">{{ $errors->first('identitas') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jumlah_pembantu">Jumlah Pembantu <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('jumlah_pembantu') is-invalid @enderror" name="jumlah_pembantu" id="jumlah_pembantu" value="{{ old('jumlah_pembantu') }}" placeholder="Masukkan Jumlah Pembantu">
                                                <div class="invalid-feedback" id="valid-jumlah_pembantu">{{ $errors->first('jumlah_pembantu') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="sumber_informasi">Sumber Informasi dan Media yang digunakan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('sumber_informasi') is-invalid @enderror" name="sumber_informasi" id="sumber_informasi" value="{{ old('sumber_informasi') }}" placeholder="Masukkan Sumber Informasi dan Media yang digunakan">
                                                <div class="invalid-feedback" id="valid-sumber_informasi">{{ $errors->first('sumber_informasi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Kegiatan Pengobatan</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('asal_mula') is-invalid @enderror" name="asal_mula" id="asal_mula" value="{{ old('asal_mula') }}" placeholder="Asal Mula Penemuan Pengobatan">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('cara') is-invalid @enderror" name="cara" id="cara" value="{{ old('cara') }}" placeholder="Cara Pengobatan"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Ijin Dinas Kesehatan</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('nomor_ijin') is-invalid @enderror" name="nomor_ijin" id="nomor_ijin" value="{{ old('nomor_ijin') }}" placeholder="Nomor">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm @error('tgl_ijin') is-invalid @enderror" name="tgl_ijin" id="tgl_ijin" value="{{ old('tgl_ijin') }}"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan">
                                                <div class="invalid-feedback" id="valid-keterangan">{{ $errors->first('keterangan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan_id">Kecamatan</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id" id="kecamatan_id">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                        @foreach ($kecamatan as $data)
                                                            <option value="{{ $data->id }}" {{ old('kecamatan_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-kecamatan_id">{{ $errors->first('kecamatan_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-success btn-round float-right" id="btn-submit">
                                                <i class="fas fa-check"></i>
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('backend/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.select2').on('select2:selecting', function() {
                $(this).removeClass('is-invalid');
            });

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection
