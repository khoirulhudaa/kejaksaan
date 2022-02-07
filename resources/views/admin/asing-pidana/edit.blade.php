@extends('admin.layouts.master')
@section('title', 'Edit WNA Yang Terlibat Perkara Tindak Pidana')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit WNA Yang Terlibat Perkara Tindak Pidana</h1>
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
                            WNA Yang Terlibat Perkara Tindak Pidana
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.asing-pidana.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Edit WNA Yang Terlibat Perkara Tindak Pidana</h4>
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
                                                <label for="biodata_id">Nama Lengkap</label>
                                                <select class="select2 form-control form-control-sm @error('biodata_id') is-invalid @enderror" name="biodata_id" id="biodata_id">
                                                    <option value="" selected disabled>-- Pilih Warga Negara Asing --</option>
                                                    @foreach ($biodatas as $biodata )
                                                        <option value="{{ $biodata->id }}" {{ old('biodata_id') == $biodata->id || $data->biodata_id == $biodata->id ? 'selected' : '' }}>{{ $biodata->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-biodata_id">{{ $errors->first('biodata_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kecamatan">Locus</label>
                                                <select class="select2 form-control form-control-sm @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                                    <option value="" selected disabled>-- Pilih Locus --</option>
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
                                                <label for="tindak_pidana">Tindak Pidana <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('tindak_pidana') is-invalid @enderror" name="tindak_pidana" id="tindak_pidana" value="@error('tindak_pidana'){{ old('tindak_pidana') }}@else{{ $data->tindak_pidana }}@enderror" placeholder="Masukkan Tindak Pidana">
                                                <div class="invalid-feedback" id="valid-tindak_pidana">{{ $errors->first('tindak_pidana') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Tahapan</label>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('tahapan_dik') is-invalid @enderror" name="tahapan_dik" id="tahapan_dik" value="@error('tahapan_dik'){{ old('tahapan_dik') }}@else{{ $data->tahapan_dik }}@enderror" placeholder="Tahapan DIK">   
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('tahapan_pratut') is-invalid @enderror" name="tahapan_pratut" id="tahapan_pratut" value="@error('tahapan_pratut'){{ old('tahapan_pratut') }}@else{{ $data->tahapan_pratut }}@enderror" placeholder="Tahapan PRATUT"> 
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('tahapan_tut') is-invalid @enderror" name="tahapan_tut" id="tahapan_tut" value="@error('tahapan_tut'){{ old('tahapan_tut') }}@else{{ $data->tahapan_tut }}@enderror" placeholder="Tahapan TUT">  
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input type="text" class="form-control form-control-sm @error('tahapan_eksekusi') is-invalid @enderror" name="tahapan_eksekusi" id="tahapan_eksekusi" value="@error('tahapan_eksekusi'){{ old('tahapan_eksekusi') }}@else{{ $data->tahapan_eksekusi }}@enderror" placeholder="Tahapan Eksekusi">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="lama_pidana">Lama Pidana Penjara <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('lama_pidana') is-invalid @enderror" name="lama_pidana" id="lama_pidana" value="@error('lama_pidana'){{ old('lama_pidana') }}@else{{ $data->lama_pidana }}@enderror" placeholder="Masukkan Lama Pidana Penjara">
                                                <div class="invalid-feedback" id="valid-lama_pidana">{{ $errors->first('lama_pidana') }}</div>
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
