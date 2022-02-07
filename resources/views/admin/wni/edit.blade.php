@extends('admin.layouts.master')
@section('title', 'Edit Biodata WNI')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Biodata WNI</h1>
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
                            Biodata WNI
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.wni.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Biodata WNI</h4>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" id="id" value="{{ $data->id }}">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nik">NIK <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nik') is-invalid @enderror" name="nik" id="nik" value="@error('nik'){{ old('nik') }}@else{{ $data->nik }}@enderror" maxlength="16">
                                                <div class="invalid-feedback" id="valid-nik">{{ $errors->first('nik') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="@error('nama'){{ old('nama') }}@else{{ $data->name }}@enderror">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
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
                                                <label for="kecamatan">Kecamatan (Optional)</label>
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
                                                <label for="perkawinan">Status Perkawinann</label>
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
                                                <label for="legitimasi_perkawinan">Legitimasi Perkawinan</label>
                                                <select class="select2 form-control form-control-sm @error('legitimasi_perkawinan') is-invalid @enderror" name="legitimasi_perkawinan" id="legitimasi_perkawinan">
                                                    <option value="" selected disabled>-- Pilih Legitimasi Perkawinan --</option>
                                                        @foreach ($legalitas as $legalita )
                                                            <option value="{{ $legalita->id }}" {{ old('legitimasi_perkawinan') == $legalita->id || $data->legitimasi_perkawinan == $legalita->id ? 'selected' : '' }}>{{ $legalita->name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-legitimasi_perkawinan">{{ $errors->first('legitimasi_perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="legitimasi_perkawinan">Legitimasi Perkawinan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('legitimasi_perkawinan') is-invalid @enderror" name="legitimasi_perkawinan" id="legitimasi_perkawinan" value="@error('legitimasi_perkawinan'){{ old('legitimasi_perkawinan') }}@else{{ $data->legitimasi_perkawinan }}@enderror">
                                                <div class="invalid-feedback" id="valid-legitimasi_perkawinan">{{ $errors->first('legitimasi_perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tempat_perkawinan">Tempat Perkawinan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tempat_perkawinan') is-invalid @enderror" name="tempat_perkawinan" id="tempat_perkawinan" value="@error('tempat_perkawinan'){{ old('tempat_perkawinan') }}@else{{ $data->tempat_perkawinan }}@enderror">
                                                <div class="invalid-feedback" id="valid-tempat_perkawinan">{{ $errors->first('tempat_perkawinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tanggal_perkawinan">Tanggal Perkawinan <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tanggal_perkawinan') is-invalid @enderror" name="tanggal_perkawinan" id="tanggal_perkawinan" value="@error('tanggal_perkawinan'){{ old('tanggal_perkawinan') }}@else{{ $data->tanggal_perkawinan }}@enderror">
                                                <div class="invalid-feedback" id="valid-tanggal_perkawinan">{{ $errors->first('tanggal_perkawinan') }}</div>
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
                        $('img').remove();
                        $('#thumbnail').after('<img src="' + e.target.result + '" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            }

            $('#thumbnail').change(function() {
                filePreview2(this);
                $('#valid-thumbnail').html('');
            });

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection
