@extends('admin.layouts.master')
@section('title', 'Pencegahan Konflik Sosial')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pencegahan Konflik Sosial</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.konflik.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Pencegahan Konflik Sosial
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.konflik.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Pencegahan Konflik Sosial</h4>
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
                                                <label for="direktorat">Direktorat / Kejati / Kejari / Cabjari <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('direktorat') is-invalid @enderror" name="direktorat" id="direktorat" value="{{ old('direktorat') }}" placeholder="Masukkan Direktorat / Kejati / Kejari / Cabjari">
                                                <div class="invalid-feedback" id="valid-direktorat">{{ $errors->first('direktorat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jenis_masalah">Jenis Masalah <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('jenis_masalah') is-invalid @enderror" name="jenis_masalah" id="jenis_masalah" value="{{ old('jenis_masalah') }}" placeholder="Masukkan Jenis Masalah">
                                                <div class="invalid-feedback" id="valid-jenis_masalah">{{ $errors->first('jenis_masalah') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pokok_permasalahan">Pokok Permasalahan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pokok_permasalahan') is-invalid @enderror" name="pokok_permasalahan" id="pokok_permasalahan" value="{{ old('pokok_permasalahan') }}" placeholder="Masukkan Pokok Permasalahan">
                                                <div class="invalid-feedback" id="valid-pokok_permasalahan">{{ $errors->first('pokok_permasalahan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="sumber_informasi">Sumber Informasi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('sumber_informasi') is-invalid @enderror" name="sumber_informasi" id="sumber_informasi" value="{{ old('sumber_informasi') }}" placeholder="Masukkan Sumber Informasi">
                                                <div class="invalid-feedback" id="valid-sumber_informasi">{{ $errors->first('sumber_informasi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="info">Informasi yang diperoleh <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('info') is-invalid @enderror" name="info" id="info" value="{{ old('info') }}" placeholder="Masukkan Informasi yang diperoleh">
                                                <div class="invalid-feedback" id="valid-info">{{ $errors->first('info') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="perkembangan">Trend Perkembangan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('perkembangan') is-invalid @enderror" name="perkembangan" id="perkembangan" value="{{ old('perkembangan') }}" placeholder="Masukkan Trend Perkembangan">
                                                <div class="invalid-feedback" id="valid-perkembangan">{{ $errors->first('perkembangan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="penyelesaian">Penyelesaian <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('penyelesaian') is-invalid @enderror" name="penyelesaian" id="penyelesaian" value="{{ old('penyelesaian') }}" placeholder="Masukkan Penyelesaian">
                                                <div class="invalid-feedback" id="valid-penyelesaian">{{ $errors->first('penyelesaian') }}</div>
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
