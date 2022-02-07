@extends('admin.layouts.master')
@section('title', 'Edit Data KTP')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data KTP</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.ktp.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Data KTP
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-plus-circle"></i>
                        Edit Data
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.ktp.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Data</h4>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" id="id" value="{{ $data->id }}">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="photo">Foto <sup class="text-danger">max : 2MB</sup></label>
                                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                                                <br>
                                                <img src="{{ asset('/img/ktp/' . $data->photo) }}" width="200" height="200">
                                                <div class="invalid-feedback" id="valid-photo">{{ $errors->first('photo') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="provinsi">Provinsi</label>
                                                <select class="form-control form-control-sm @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" disabled>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->prov_id }}">{{ $province->prov_name }}</option>
                                                    @endforeach
                                                </select>
                                                <small>*) Kosongkan jika tidak ingin dirubah</small>
                                                <div class="invalid-feedback" id="valid-kabupaten">{{ $errors->first('kabupaten') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kabupaten">Kabupaten</label>
                                                <select class="form-control form-control-sm @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten">
                                                    <option value="" selected disabled>-- Pilih Kabupaten --</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}" {{ old('kabupaten') == $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                                        @endforeach
                                                </select>
                                                <small>*) Kosongkan jika tidak ingin dirubah</small>
                                                <div class="invalid-feedback" id="valid-kabupaten">{{ $errors->first('kabupaten') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select class="form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                </select>
                                                <small>*) Kosongkan jika tidak ingin dirubah</small>
                                                <div class="invalid-feedback" id="valid-kecamatan">{{ $errors->first('kecamatan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="desa">Desa/Kelurahan</label>
                                                <select class="form-control form-control-sm @error('desa') is-invalid @enderror" name="desa" id="desa">
                                                    <option value="" selected disabled>-- Pilih Desa/Kelurahan --</option>
                                                </select>
                                                <small>*) Kosongkan jika tidak ingin dirubah</small>
                                                <div class="invalid-feedback" id="valid-desa">{{ $errors->first('desa') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nik">NIK<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nik') is-invalid @enderror" name="nik" id="nik" value="@error('nik'){{ old('nik') }}@else{{ $data->nik }}@enderror" placeholder="Masukkan NIK" maxlength="16">
                                                <div class="invalid-feedback" id="valid-nik">{{ $errors->first('nik') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="@error('nama'){{ old('nama') }}@else{{ $data->nama }}@enderror" placeholder="Masukkan nama">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="@error('tempat_lahir'){{ old('tempat_lahir') }}@else{{ $data->tempat_lahir }}@enderror" placeholder="Masukkan tempat lahir">
                                                <div class="invalid-feedback" id="valid-tempat_lahir">{{ $errors->first('tempat_lahir') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir<sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="@error('tanggal_lahir'){{ old('tanggal_lahir') }}@else{{ $data->tanggal_lahir }}@enderror">
                                                <div class="invalid-feedback" id="valid-tanggal_lahir">{{ $errors->first('tanggal_lahir') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control form-control-sm @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
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
                                                <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="@error('alamat'){{ old('alamat') }}@else{{ $data->alamat }}@enderror" placeholder="Masukkan alamat">
                                                <div class="invalid-feedback" id="valid-alamat">{{ $errors->first('alamat') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="rt">RT<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('rt') is-invalid @enderror" name="rt" id="rt" value="@error('rt'){{ old('rt') }}@else{{ $data->rt }}@enderror">
                                                <div class="invalid-feedback" id="valid-rt">{{ $errors->first('rt') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="rw">RW<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('rw') is-invalid @enderror" name="rw" id="rw" value="@error('rw'){{ old('rw') }}@else{{ $data->rw }}@enderror">
                                                <div class="invalid-feedback" id="valid-rw">{{ $errors->first('rw') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="status_perkawinan">Status Perkawinan<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" id="status_perkawinan" value="@error('status_perkawinan'){{ old('status_perkawinan') }}@else{{ $data->status_perkawinan }}@enderror" placeholder="Masukkan status perkawinan">
                                                <div class="invalid-feedback" id="valid-status_perkawinan">{{ $errors->first('status_perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Pekerjaan</label>
                                                <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="@error('keterangan'){{ old('keterangan') }}@else{{ $data->keterangan }}@enderror" placeholder="Masukkan Pekerjaan">
                                                <div class="invalid-feedback" id="valid-keterangan">{{ $errors->first('keterangan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-round float-right" id="btn-submit">
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
            
            $('body').on('change', '#kabupaten', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.kecamatan.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $.each(data, function (i,data) {
                            $('#kecamatan').append(new Option(data.dis_name, data.id))
                        })
                    },
                    error: function(data) {
                        console.log(data)
                    }
                });
            })
            $("#PrivateTeam").trigger('change');
            $('body').on('change', '#kecamatan', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.desa.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $.each(data, function (i, data) {
                            $('#desa').append(new Option(data.subdis_name, data.id))
                        })
                    },
                    error: function(data) {
                        console.log(data)
                    }
                });
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

