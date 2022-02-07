@extends('admin.layouts.master')
@section('title', 'Edit Pengawasan Media Komunikasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pengawasan Media Komunikasi</h1>
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
                            Pengawasan Media Komunikasi
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.pengawasan_media.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Pengawasan Media Komunikasi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tgl">Tanggal <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tgl') is-invalid @enderror" name="tgl" id="tgl"  value="@error('tgl'){{ old('tgl') }}@else{{ $data->tgl }}@enderror">
                                                <div class="invalid-feedback" id="valid-tgl">{{ $errors->first('tgl') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jenis_media">Jenis Media Komunikasi</label>
                                                <select class="select2 form-control form-control-sm @error('jenis_media') is-invalid @enderror" name="jenis_media" id="jenis_media">
                                                    <option value="" selected disabled>-- Pilih Jenis Media Komunikasi --</option>
                                                    @foreach ($medias as $media )
                                                        <option value="{{ $media->id }}" {{ old('jenis_media') == $media->id || $data->media_id == $media->id ? 'selected' : '' }}>{{ $media->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-jenis_media">{{ $errors->first('jenis_media') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan_id">Kecamatan</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id" id="kecamatan_id">
                                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                                    @foreach ($kecamatans as $kecamatan )
                                                        <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id') == $kecamatan->id || $data->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-kecamatan_id">{{ $errors->first('kecamatan_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tgl_publikasi">Tanggal Publikasi <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('tgl_publikasi') is-invalid @enderror" name="tgl_publikasi" id="tgl_publikasi" value="@error('tgl_publikasi'){{ old('tgl_publikasi') }}@else{{ $data->tgl_publikasi }}@enderror">
                                                <div class="invalid-feedback" id="valid-tgl_publikasi">{{ $errors->first('tgl_publikasi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pimpinan">Pimpinan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pimpinan') is-invalid @enderror" name="pimpinan" id="pimpinan" value="@error('pimpinan'){{ old('pimpinan') }}@else{{ $data->pimpinan }}@enderror" placeholder="Masukkan pimpinan atau Penerbit">
                                                <div class="invalid-feedback" id="valid-pimpinan">{{ $errors->first('pimpinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="konten">Isi dan Konten <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('konten') is-invalid @enderror" name="konten" id="konten" value="@error('konten'){{ old('konten') }}@else{{ $data->konten }}@enderror" placeholder="Masukkan Isi dan Konten">
                                                <div class="invalid-feedback" id="valid-konten">{{ $errors->first('konten') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="hasil">Hasil Penelitian <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('hasil') is-invalid @enderror" name="hasil" id="hasil" value="@error('hasil'){{ old('hasil') }}@else{{ $data->hasil }}@enderror" placeholder="Masukkan Hasil Penelitian">
                                                <div class="invalid-feedback" id="valid-hasil">{{ $errors->first('hasil') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindak_lanjut">Tindak Lanjut <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tindak_lanjut') is-invalid @enderror" name="tindak_lanjut" id="tindak_lanjut" value="@error('tindak_lanjut'){{ old('tindak_lanjut') }}@else{{ $data->tindak_lanjut }}@enderror" placeholder="Masukkan Tindak Lanjut">
                                                <div class="invalid-feedback" id="valid-tindak_lanjut">{{ $errors->first('tindak_lanjut') }}</div>
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
