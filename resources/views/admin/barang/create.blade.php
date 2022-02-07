@extends('admin.layouts.master')
@section('title', 'Kartu TIK Barang Cetakan')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kartu TIK Barang Cetakan</h1>
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
                            Kartu TIK Barang Cetakan
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.barang.store') }}" enctype="multipart/form-data">
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
                                                <label for="nama">Nama Barang Cetakan<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama barang cetakan">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('penerbit') is-invalid @enderror" name="penerbit" id="penerbit" value="{{ old('penerbit') }}" placeholder="Masukkan penerbit">
                                                <div class="invalid-feedback" id="valid-penerbit">{{ $errors->first('penerbit') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pengarang">Pengarang / Penanggung Jawab <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pengarang') is-invalid @enderror" name="pengarang" id="pengarang" value="{{ old('pengarang') }}" placeholder="Masukkan pengarang">
                                                <div class="invalid-feedback" id="valid-pengarang">{{ $errors->first('pengarang') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="waktu">Waktu peredaran <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('waktu') is-invalid @enderror" name="waktu" id="waktu" value="{{ old('waktu') }}">
                                                <div class="invalid-feedback" id="valid-waktu">{{ $errors->first('waktu') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="daerah">Daerah Peredaran <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('daerah') is-invalid @enderror" name="daerah" id="daerah" value="{{ old('daerah') }}" placeholder="Masukkan daerah peredaran">
                                                <div class="invalid-feedback" id="valid-daerah">{{ $errors->first('daerah') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pencetak">Pencetak <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pencetak') is-invalid @enderror" name="pencetak" id="pencetak" value="{{ old('pencetak') }}" placeholder="Masukkan pencetak">
                                                <div class="invalid-feedback" id="valid-pencetak">{{ $errors->first('pencetak') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_pimpinan">Nama Pimpinan Redaksi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama_pimpinan') is-invalid @enderror" name="nama_pimpinan" id="nama_pimpinan" value="{{ old('nama_pimpinan') }}" placeholder="Masukkan nama pimpinan redaksi">
                                                <div class="invalid-feedback" id="valid-nama_pimpinan">{{ $errors->first('nama_pimpinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_penerbit">Alamat Penerbit <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_penerbit') is-invalid @enderror" name="alamat_penerbit" id="alamat_penerbit" value="{{ old('alamat_penerbit') }}" placeholder="Masukkan alamat penerbit">
                                                <div class="invalid-feedback" id="valid-alamat_penerbit">{{ $errors->first('alamat_penerbit') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_percetakan">Alamat Percetakan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_percetakan') is-invalid @enderror" name="alamat_percetakan" id="alamat_percetakan" value="{{ old('alamat_percetakan') }}" placeholder="Masukkan alamat percetakan">
                                                <div class="invalid-feedback" id="valid-alamat_percetakan">{{ $errors->first('alamat_percetakan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jumlah_oplah">Jumlah Oplah <sup class="text-danger">*</sup></label>
                                                <input type="number" class="form-control form-control-sm @error('jumlah_oplah') is-invalid @enderror" name="jumlah_oplah" id="jumlah_oplah" value="{{ old('jumlah_oplah') }}" placeholder="Masukkan jumlah oplah">
                                                <div class="invalid-feedback" id="valid-jumlah_oplah">{{ $errors->first('jumlah_oplah') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                        @foreach ($kecamatan as $data)
                                                            <option value="{{ $data->name }}" {{ old('kecamatan') == $data->name ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                        <option value="Lainnya">Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback" id="valid-kecamatan">{{ $errors->first('kecamatan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan (Optional)</label>
                                                <input type="text" class="form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan_" id="kecamatan_" value="{{ old('kecamatan') }}" placeholder="Masukkan kecamatan" readonly>
                                                <small>Kosongkan jika tidak diperlukan</small>
                                                <div class="invalid-feedback" id="valid-kecamatan">{{ $errors->first('kecamatan') }}</div>
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
                                    <h4 class="card-title">Biografi Intelijen</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kasus">Kasus / Masalah yang terjadi</label>
                                                <input type="text" class="form-control form-control-sm @error('kasus') is-invalid @enderror" name="kasus" id="kasus" value="{{ old('kasus') }}" placeholder="Masukkan Kasus / Masalah yang terjadi">
                                                <div class="invalid-feedback" id="valid-kasus">{{ $errors->first('kasus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="background">Latar Belakang dan akibatnya</label>
                                                <input type="text" class="form-control form-control-sm @error('background') is-invalid @enderror" name="background" id="background" value="{{ old('background') }}" placeholder="Masukkan Latar Belakang dan akibatnya">
                                                <div class="invalid-feedback" id="valid-background">{{ $errors->first('background') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan">Tindakan yang dilakukan oleh</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan') is-invalid @enderror" name="tindakan" id="tindakan" value="{{ old('tindakan') }}" placeholder="Tindakan yang dilakukan oleh">
                                                <div class="invalid-feedback" id="valid-tindakan">{{ $errors->first('tindakan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan_kejaksaan">Tindakan Kejaksaan</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan_kejaksaan') is-invalid @enderror" name="tindakan_kejaksaan" id="tindakan_kejaksaan" value="{{ old('tindakan_kejaksaan') }}" placeholder="Tindakan Kejaksaan">
                                                <div class="invalid-feedback" id="valid-tindakan_kejaksaan">{{ $errors->first('tindakan_kejaksaan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan_kepolisian">Tindakan Kepolisian</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan_kepolisian') is-invalid @enderror" name="tindakan_kepolisian" id="tindakan_kepolisian" value="{{ old('tindakan_kepolisian') }}" placeholder="Tindakan Kepolisian">
                                                <div class="invalid-feedback" id="valid-tindakan_kepolisian">{{ $errors->first('tindakan_kepolisian') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan_pengadilan">Tindakan Pengadilan</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan_pengadilan') is-invalid @enderror" name="tindakan_pengadilan" id="tindakan_pengadilan" value="{{ old('tindakan_pengadilan') }}" placeholder="Tindakan Pengadilan">
                                                <div class="invalid-feedback" id="valid-tindakan_pengadilan">{{ $errors->first('tindakan_pengadilan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan lain-lain</label>
                                                <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" placeholder="Keterangan lain-lain">
                                                <div class="invalid-feedback" id="valid-keterangan">{{ $errors->first('keterangan') }}</div>
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

            $('body').on('change', '#kecamatan', function() {
                var value = $(this).val();
                if (value == 'Lainnya') {
                    $("#kecamatan_").attr("readonly", false); 
                } else {
                    $("#kecamatan_").attr("readonly", true); 
                }
            })

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
