@extends('admin.layouts.master')
@section('title', 'Kartu TIK Organisasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kartu TIK Organisasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.wni.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Kartu TIK Organisasi
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.organisasi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Identitas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nomor">Nomor <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nomor') is-invalid @enderror" name="nomor" id="nomor" value="{{ old('nomor') }}" placeholder="Masukkan Nomor">
                                                <div class="invalid-feedback" id="valid-nomor">{{ $errors->first('nomor') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Organisasi<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Organisasi">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="akte">Akte Pendirian / Bukti Pendaftaran <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('akte') is-invalid @enderror" name="akte" id="akte" value="{{ old('akte') }}" placeholder="Masukkan Akte Pendirian / Bukti Pendaftaran">
                                                <div class="invalid-feedback" id="valid-akte">{{ $errors->first('akte') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="status">Kedudukan / Status <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" id="status" value="{{ old('status') }}" placeholder="Masukkan Kedudukan / Status">
                                                <div class="invalid-feedback" id="valid-status">{{ $errors->first('status') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="berdiri">Berdiri Sejak <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('berdiri') is-invalid @enderror" name="berdiri" id="berdiri" value="{{ old('berdiri') }}">
                                                <div class="invalid-feedback" id="valid-berdiri">{{ $errors->first('berdiri') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat">Domisili Hukum / Alamat <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Domisili Hukum / Alamat">
                                                <div class="invalid-feedback" id="valid-alamat">{{ $errors->first('alamat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">Nomor Telepon <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Masukkan Nomor Telepon">
                                                <div class="invalid-feedback" id="valid-phone">{{ $errors->first('phone') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="web">Website / Email <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('web') is-invalid @enderror" name="web" id="web" value="{{ old('web') }}" placeholder="Masukkan Website / Email">
                                                <div class="invalid-feedback" id="valid-web">{{ $errors->first('web') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_pengurus">Nama (Pengurus) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama_pengurus') is-invalid @enderror" name="nama_pengurus" id="nama_pengurus" value="{{ old('nama_pengurus') }}" placeholder="Masukkan Nama (Pengurus)">
                                                <div class="invalid-feedback" id="valid-nama_pengurus">{{ $errors->first('nama_pengurus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kedudukan_pengurus">Kedudukan (Pengurus) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kedudukan_pengurus') is-invalid @enderror" name="kedudukan_pengurus" id="kedudukan_pengurus" value="{{ old('kedudukan_pengurus') }}" placeholder="Masukkan Kedudukan (Pengurus)">
                                                <div class="invalid-feedback" id="valid-kedudukan_pengurus">{{ $errors->first('kedudukan_pengurus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="periode_pengurus">Periode tahun (Pengurus) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('periode_pengurus') is-invalid @enderror" name="periode_pengurus" id="periode_pengurus" value="{{ old('periode_pengurus') }}" placeholder="Masukkan Periode tahun (Pengurus)">
                                                <div class="invalid-feedback" id="valid-periode_pengurus">{{ $errors->first('periode_pengurus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_pengurus">Alamat (Pengurus) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_pengurus') is-invalid @enderror" name="alamat_pengurus" id="alamat_pengurus" value="{{ old('alamat_pengurus') }}" placeholder="Masukkan Alamat (Pengurus)">
                                                <div class="invalid-feedback" id="valid-alamat_pengurus">{{ $errors->first('alamat_pengurus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="hp_pengurus">Nomor Telepon / HP (Pengurus) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('hp_pengurus') is-invalid @enderror" name="hp_pengurus" id="hp_pengurus" value="{{ old('hp_pengurus') }}" placeholder="Masukkan Nomor Telepon / HP (Pengurus)">
                                                <div class="invalid-feedback" id="valid-hp_pengurus">{{ $errors->first('hp_pengurus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kegiatan_kedalam">Kedalam (Ruang lingkup kegiatan organisasi) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kegiatan_kedalam') is-invalid @enderror" name="kegiatan_kedalam" id="kegiatan_kedalam" value="{{ old('kegiatan_kedalam') }}" placeholder="Masukkan Kedalam (Ruang lingkup kegiatan organisasi)">
                                                <div class="invalid-feedback" id="valid-kegiatan_kedalam">{{ $errors->first('kegiatan_kedalam') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kegiatan_keluar">Keluar (Ruang lingkup kegiatan organisasi) <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kegiatan_keluar') is-invalid @enderror" name="kegiatan_keluar" id="kegiatan_keluar" value="{{ old('kegiatan_keluar') }}" placeholder="Masukkan Keluar (Ruang lingkup kegiatan organisasi)">
                                                <div class="invalid-feedback" id="valid-kegiatan_keluar">{{ $errors->first('kegiatan_keluar') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="photo">Foto <sup class="text-danger">*</sup></label>
                                                <input type="file" class="form-control form-control-sm @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ old('photo') }}">
                                                <div class="invalid-feedback" id="valid-photo">{{ $errors->first('photo') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">KEGIATAN ORGANISASI / PENGURUS ORGANISASI YANG BERKAITAN DENGAN PELANGGARAN HUKUM :</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control form-control-sm @error('kegiatan') is-invalid @enderror" name="kegiatan" id="kegiatan" placeholder="Masukkan KEGIATAN ORGANISASI"></textarea>
                                                <div class="invalid-feedback" id="valid-kegiatan">{{ $errors->first('kegiatan') }}</div>
                                            </div>
                                        </div>
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

            function filePreview2(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photo + img').remove();
                        $('#photo').after('<br><img src="' + e.target.result + '" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            }

            $('#photo').change(function() {
                filePreview2(this);
                $('#valid-photo').html('');
            });

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection
