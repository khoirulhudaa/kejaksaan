@extends('admin.layouts.master')
@section('title', 'Tindak Pidana Narkotika')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Tindak Pidana Narkotika</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.narkotika.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Tindak Pidana Narkotika
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.narkotika.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Tindak Pidana Narkotika</h4>
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
                                                <label for="biodata">Identitas Terdakwa</label>
                                                <select class="select2 form-control form-control-sm @error('biodata') is-invalid @enderror" name="biodata" id="biodata">
                                                    <option value="" selected disabled>-- Pilih Terdakwa --</option>
                                                        @foreach ($biodata as $data)
                                                            <option value="{{ $data->id }}" {{ old('biodata') == $data->id ? 'selected' : '' }}>{{ $data->nama }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-biodata">{{ $errors->first('biodata') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" class="form-control form-control-sm" id="x" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan">Locus</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                        @foreach ($kecamatan as $data)
                                                            <option value="{{ $data->id }}" {{ old('kecamatan') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-kecamatan">{{ $errors->first('kecamatan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="locus">Tempus <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('locus') is-invalid @enderror" name="locus" id="locus" value="{{ old('locus') }}" placeholder="Masukkan Locus dan Tempus">
                                                <div class="invalid-feedback" id="valid-locus">{{ $errors->first('locus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pasal">Pasal yang dilanggar <sup class="text-danger">*</sup></label>
                                                <textarea class="form-control form-control-sm @error('pasal') is-invalid @enderror" name="pasal" id="pasal" placeholder="Masukkan Pasal yang dilanggar"></textarea>
                                                <div class="invalid-feedback" id="valid-pasal">{{ $errors->first('pasal') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label>Pra Penuntutan</label>
                                                        <input type="date" class="form-control form-control-sm" name="tgl_surat_pra_penuntutan" id="tgl_surat_pra_penuntutan" value="{{ old('tgl_surat_pra_penuntutan') }}">   
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm" name="nomor_surat_pra_penuntutan" id="nomor_surat_pra_penuntutan" value="{{ old('nomor_surat_pra_penuntutan') }}" placeholder="Masukkan Nomor Surat Pra Penuntutan">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label>Penuntutan</label>
                                                        <input type="date" class="form-control form-control-sm" name="tgl_surat_penuntutan" id="tgl_surat_penuntutan" value="{{ old('tgl_surat_penuntutan') }}"> 
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm" name="nomor_surat_penuntutan" id="nomor_surat_penuntutan" value="{{ old('nomor_surat_penuntutan') }}" placeholder="Masukkan Nomor Surat Penuntutan"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="eksekusi">Eksekusi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('eksekusi') is-invalid @enderror" name="eksekusi" id="eksekusi" value="{{ old('eksekusi') }}" placeholder="Masukkan Eksekusi">
                                                <div class="invalid-feedback" id="valid-eksekusi">{{ $errors->first('eksekusi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="upaya">Upaya Hukum <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('upaya') is-invalid @enderror" name="upaya" id="upaya" value="{{ old('upaya') }}" placeholder="Masukkan Upaya Hukum">
                                                <div class="invalid-feedback" id="valid-upaya">{{ $errors->first('upaya') }}</div>
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

            $('body').on('change', '#biodata', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.wni.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('#x').val(data[0].kecamatan);
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
