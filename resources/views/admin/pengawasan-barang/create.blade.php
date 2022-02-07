@extends('admin.layouts.master')
@section('title', 'Pengawasan Barang Cetakan')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pengawasan Barang Cetakan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.pengawasan_barang.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Pengawasan Barang Cetakan
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.pengawasan_barang.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Pengawasan Barang Cetakan</h4>
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
                                                <label for="barang">Barang Cetakan</label>
                                                <select class="select2 form-control form-control-sm @error('barang') is-invalid @enderror" name="barang" id="barang">
                                                    <option value="" selected disabled>-- Pilih Barang Cetakan --</option>
                                                        @foreach ($barang as $data)
                                                            <option value="{{ $data->id }}" {{ old('barang') == $data->id ? 'selected' : '' }}>{{ $data->nama }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-kecamatan_id">{{ $errors->first('kecamatan_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan_id">Kecamatan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id" id="kecamatan_id" value="{{ old('kecamatan_id') }}" readonly>
                                                <div class="invalid-feedback" id="valid-kecamatan_id">{{ $errors->first('kecamatan_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tgl_penerbitan">Tanggal Penerbitan <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tgl_penerbitan') is-invalid @enderror" name="tgl_penerbitan" id="tgl_penerbitan" value="{{ old('tgl_penerbitan') }}">
                                                <div class="invalid-feedback" id="valid-tgl_penerbitan">{{ $errors->first('tgl_penerbitan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="penulis">Penulis atau Penerbit <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('penulis') is-invalid @enderror" name="penulis" id="penulis" value="{{ old('penulis') }}" placeholder="Masukkan Penulis atau Penerbit">
                                                <div class="invalid-feedback" id="valid-penulis">{{ $errors->first('penulis') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="judul">Judul dan Isi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul dan Isi">
                                                <div class="invalid-feedback" id="valid-judul">{{ $errors->first('judul') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="hasil">Hasil Penelitian <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('hasil') is-invalid @enderror" name="hasil" id="hasil" value="{{ old('hasil') }}" placeholder="Masukkan Hasil Penelitian">
                                                <div class="invalid-feedback" id="valid-hasil">{{ $errors->first('hasil') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindak_lanjut">Tindak Lanjut <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tindak_lanjut') is-invalid @enderror" name="tindak_lanjut" id="tindak_lanjut" value="{{ old('tindak_lanjut') }}" placeholder="Masukkan Tindak Lanjut">
                                                <div class="invalid-feedback" id="valid-tindak_lanjut">{{ $errors->first('tindak_lanjut') }}</div>
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

            $('body').on('change', '#barang', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.barang.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('#kecamatan_id').val(data[0].kecamatan);
                        $('#penulis').val(data[0].penerbit);
                    },
                    error: function(data) {
                        console.log(data)
                    }
                });
            })

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection
