@extends('admin.layouts.master')
@section('title', 'Detail Biodata WNI')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Biodata WNI</h1>
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
                        Detail
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-title">Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md">
                                <tr>
                                    <td>NIK</td>
                                    <td class="text-center">{{ $data->nik }}</th>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td class="text-center">{{ $data->name }}</th>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td class="text-center">{{ $data->tempat_lahir }}</th>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td class="text-center">{{ date('d M Y', strtotime($data->tanggal_lahir)) }}</th>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td class="text-center">{{ $data->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</th>
                                </tr>
                                <tr>
                                    <td>Suku Bangsa</td>
                                    <td class="text-center">{{ $data->bangsa->name }}</th>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td class="text-center">{{ $data->kewarganegaraan }}</th>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td class="text-center">{{ $data->kecamatan }}</th>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td class="text-center">{{ $data->alamat }}</th>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <td class="text-center">{{ $data->phone }}</th>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td class="text-center">{{ $data->agama->name }}</th>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td class="text-center">{{ $data->pendidikan->name }}</th>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td class="text-center">{{ $data->pekerjaan->name }}</th>
                                </tr>
                                <tr>
                                    <td>Alamat Kantor</td>
                                    <td class="text-center">{{ $data->alamat_kantor }}</th>
                                </tr>
                                <tr>
                                    <td>Status Perkawinan</td>
                                    <td class="text-center">{{ $data->perkawinan->name }}</th>
                                </tr>
                                <tr>
                                    <td>Legitimasi Perkawinan</td>
                                    <td class="text-center">{{ $data->legitimasi_perkawinan }}</th>
                                </tr>
                                <tr>
                                    <td>Tempat Perkawinan</td>
                                    <td class="text-center">{{ $data->tempat_perkawinan }}</th>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkawinan</td>
                                    <td class="text-center">{{ date('d M Y', strtotime($data->tanggal_perkawinan)) }}</th>
                                </tr>
                            </table>
                          </div>
                    </div>
                </div>
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
