@extends('admin.layouts.master')
@section('title', 'Edit Pencegahan dan Penangkalan')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pencegahan dan Penangkalan</h1>
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
                            Pencegahan dan Penangkalan
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.pencegahan.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Pencegahan dan Penangkalan</h4>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" id="id" value="{{ $data->id }}">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tgl">Tanggal <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="@error('tgl'){{ old('tgl') }}@else{{ $data->tgl }}@enderror">
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
                                                    @foreach ($biodatas as $biodata )
                                                        <option value="{{ $biodata->id }}" {{ old('biodata') == $biodata->id || $data->biodata_id == $biodata->id ? 'selected' : '' }}>{{ $biodata->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-biodata">{{ $errors->first('biodata') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan">Locus</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                    @foreach ($kecamatans as $kecamatan )
                                                        <option value="{{ $kecamatan->id }}" {{ old('kecamatan') == $kecamatan->id || $data->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->name }}</option>
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
                                                <input type="date" class="form-control form-control-sm @error('locus') is-invalid @enderror" name="locus" id="locus" value="@error('locus'){{ old('locus') }}@else{{ $data->locus }}@enderror" placeholder="Masukkan Locus dan Tempus">
                                                <div class="invalid-feedback" id="valid-locus">{{ $errors->first('locus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Permohonan Pencegahan dan Penangkalan</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" name="nomor_pencegahan" id="nomor_pencegahan" value="@error('nomor_pencegahan'){{ old('nomor_pencegahan') }}@else{{ $data->nomor_pencegahan }}@enderror" placeholder="Masukkan nomor pencegahan"> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm" name="tgl_pencegahan" id="tgl_pencegahan" value="@error('tgl_pencegahan'){{ old('tgl_pencegahan') }}@else{{ $data->tgl_pencegahan }}@enderror">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pasal">Pasal yang disangkakan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pasal') is-invalid @enderror" name="pasal" id="pasal" value="@error('pasal'){{ old('pasal') }}@else{{ $data->pasal }}@enderror" placeholder="Masukkan Pasal yang dilanggar">
                                                <div class="invalid-feedback" id="valid-pasal">{{ $errors->first('pasal') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Kepja RI</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" name="nomor_kepja" id="nomor_kepja" value="@error('nomor_kepja'){{ old('nomor_kepja') }}@else{{ $data->nomor_kepja }}@enderror" placeholder="Masukkan nomor kepja RI"> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm" name="tgl_kepja" id="tgl_kepja" value="@error('tgl_kepja'){{ old('tgl_kepja') }}@else{{ $data->tgl_kepja }}@enderror">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Cegah dan Tangkal</label>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm" name="tgl_mulai" id="tgl_mulai" value="@error('tgl_mulai'){{ old('tgl_mulai') }}@else{{ $data->tgl_mulai }}@enderror"> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="date" class="form-control form-control-sm" name="tgl_akhir" id="tgl_akhir" value="@error('tgl_akhir'){{ old('tgl_akhir') }}@else{{ $data->tgl_akhir }}@enderror">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="@error('keterangan'){{ old('keterangan') }}@else{{ $data->keterangan }}@enderror" placeholder="Masukkan Keterangan">
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
