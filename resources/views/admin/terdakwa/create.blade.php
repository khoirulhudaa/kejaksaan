@extends('admin.layouts.master')
@section('title', 'Kartu TIK Tersangka/Terdakwa/Terpidana')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kartu TIK Tersangka/Terdakwa/Terpidana</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.terdakwa.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Kartu TIK Tersangka/Terdakwa/Terpidana
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.terdakwa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
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
                                                <label for="nama">Nama Lengkap <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="panggilan">Nama samaran / panggilan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('panggilan') is-invalid @enderror" name="panggilan" id="panggilan" value="{{ old('panggilan') }}" placeholder="Masukkan Nama samaran / panggilan">
                                                <div class="invalid-feedback" id="valid-panggilan">{{ $errors->first('panggilan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir">
                                                <div class="invalid-feedback" id="valid-tempat_lahir">{{ $errors->first('tempat_lahir') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                                <div class="invalid-feedback" id="valid-tanggal_lahir">{{ $errors->first('tanggal_lahir') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="select2 form-control form-control-sm @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback" id="valid-jenis_kelamin">{{ $errors->first('jenis_kelamin') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                                <select class="select2 form-control form-control-sm @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan">
                                                    <option value="" selected disabled>-- Pilih Kewarganegaraan --</option>
                                                        @foreach ($kewarganegaraans as $data)
                                                            <option value="{{ $data->id }}" {{ old('kewarganegaraan') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-kewarganegaraan">{{ $errors->first('kewarganegaraan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="bangsa">Suku Bangsa</label>
                                                <select class="select2 form-control form-control-sm @error('bangsa') is-invalid @enderror" name="bangsa" id="bangsa">
                                                    <option value="" selected disabled>-- Pilih Suku Bangsa --</option>
                                                        @foreach ($bangsa as $data)
                                                            <option value="{{ $data->id }}" {{ old('bangsa') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-bangsa">{{ $errors->first('bangsa') }}</div>
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
                                                <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                                                <div class="invalid-feedback" id="valid-alamat">{{ $errors->first('alamat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">No Handphone <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Masukkan no handphone">
                                                <div class="invalid-feedback" id="valid-phone">{{ $errors->first('phone') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pasport">No Pasport <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pasport') is-invalid @enderror" name="pasport" id="pasport" value="{{ old('pasport') }}" placeholder="Masukkan no pasport">
                                                <div class="invalid-feedback" id="valid-pasport">{{ $errors->first('pasport') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <select class="select2 form-control form-control-sm @error('agama') is-invalid @enderror" name="agama" id="agama">
                                                    <option value="" selected disabled>-- Pilih Agama --</option>
                                                        @foreach ($agama as $data)
                                                            <option value="{{ $data->id }}" {{ old('agama') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-agama">{{ $errors->first('agama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pendidikan">Pendidikan</label>
                                                <select class="select2 form-control form-control-sm @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan">
                                                    <option value="" selected disabled>-- Pilih Pendidikan --</option>
                                                        @foreach ($pendidikan as $data)
                                                            <option value="{{ $data->id }}" {{ old('pendidikan') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-pendidikan">{{ $errors->first('pendidikan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <select class="select2 form-control form-control-sm @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan">
                                                    <option value="" selected disabled>-- Pilih Pekerjaan --</option>
                                                        @foreach ($pekerjaan as $data)
                                                            <option value="{{ $data->id }}" {{ old('pekerjaan') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-pekerjaan">{{ $errors->first('pekerjaan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_kantor">Alamat Kantor<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor" id="alamat_kantor" value="{{ old('alamat_kantor') }}" placeholder="Masukkan alamat kantor">
                                                <div class="invalid-feedback" id="valid-alamat_kantor">{{ $errors->first('alamat_kantor') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="perkawinan">Status Perkawinan</label>
                                                <select class="select2 form-control form-control-sm @error('perkawinan') is-invalid @enderror" name="perkawinan" id="perkawinan">
                                                    <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
                                                        @foreach ($perkawinan as $data)
                                                            <option value="{{ $data->id }}" {{ old('perkawinan') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-perkawinan">{{ $errors->first('perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kepartaian">Kepartaian<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kepartaian') is-invalid @enderror" name="kepartaian" id="kepartaian" value="{{ old('kepartaian') }}" placeholder="Masukkan kepartaian">
                                                <div class="invalid-feedback" id="valid-kepartaian">{{ $errors->first('kepartaian') }}</div>
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
                        <div class="col-lg-8">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Riwayat Perkara</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kasus">Kasus posisi secara singkat / pasal yang dilanggar</label>
                                                <textarea class="form-control form-control-sm @error('kasus') is-invalid @enderror" name="kasus" id="kasus" placeholder="Masukkan Kasus posisi secara singkat / pasal yang dilanggar"></textarea>
                                                <div class="invalid-feedback" id="valid-kasus">{{ $errors->first('nama_istri') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="background">Latar belakang & akibat-akibat peristiwa/kerugian</label>
                                                <input type="text" class="form-control form-control-sm @error('background') is-invalid @enderror" name="background" id="background" value="{{ old('background') }}" placeholder="Masukkan Latar belakang & akibat-akibat peristiwa/kerugian">
                                                <div class="invalid-feedback" id="valid-background">{{ $errors->first('background') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>SP3/SKPP</label>
                                                <div class="row">
                                                    <div class="col-md-5 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm @error('no_skpp') is-invalid @enderror" name="no_skpp" id="no_skpp" value="{{ old('no_skpp') }}" placeholder="No">   
                                                        
                                                    </div>
                                                    <div class="col-md-7 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm @error('tgl_skpp') is-invalid @enderror" name="tgl_skpp" id="tgl_skpp" value="{{ old('tgl_skpp') }}"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="putusan_pengadilan_pn">Putusan Pengadilan (PN)</label>
                                                <input type="text" class="form-control form-control-sm @error('putusan_pengadilan_pn') is-invalid @enderror" name="putusan_pengadilan_pn" id="putusan_pengadilan_pn" value="{{ old('putusan_pengadilan_pn') }}" placeholder="Putusan Pengadilan (PN)">
                                                <div class="invalid-feedback" id="valid-putusan_pengadilan_pn">{{ $errors->first('putusan_pengadilan_pn') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="putusan_pengadilan_pt">Putusan Pengadilan (PT)</label>
                                                <input type="text" class="form-control form-control-sm @error('putusan_pengadilan_pt') is-invalid @enderror" name="putusan_pengadilan_pt" id="putusan_pengadilan_pt" value="{{ old('putusan_pengadilan_pt') }}" placeholder="Putusan Pengadilan (PT)">
                                                <div class="invalid-feedback" id="valid-putusan_pengadilan_pt">{{ $errors->first('putusan_pengadilan_pt') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="putusan_pengadilan_ma">Putusan Pengadilan (MA)</label>
                                                <input type="text" class="form-control form-control-sm @error('putusan_pengadilan_ma') is-invalid @enderror" name="putusan_pengadilan_ma" id="putusan_pengadilan_ma" value="{{ old('putusan_pengadilan_ma') }}" placeholder="Putusan Pengadilan (MA)">
                                                <div class="invalid-feedback" id="valid-putusan_pengadilan_ma">{{ $errors->first('putusan_pengadilan_ma') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_orangtua">Nama Orang tua / Alamat</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_orangtua') is-invalid @enderror" name="nama_orangtua" id="nama_orangtua" value="{{ old('nama_orangtua') }}" placeholder="Nama Orang tua / Alamat">
                                                <div class="invalid-feedback" id="valid-nama_orangtua">{{ $errors->first('nama_orangtua') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_kawan">Nama Kawan yang dikenal</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_kawan') is-invalid @enderror" name="nama_kawan" id="nama_kawan" value="{{ old('nama_kawan') }}" placeholder="Nama Kawan yang dikenal">
                                                <div class="invalid-feedback" id="valid-nama_kawan">{{ $errors->first('nama_kawan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="lain">Lain-lain</label>
                                                <input type="text" class="form-control form-control-sm @error('lain') is-invalid @enderror" name="lain" id="lain" value="{{ old('lain') }}" placeholder="Lain-lain">
                                                <div class="invalid-feedback" id="valid-lain">{{ $errors->first('lain') }}</div>
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

            $('body').on('change', '#kecamatan', function() {
                var value = $(this).val();
                if (value == 'Lainnya') {
                    $("#kecamatan_").attr("readonly", false); 
                } else {
                    $("#kecamatan_").attr("readonly", true); 
                }
            })

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
