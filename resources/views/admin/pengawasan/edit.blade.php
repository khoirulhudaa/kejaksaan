@extends('admin.layouts.master')
@section('title', 'Edit Pengawasan Lalu Lintas Orang Asing')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pengawasan Lalu Lintas Orang Asing</h1>
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
                            Pengawasan Lalu Lintas Orang Asing
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.pengawasan.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Pengawasan Lalu Lintas Orang Asing</h4>
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
                                                <label for="negara_id">Identitas WNA</label>
                                                <select class="select2 form-control form-control-sm @error('negara_id') is-invalid @enderror" name="negara_id" id="negara_id">
                                                    <option value="" selected disabled>-- Pilih Data --</option>
                                                    @foreach ($negaras as $negara )
                                                        <option value="{{ $negara->id }}" {{ old('negara_id') == $negara->id || $data->negara_id == $negara->id ? 'selected' : '' }}>{{ $negara->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback" id="valid-negara_id">{{ $errors->first('negara_id') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Asal Negara</label>
                                                <input type="text" class="form-control form-control-sm" id="x" readonly>
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
                                                <label for="pendatang_ilegal">Pendatang Ilegal <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pendatang_ilegal') is-invalid @enderror" name="pendatang_ilegal" id="pendatang_ilegal" value="@error('pendatang_ilegal'){{ old('pendatang_ilegal') }}@else{{ $data->pendatang_ilegal }}@enderror" placeholder="Masukkan Pendatang Ilegal">
                                                <div class="invalid-feedback" id="valid-pendatang_ilegal">{{ $errors->first('pendatang_ilegal') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Tinggal Sementara</label>
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-2">
                                                        <input type="text" class="form-control form-control-sm @error('tk') is-invalid @enderror" name="tk" id="tk"  placeholder="Tenaga Kerja" value="@error('tk'){{ old('tk') }}@else{{ $data->tk }}@enderror">   
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <input type="text" class="form-control form-control-sm @error('mhs') is-invalid @enderror" name="mhs" id="mhs"  placeholder="Mahasiswa" value="@error('mhs'){{ old('mhs') }}@else{{ $data->mhs }}@enderror"> 
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <input type="text" class="form-control form-control-sm @error('peneliti') is-invalid @enderror" name="peneliti" id="peneliti" placeholder="Peneliti" value="@error('peneliti'){{ old('peneliti') }}@else{{ $data->peneliti }}@enderror">  
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <input type="text" class="form-control form-control-sm @error('keluarga') is-invalid @enderror" name="keluarga" id="keluarga" placeholder="Keluarga" value="@error('keluarga'){{ old('keluarga') }}@else{{ $data->keluarga }}@enderror">
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <input type="text" class="form-control form-control-sm @error('rohaniawan') is-invalid @enderror" name="rohaniawan" id="rohaniawan" value="@error('rohaniawan'){{ old('rohaniawan') }}@else{{ $data->rohaniawan }}@enderror">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Kunjungan</label>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('usaha') is-invalid @enderror" name="usaha" id="usaha" value="@error('usaha'){{ old('usaha') }}@else{{ $data->usaha }}@enderror" placeholder="Usaha">   
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('sosbud') is-invalid @enderror" name="sosbud" id="sosbud" value="@error('sosbud'){{ old('sosbud') }}@else{{ $data->sosbud }}@enderror" placeholder="Sosial Budaya"> 
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <input type="text" class="form-control form-control-sm @error('wisata') is-invalid @enderror" name="wisata" id="wisata" value="@error('wisata'){{ old('wisata') }}@else{{ $data->wisata }}@enderror" placeholder="Wisata">  
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

            $('body').on('change', '#negara_id', function() {
                var id = $(this).val();
                ajaxurl = '{{ route("admin.wna.search", "id") }}'
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        console.log(data[0])
                        $('#x').val(data[0].country.name);
                    },
                    error: function(data) {
                        console.log(data)
                    }
                });
            })

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection
