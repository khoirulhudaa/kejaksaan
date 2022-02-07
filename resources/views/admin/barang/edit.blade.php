@extends('admin.layouts.master')
@section('title', 'Edit Kartu TIK Biodata')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kartu TIK Biodata</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.barang.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Kartu TIK Biodata
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
                <form method="POST" action="{{ route('admin.barang.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
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
                                                <label for="nama">Nama Barang Cetakan<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="nama" value="@error('nama'){{ old('nama') }}@else{{ $data->nama }}@enderror" placeholder="Masukkan nama barang cetakan">
                                                <div class="invalid-feedback" id="valid-nama">{{ $errors->first('nama') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('penerbit') is-invalid @enderror" name="penerbit" id="penerbit" value="@error('penerbit'){{ old('penerbit') }}@else{{ $data->penerbit }}@enderror" placeholder="Masukkan penerbit">
                                                <div class="invalid-feedback" id="valid-penerbit">{{ $errors->first('penerbit') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pengarang">Pengarang / Penanggung Jawab <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pengarang') is-invalid @enderror" name="pengarang" id="pengarang" value="@error('pengarang'){{ old('pengarang') }}@else{{ $data->pengarang }}@enderror" placeholder="Masukkan pengarang">
                                                <div class="invalid-feedback" id="valid-pengarang">{{ $errors->first('pengarang') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="waktu">Waktu peredaran <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control form-control-sm @error('waktu') is-invalid @enderror" name="waktu" id="waktu" value="@error('waktu'){{ old('waktu') }}@else{{ $data->waktu }}@enderror">
                                                <div class="invalid-feedback" id="valid-waktu">{{ $errors->first('waktu') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="daerah">Daerah Peredaran <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('daerah') is-invalid @enderror" name="daerah" id="daerah" value="@error('daerah'){{ old('daerah') }}@else{{ $data->daerah }}@enderror" placeholder="Masukkan daerah peredaran">
                                                <div class="invalid-feedback" id="valid-daerah">{{ $errors->first('daerah') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="pencetak">Pencetak <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('pencetak') is-invalid @enderror" name="pencetak" id="pencetak" value="@error('pencetak'){{ old('pencetak') }}@else{{ $data->pencetak }}@enderror" placeholder="Masukkan pencetak">
                                                <div class="invalid-feedback" id="valid-pencetak">{{ $errors->first('pencetak') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="nama_pimpinan">Nama Pimpinan Redaksi <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('nama_pimpinan') is-invalid @enderror" name="nama_pimpinan" id="nama_pimpinan" value="@error('nama_pimpinan'){{ old('nama_pimpinan') }}@else{{ $data->nama_pimpinan }}@enderror" placeholder="Masukkan nama pimpinan redaksi">
                                                <div class="invalid-feedback" id="valid-nama_pimpinan">{{ $errors->first('nama_pimpinan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_penerbit">Alamat Penerbit <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_penerbit') is-invalid @enderror" name="alamat_penerbit" id="alamat_penerbit" value="@error('alamat_penerbit'){{ old('alamat_penerbit') }}@else{{ $data->alamat_penerbit }}@enderror" placeholder="Masukkan alamat penerbit">
                                                <div class="invalid-feedback" id="valid-alamat_penerbit">{{ $errors->first('alamat_penerbit') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat_percetakan">Alamat Percetakan <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control form-control-sm @error('alamat_percetakan') is-invalid @enderror" name="alamat_percetakan" id="alamat_percetakan" value="@error('alamat_percetakan'){{ old('alamat_percetakan') }}@else{{ $data->alamat_percetakan }}@enderror" placeholder="Masukkan alamat percetakan">
                                                <div class="invalid-feedback" id="valid-alamat_percetakan">{{ $errors->first('alamat_percetakan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="jumlah_oplah">Jumlah Oplah <sup class="text-danger">*</sup></label>
                                                <input type="number" class="form-control form-control-sm @error('jumlah_oplah') is-invalid @enderror" name="jumlah_oplah" id="jumlah_oplah" value="@error('jumlah_oplah'){{ old('jumlah_oplah') }}@else{{ $data->jumlah_oplah }}@enderror" placeholder="Masukkan jumlah oplah">
                                                <div class="invalid-feedback" id="valid-jumlah_oplah">{{ $errors->first('jumlah_oplah') }}</div>
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
                                                <label for="photo">Foto <sup class="text-danger">max : 2MB</sup></label>
                                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                                                <br>
                                                <img src="{{ asset('/img/barang/' . $data->photo) }}" width="200" height="200">
                                                <div class="invalid-feedback" id="valid-photo">{{ $errors->first('photo') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">Biografi Intelijen</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-danger" id="valid-type">{{ $errors->first('type') }}</div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="kasus">Kasus / Masalah yang terjadi</label>
                                                <input type="text" class="form-control form-control-sm @error('kasus') is-invalid @enderror" name="kasus" id="kasus" value="@error('kasus'){{ old('kasus') }}@else{{ $data->kasus }}@enderror" placeholder="Masukkan Kasus / Masalah yang terjadi">
                                                <div class="invalid-feedback" id="valid-kasus">{{ $errors->first('kasus') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="background">Latar Belakang dan akibatnya</label>
                                                <input type="text" class="form-control form-control-sm @error('background') is-invalid @enderror" name="background" id="background" value="@error('background'){{ old('background') }}@else{{ $data->background }}@enderror" placeholder="Masukkan Latar Belakang dan akibatnya">
                                                <div class="invalid-feedback" id="valid-background">{{ $errors->first('background') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan">Tindakan yang dilakukan oleh</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan') is-invalid @enderror" name="tindakan" id="tindakan" value="@error('tindakan'){{ old('tindakan') }}@else{{ $data->tindakan }}@enderror" placeholder="Tindakan yang dilakukan oleh">
                                                <div class="invalid-feedback" id="valid-tindakan">{{ $errors->first('tindakan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan_kejaksaan">Tindakan Kejaksaan</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan_kejaksaan') is-invalid @enderror" name="tindakan_kejaksaan" id="tindakan_kejaksaan" value="@error('tindakan_kejaksaan'){{ old('tindakan_kejaksaan') }}@else{{ $data->tindakan_kejaksaan }}@enderror" placeholder="Tindakan Kejaksaan">
                                                <div class="invalid-feedback" id="valid-tindakan_kejaksaan">{{ $errors->first('tindakan_kejaksaan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan_kepolisian">Tindakan Kepolisian</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan_kepolisian') is-invalid @enderror" name="tindakan_kepolisian" id="tindakan_kepolisian" value="@error('tindakan_kepolisian'){{ old('tindakan_kepolisian') }}@else{{ $data->tindakan_kepolisian }}@enderror" placeholder="Tindakan Kepolisian">
                                                <div class="invalid-feedback" id="valid-tindakan_kepolisian">{{ $errors->first('tindakan_kepolisian') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="tindakan_pengadilan">Tindakan Pengadilan</label>
                                                <input type="text" class="form-control form-control-sm @error('tindakan_pengadilan') is-invalid @enderror" name="tindakan_pengadilan" id="tindakan_pengadilan" value="@error('tindakan_pengadilan'){{ old('tindakan_pengadilan') }}@else{{ $data->tindakan_pengadilan }}@enderror" placeholder="Tindakan Pengadilan">
                                                <div class="invalid-feedback" id="valid-tindakan_pengadilan">{{ $errors->first('tindakan_pengadilan') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan lain-lain</label>
                                                <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="@error('keterangan'){{ old('keterangan') }}@else{{ $data->keterangan }}@enderror" placeholder="Keterangan lain-lain">
                                                <div class="invalid-feedback" id="valid-keterangan">{{ $errors->first('keterangan') }}</div>
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
