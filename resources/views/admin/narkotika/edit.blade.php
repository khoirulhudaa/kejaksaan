@extends('admin.layouts.master')
@section('title', 'Edit Tindak Pindana Narkotika')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Tindak Pindana Narkotika</h1>
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
                            Tindak Pindana Narkotika
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.narkotika.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Tindak Pidana Narkotika</h4>
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
                                                        <option value="{{ $biodata->id }}" {{ old('biodata') == $biodata->id || $data->biodata_id == $biodata->id ? 'selected' : '' }}>{{ $biodata->nama }}</option>
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
                                                <label for="pasal">Pasal yang dilanggar <sup class="text-danger">*</sup></label>
                                                <textarea class="form-control form-control-sm @error('pasal') is-invalid @enderror" name="pasal" id="pasal" placeholder="Masukkan Pasal yang dilanggar">@error('pasal'){{ old('pasal') }}@else{{ $data->pasal }}@enderror</textarea>
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
                                                        <input type="date" class="form-control form-control-sm" name="tgl_surat_pra_penuntutan" id="tgl_surat_pra_penuntutan" value="@error('tgl_surat_pra_penuntutan'){{ old('tgl_surat_pra_penuntutan') }}@else{{ $data->tgl_surat_pra_penuntutan }}@enderror">   
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm" name="nomor_surat_pra_penuntutan" id="nomor_surat_pra_penuntutan" value="@error('nomor_surat_pra_penuntutan'){{ old('nomor_surat_pra_penuntutan') }}@else{{ $data->nomor_surat_pra_penuntutan }}@enderror" placeholder="Masukkan Nomor Surat Pra Penuntutan">   
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label>Penuntutan</label>
                                                        <input type="date" class="form-control form-control-sm" name="tgl_surat_penuntutan" id="tgl_surat_penuntutan" value="@error('tgl_surat_penuntutan'){{ old('tgl_surat_penuntutan') }}@else{{ $data->tgl_surat_penuntutan }}@enderror"> 
                                                        <br>
                                                        <input type="text" class="form-control form-control-sm" name="nomor_surat_penuntutan" id="nomor_surat_penuntutan" value="@error('nomor_surat_penuntutan'){{ old('nomor_surat_penuntutan') }}@else{{ $data->nomor_surat_penuntutan }}@enderror" placeholder="Masukkan Nomor Surat Penuntutan"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="eksekusi">Eksekusi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('eksekusi') is-invalid @enderror" name="eksekusi" id="eksekusi" value="@error('eksekusi'){{ old('eksekusi') }}@else{{ $data->eksekusi }}@enderror" placeholder="Masukkan Eksekusi">
                                                <div class="invalid-feedback" id="valid-eksekusi">{{ $errors->first('eksekusi') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="upaya">Upaya Hukum <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('upaya') is-invalid @enderror" name="upaya" id="upaya" value="@error('upaya'){{ old('upaya') }}@else{{ $data->upaya }}@enderror" placeholder="Masukkan Upaya Hukum">
                                                <div class="invalid-feedback" id="valid-upaya">{{ $errors->first('upaya') }}</div>
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
