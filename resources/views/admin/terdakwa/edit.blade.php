@extends('admin.layouts.master')
@section('title', 'Edit Kartu TIK Tersangka/Terdakwa/Terpidana')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kartu TIK Tersangka/Terdakwa/Terpidana</h1>
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
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.terdakwa.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Identitas</h4>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" id="id" value="{{ $data->id }}">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nomor">Nomor <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nomor') is-invalid @enderror" name="nomor" id="nomor" value="@error('nomor'){{ old('nomor') }}@else{{ $data->nomor }}@enderror">
                                                <div class="invalid-feedback" id="valid-nomor">{{ $errors->first('nomor') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="@error('nama'){{ old('nama') }}@else{{ $data->nama }}@enderror">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="panggilan">Nama Samaran / Panggilan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('panggilan') is-invalid @enderror" name="panggilan" id="panggilan" value="@error('panggilan'){{ old('panggilan') }}@else{{ $data->panggilan }}@enderror">
                                                <div class="invalid-feedback" id="valid-panggilan">{{ $errors->first('panggilan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="@error('tempat_lahir'){{ old('tempat_lahir') }}@else{{ $data->tempat_lahir }}@enderror">
                                                <div class="invalid-feedback" id="valid-tempat_lahir">{{ $errors->first('tempat_lahir') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="@error('tanggal_lahir'){{ old('tanggal_lahir') }}@else{{ $data->tanggal_lahir }}@enderror">
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
                                                    <option value="L" {{$data->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="P" {{$data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                                    @foreach ($kewarganegaraans as $kewarganegaraan )
                                                        <option value="{{ $kewarganegaraan->id }}" {{ old('kewarganegaraan') == $kewarganegaraan->id || $data->kewarganegaraan_id == $kewarganegaraan->id ? 'selected' : '' }}>{{ $kewarganegaraan->name }}</option>
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
                                                    @foreach ($bangsas as $bangsa )
                                                        <option value="{{ $bangsa->id }}" {{ old('bangsa') == $bangsa->id || $data->bangsa_id == $bangsa->id ? 'selected' : '' }}>{{ $bangsa->name }}</option>
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
                                                    @foreach ($kecamatans as $kecamatan )
                                                        <option value="{{ $kecamatan->name }}" {{ old('kecamatan') == $kecamatan->name || $data->kecamatan == $kecamatan->name ? 'selected' : '' }}>{{ $kecamatan->name }}</option>
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
                                                <label for="kecamatan">Kecamatan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan_" id="kecamatan_" value="@error('kecamatan'){{ old('kecamatan') }}@else{{ $data->kecamatan }}@enderror" readonly>
                                                <small>Kosongkan jika tidak diperlukan</small>
                                                <div class="invalid-feedback" id="valid-kecamatan">{{ $errors->first('kecamatan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="@error('alamat'){{ old('alamat') }}@else{{ $data->alamat }}@enderror">
                                                <div class="invalid-feedback" id="valid-alamat">{{ $errors->first('alamat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">No Handphone <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="@error('phone'){{ old('phone') }}@else{{ $data->phone }}@enderror">
                                                <div class="invalid-feedback" id="valid-phone">{{ $errors->first('phone') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pasport">No Pasport <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pasport') is-invalid @enderror" name="pasport" id="pasport" value="@error('pasport'){{ old('pasport') }}@else{{ $data->pasport }}@enderror">
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
                                                    @foreach ($agamas as $agama )
                                                        <option value="{{ $agama->id }}" {{ old('agama') == $agama->id || $data->agama_id == $agama->id ? 'selected' : '' }}>{{ $agama->name }}</option>
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
                                                    @foreach ($pendidikans as $pendidikan )
                                                        <option value="{{ $pendidikan->id }}" {{ old('pendidikan') == $pendidikan->id || $data->pendidikan_id == $pendidikan->id ? 'selected' : '' }}>{{ $pendidikan->name }}</option>
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
                                                    @foreach ($pekerjaans as $pekerjaan )
                                                        <option value="{{ $pekerjaan->id }}" {{ old('pekerjaan') == $pekerjaan->id || $data->pekerjaan_id == $pekerjaan->id ? 'selected' : '' }}>{{ $pekerjaan->name }}</option>
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
                                                <input type="text" class="form-control form-control-sm @error('alamat_kantor') is-invalid @enderror" name="alamat_kantor" id="alamat_kantor" value="@error('alamat_kantor'){{ old('alamat_kantor') }}@else{{ $data->alamat_kantor }}@enderror">
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
                                                    @foreach ($perkawinans as $perkawinan )
                                                        <option value="{{ $perkawinan->id }}" {{ old('perkawinan') == $perkawinan->id || $data->perkawinan_id == $perkawinan->id ? 'selected' : '' }}>{{ $perkawinan->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-perkawinan">{{ $errors->first('perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kepartaian">Kepartaian <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('kepartaian') is-invalid @enderror" name="kepartaian" id="kepartaian" value="@error('kepartaian'){{ old('kepartaian') }}@else{{ $data->kepartaian }}@enderror">
                                                <div class="invalid-feedback" id="valid-kepartaian">{{ $errors->first('kepartaian') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="photo">Foto <sup class="text-danger">max : 2MB</sup></label>
                                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                                                <br>
                                                <img src="{{ asset('/img/terdakwa/' . $data->photo) }}" width="200" height="200">
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
                                                <textarea class="form-control form-control-sm @error('kasus') is-invalid @enderror" name="kasus" id="kasus" placeholder="Masukkan Kasus posisi secara singkat / pasal yang dilanggar">@error('kasus'){{ old('kasus') }}@else{{ $data->kasus }}@enderror</textarea>
                                                <div class="invalid-feedback" id="valid-kasus">{{ $errors->first('nama_istri') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="background">Latar belakang & akibat-akibat peristiwa/kerugian</label>
                                                <input type="text" class="form-control form-control-sm @error('background') is-invalid @enderror" name="background" id="background" value="@error('background'){{ old('background') }}@else{{ $data->background }}@enderror" placeholder="Masukkan Latar belakang & akibat-akibat peristiwa/kerugian">
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
                                                        <input type="text" class="form-control form-control-sm @error('no_skpp') is-invalid @enderror" name="no_skpp" id="no_skpp" value="@error('no_skpp'){{ old('no_skpp') }}@else{{ $data->no_skpp }}@enderror" placeholder="No">     
                                                    </div>
                                                    <div class="col-md-7 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm @error('tgl_skpp') is-invalid @enderror" name="tgl_skpp" id="tgl_skpp" value="@error('tgl_skpp'){{ old('tgl_skpp') }}@else{{ $data->tgl_skpp }}@enderror"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="putusan_pengadilan_pn">Putusan Pengadilan (PN)</label>
                                                <input type="text" class="form-control form-control-sm @error('putusan_pengadilan_pn') is-invalid @enderror" name="putusan_pengadilan_pn" id="putusan_pengadilan_pn" value="@error('putusan_pengadilan_pn'){{ old('putusan_pengadilan_pn') }}@else{{ $data->putusan_pengadilan_pn }}@enderror" placeholder="Putusan Pengadilan (PN)">
                                                <div class="invalid-feedback" id="valid-putusan_pengadilan_pn">{{ $errors->first('putusan_pengadilan_pn') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="putusan_pengadilan_pt">Putusan Pengadilan (PT)</label>
                                                <input type="text" class="form-control form-control-sm @error('putusan_pengadilan_pt') is-invalid @enderror" name="putusan_pengadilan_pt" id="putusan_pengadilan_pt" value="@error('putusan_pengadilan_pt'){{ old('putusan_pengadilan_pt') }}@else{{ $data->putusan_pengadilan_pt }}@enderror" placeholder="Putusan Pengadilan (PT)">
                                                <div class="invalid-feedback" id="valid-putusan_pengadilan_pt">{{ $errors->first('putusan_pengadilan_pt') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="putusan_pengadilan_ma">Putusan Pengadilan (MA)</label>
                                                <input type="text" class="form-control form-control-sm @error('putusan_pengadilan_ma') is-invalid @enderror" name="putusan_pengadilan_ma" id="putusan_pengadilan_ma" value="@error('putusan_pengadilan_ma'){{ old('putusan_pengadilan_ma') }}@else{{ $data->putusan_pengadilan_ma }}@enderror" placeholder="Putusan Pengadilan (MA)">
                                                <div class="invalid-feedback" id="valid-putusan_pengadilan_ma">{{ $errors->first('putusan_pengadilan_ma') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_orangtua">Nama Orang tua / Alamat</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_orangtua') is-invalid @enderror" name="nama_orangtua" id="nama_orangtua" value="@error('nama_orangtua'){{ old('nama_orangtua') }}@else{{ $data->nama_orangtua }}@enderror" placeholder="Nama Orang tua / Alamat">
                                                <div class="invalid-feedback" id="valid-nama_orangtua">{{ $errors->first('nama_orangtua') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_kawan">Nama Kawan yang dikenal</label>
                                                <input type="text" class="form-control form-control-sm @error('nama_kawan') is-invalid @enderror" name="nama_kawan" id="nama_kawan" value="@error('nama_kawan'){{ old('nama_kawan') }}@else{{ $data->nama_kawan }}@enderror" placeholder="Nama Kawan yang dikenal">
                                                <div class="invalid-feedback" id="valid-nama_kawan">{{ $errors->first('nama_kawan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="lain">Lain-lain</label>
                                                <input type="text" class="form-control form-control-sm @error('lain') is-invalid @enderror" name="lain" id="lain" value="@error('lain'){{ old('lain') }}@else{{ $data->putusan_pengadilan_ma }}@enderror" placeholder="Lain-lain">
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

            // Open Modal to Add new Author
            $('#btn-add').click(function(e) {
                e.preventDefault();
                $('#formModal').modal('show');
                $('.modal-title').html('Add Author');
                $('#author-form').trigger('reset');
                $('#btn-save').html('<i class="fas fa-check"></i> Save Changes');
                $('#author-form').find('.form-control').removeClass('is-invalid is-valid');
                $('#btn-save').val('save').removeAttr('disabled');
            });

            $('body').on('keyup', '#title, #category_id, #content, #thumbnail', function() {
                var test = $(this).val();
                if (test == '') {
                    $(this).removeClass('is-valid is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            })

            function filePreview2(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('img').remove();
                        $('#photo').after('<br><img src="' + e.target.result + '" width="200" height="200">');
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
