@extends('admin.layouts.master')
@section('title', 'Sumber Daya Kejaksaan')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Sumber Daya Kejaksaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.pencegahan.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Sumber Daya Kejaksaan
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.pengamanan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Sumber Daya Kejaksaan</h4>
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
                                                <label for="sumber_informasi">Sumber Informasi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('sumber_informasi') is-invalid @enderror" name="sumber_informasi" id="sumber_informasi" value="{{ old('sumber_informasi') }}" placeholder="Masukkan Sumber Informasi">
                                                <div class="invalid-feedback" id="valid-sumber_informasi">{{ $errors->first('sumber_informasi') }}</div>
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
                                            <div class="form-group">
                                                <label for="isi_informasi">Isi Informasi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('isi_informasi') is-invalid @enderror" name="isi_informasi" id="isi_informasi" value="{{ old('isi_informasi') }}" placeholder="Masukkan Isi Informasi">
                                                <div class="invalid-feedback" id="valid-isi_informasi">{{ $errors->first('isi_informasi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Opsin</label>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('opsin_lid') is-invalid @enderror" name="opsin_lid" id="opsin_lid" value="{{ old('opsin_lid') }}" placeholder="Opsin LID">   
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('opsin_pam') is-invalid @enderror" name="opsin_pam" id="opsin_pam" value="{{ old('opsin_pam') }}" placeholder="Opsin PAM"> 
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('opsin_gal') is-invalid @enderror" name="opsin_gal" id="opsin_gal" value="{{ old('opsin_gal') }}" placeholder="Opsin GAL">  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Surat Perintah</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('nomor_surat') is-invalid @enderror" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Nomor Surat">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm @error('tgl_surat') is-invalid @enderror" name="tgl_surat" id="tgl_surat" value="{{ old('tgl_surat') }}"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="hasil">Hasil Kegiatan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('hasil') is-invalid @enderror" name="hasil" id="hasil" value="{{ old('hasil') }}" placeholder="Masukkan Hasil Kegiatan">
                                                <div class="invalid-feedback" id="valid-hasil">{{ $errors->first('hasil') }}</div>
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
