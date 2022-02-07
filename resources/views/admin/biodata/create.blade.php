@extends('admin.layouts.master')
@section('title', 'Kartu TIK Biodata')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kartu TIK Biodata</h1>
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
                            Kartu TIK Biodata
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Tambah Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.biodata.store') }}" enctype="multipart/form-data">
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
                                                <label for="nik">NIK <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK" maxlength="16">
                                                <div class="invalid-feedback" id="valid-nik">{{ $errors->first('nik') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
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
                                                <label for="legitimasi_perkawinan">Legitimasi Perkawinan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('legitimasi_perkawinan') is-invalid @enderror" name="legitimasi_perkawinan" id="legitimasi_perkawinan" value="{{ old('legitimasi_perkawinan') }}" placeholder="Masukkan legitimasi perkawinan">
                                                <div class="invalid-feedback" id="valid-legitimasi_perkawinan">{{ $errors->first('legitimasi_perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tempat_perkawinan">Tempat Perkawinan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tempat_perkawinan') is-invalid @enderror" name="tempat_perkawinan" id="tempat_perkawinan" value="{{ old('tempat_perkawinan') }}" placeholder="Masukkan tempat perkawinan">
                                                <div class="invalid-feedback" id="valid-tempat_perkawinan">{{ $errors->first('tempat_perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tanggal_perkawinan">Tanggal Perkawinan <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tanggal_perkawinan') is-invalid @enderror" name="tanggal_perkawinan" id="tanggal_perkawinan" value="{{ old('tanggal_perkawinan') }}">
                                                <div class="invalid-feedback" id="valid-tanggal_perkawinan">{{ $errors->first('tanggal_perkawinan') }}</div>
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
                                    <h4 class="card-title">Biografi Intelijen</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Riwayat hidup singkat</label>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('riwayat_pekerjaan') is-invalid @enderror" name="riwayat_pekerjaan" id="riwayat_pekerjaan" value="{{ old('riwayat_pekerjaan') }}" placeholder="Pekerjaan">   
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('riwayat_pendidikan') is-invalid @enderror" name="riwayat_pendidikan" id="riwayat_pendidikan" value="{{ old('riwayat_pendidikan') }}" placeholder="Pendidikan"> 
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('riwayat_kepartaian') is-invalid @enderror" name="riwayat_kepartaian" id="riwayat_kepartaian" value="{{ old('riwayat_kepartaian') }}" placeholder="Kepartaian">  
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('riwayat_ormas') is-invalid @enderror" name="riwayat_ormas" id="riwayat_ormas" value="{{ old('riwayat_ormas') }}" placeholder="Ormas Lainnya">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_istri">Nama Istri/Suami</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_istri') is-invalid @enderror" name="nama_istri" id="nama_istri" value="{{ old('nama_istri') }}" placeholder="Masukkan Nama Istri atau Suami">
                                                <div class="invalid-feedback" id="valid-nama_istri">{{ $errors->first('nama_istri') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_anak">Nama Anak</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_anak') is-invalid @enderror" name="nama_anak" id="nama_anak" value="{{ old('nama_anak') }}" placeholder="Masukkan Nama Anak">
                                                <div class="invalid-feedback" id="valid-nama_anak">{{ $errors->first('nama_anak') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_saudara">Nama Saudara Kandung</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_saudara') is-invalid @enderror" name="nama_saudara" id="nama_saudara" value="{{ old('nama_saudara') }}" placeholder="Nama Saudra Kandung">
                                                <div class="invalid-feedback" id="valid-nama_saudara">{{ $errors->first('nama_saudara') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_ayah_kandung">Nama Ayah Kandung</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_ayah_kandung') is-invalid @enderror" name="nama_ayah_kandung" id="nama_ayah_kandung" value="{{ old('nama_ayah_kandung') }}" placeholder="Nama Ayah Kandung">
                                                <div class="invalid-feedback" id="valid-nama_ayah_kandung">{{ $errors->first('nama_ayah_kandung') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_ayah_kandung">Alamat Ayah Kandung</label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_ayah_kandung') is-invalid @enderror" name="alamat_ayah_kandung" id="alamat_ayah_kandung" value="{{ old('alamat_ayah_kandung') }}" placeholder="Alamat Ayah Kandung">
                                                <div class="invalid-feedback" id="valid-alamat_ayah_kandung">{{ $errors->first('alamat_ayah_kandung') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_ibu_kandung') is-invalid @enderror" name="nama_ibu_kandung" id="nama_ibu_kandung" value="{{ old('nama_ibu_kandung') }}" placeholder="Nama Ibu Kandung">
                                                <div class="invalid-feedback" id="valid-nama_ibu_kandung">{{ $errors->first('nama_ibu_kandung') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_ibu_kandung">Alamat Ibu Kandung</label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_ibu_kandung') is-invalid @enderror" name="alamat_ibu_kandung" id="alamat_ibu_kandung" value="{{ old('alamat_ibu_kandung') }}" placeholder="Alamat Ibu Kandung">
                                                <div class="invalid-feedback" id="valid-alamat_ibu_kandung">{{ $errors->first('alamat_ibu_kandung') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_ayah_mertua">Nama Ayah Mertua</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_ayah_mertua') is-invalid @enderror" name="nama_ayah_mertua" id="nama_ayah_mertua" value="{{ old('nama_ayah_mertua') }}" placeholder="Nama Ayah Mertua">
                                                <div class="invalid-feedback" id="valid-nama_ayah_mertua">{{ $errors->first('nama_ayah_mertua') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_ayah_mertua">Alamat Ayah Mertua</label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_ayah_mertua') is-invalid @enderror" name="alamat_ayah_mertua" id="alamat_ayah_mertua" value="{{ old('alamat_ayah_mertua') }}" placeholder="Alamat Ayah Mertua">
                                                <div class="invalid-feedback" id="valid-alamat_ayah_mertua">{{ $errors->first('alamat_ayah_mertua') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_ibu_mertua">Nama Ibu Mertua</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_ibu_mertua') is-invalid @enderror" name="nama_ibu_mertua" id="nama_ibu_mertua" value="{{ old('nama_ibu_mertua') }}" placeholder="Nama Ibu Mertua">
                                                <div class="invalid-feedback" id="valid-nama_ibu_mertua">{{ $errors->first('nama_ibu_mertua') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_ibu_mertua">Alamat Ibu Mertua</label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_ibu_mertua') is-invalid @enderror" name="alamat_ibu_mertua" id="alamat_ibu_mertua" value="{{ old('alamat_ibu_mertua') }}" placeholder="Alamat Ibu mertua">
                                                <div class="invalid-feedback" id="valid-alamat_ibu_mertua">{{ $errors->first('alamat_ibu_mertua') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Kenalan</label>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('nama_kenalan_pertama') is-invalid @enderror" name="nama_kenalan_pertama" id="nama_kenalan_pertama" value="{{ old('nama_kenalan_pertama') }}" placeholder="Nama Kenalan Pertama">   
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm @error('alamat_kenalan_pertama') is-invalid @enderror" name="alamat_kenalan_pertama" id="alamat_kenalan_pertama" value="{{ old('alamat_kenalan_pertama') }}" placeholder="Alamat Kenalan Pertama">   
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('nama_kenalan_kedua') is-invalid @enderror" name="nama_kenalan_kedua" id="nama_kenalan_kedua" value="{{ old('nama_kenalan_kedua') }}" placeholder="Nama Kenalan Kedua"> 
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm @error('alamat_kenalan_kedua') is-invalid @enderror" name="alamat_kenalan_kedua" id="alamat_kenalan_kedua" value="{{ old('alamat_kenalan_kedua') }}" placeholder="Alamat Kenalan Kedua"> 
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('nama_kenalan_ketiga') is-invalid @enderror" name="nama_kenalan_ketiga" id="nama_kenalan_ketiga" value="{{ old('nama_kenalan_ketiga') }}" placeholder="Nama Kenalan Ketiga">  
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm @error('alamat_kenalan_ketiga') is-invalid @enderror" name="alamat_kenalan_ketiga" id="alamat_kenalan_ketiga" value="{{ old('alamat_kenalan_ketiga') }}" placeholder="Alamat Kenalan Ketiga">  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="hobi">Hobby</label>
                                                <input type="text" class="form-control form-control-sm @error('hobi') is-invalid @enderror" name="hobi" id="hobi" value="{{ old('hobi') }}" placeholder="Masukkan Hobby">
                                                <div class="invalid-feedback" id="valid-hobi">{{ $errors->first('hobi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kedudukan">Kedudukan di Masyarakat</label>
                                                <input type="text" class="form-control form-control-sm @error('kedudukan') is-invalid @enderror" name="kedudukan" id="kedudukan" value="{{ old('kedudukan') }}" placeholder="Masukkan Kedudukan di Masyarakat">
                                                <div class="invalid-feedback" id="valid-kedudukan">{{ $errors->first('kedudukan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="lain">Lain-lain</label>
                                                <input type="text" class="form-control form-control-sm @error('lain') is-invalid @enderror" name="lain" id="lain" value="{{ old('lain') }}" placeholder="Masukkan lain-lain">
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
