@extends('admin.layouts.master')
@section('title', 'Biodata WNA')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="company-form">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="country_id">Asal Negara</label>
                            <select class="select2 form-control form-control-sm @error('country_id') is-invalid @enderror" name="country_id" id="country_id">
                                <option value="" selected disabled>-- Pilih Asal Negara --</option>
                                    @foreach ($country as $data)
                                        <option value="{{ $data->id }}" {{ old('country_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                    @endforeach
                            </select>
                            <div class="invalid-feedback" id="valid-country_id">{{ $errors->first('country_id') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="pasport">No. Pasport <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="pasport" name="pasport"
                                placeholder="Masukkan nomor pasport" autocomplete="off">
                            <div class="invalid-feedback" id="valid-pasport"></div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan nama lengkap" autocomplete="off">
                            <div class="invalid-feedback" id="valid-name"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                    <button type="button" id="btn-save" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biodata WNA</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fas fa-map"></i>
                        Biodata WNA
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-success">
                    <div class="card-header">
                        @if (auth()->user()->isAdmin())
                        <button class="btn btn-success ml-auto" id="btn-add">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </button>
                        @elseif (auth()->user()->isOperator())
                        <button class="btn btn-success ml-auto" id="btn-add">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </button>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover" id="company-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>No. Pasport</th>
                                        <th>Nama</th>
                                        <th>Asal Negara</th>
                                        @if (auth()->user()->isAdmin())
                                            <th>Aksi</th>
                                        @elseif (auth()->user()->isOperator())
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/modules/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initializing DataTable
            $('#company-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.wna.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'pasport',
                        name: 'pasport'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    @if (auth()->user()->isAdmin())
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    }
                    @elseif (auth()->user()->isOperator())
                         {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    }
                    @endif
                ],
                buttons: [],
                order: []
            });

            $('#company-table').DataTable().on('draw', function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            // Validation on form
            $('body').on('keyup', '#name, #pasport', function() {
                var test = $(this).val();
                if (test == '') {
                    $(this).removeClass('is-valid is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            // Open Modal to Add new Category
            $('#btn-add').click(function() {
                $('#formModal').modal('show');
                $('.modal-title').html('Tambah Data');
                $('#company-form').trigger('reset');
                $('#btn-save').html('<i class="fas fa-check"></i> Simpan');
                $('#company-form').find('.form-control').removeClass('is-invalid is-valid');
                $('#btn-save').val('save').removeAttr('disabled');
            });

            // Store new company or update company
            $('#btn-save').click(function() {
                var formData = {
                    pasport: $('#pasport').val(),
                    name: $('#name').val(),
                    country: $('#country_id').val()
                };


                var state = $('#btn-save').val();
                var type = "POST";
                var ajaxurl = '{{ route('admin.wna.store') }}';
                $('#btn-save').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);

                if (state == "update") {
                    $('#btn-save').html('<i class="fas fa-cog fa-spin"></i> Updating...').attr("disabled", true);
                    var id = $('#id').val();
                    type = "PUT";
                    ajaxurl = '{{ route('admin.wna.store') }}' + '/' + id;
                }

                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        if (state == "save") {
                            swal({
                                title: "Berhasil!",
                                text: "Data berhasil ditambahkan",
                                icon: "success",
                                timer: 3000
                            });

                            $('#company-table').DataTable().draw(false);
                            $('#company-table').DataTable().on('draw', function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        } else {
                            swal({
                                title: "Berhasil!",
                                text: "Data berhasil di ubah",
                                icon: "success",
                                timer: 3000
                            });

                            $('#company-table').DataTable().draw(false);
                            $('#company-table').DataTable().on('draw', function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        }

                        $('#formModal').modal('hide');
                    },
                    error: function(data) {
                        try {
                            if (state == "save") {
                                if (data.responseJSON.errors.name) {
                                    $('#name').removeClass('is-valid').addClass('is-invalid');
                                    $('#valid-name').removeClass('valid-feedback').addClass('invalid-feedback');
                                    $('#valid-name').html(data.responseJSON.errors.name);
                                }

                                if (data.responseJSON.errors.pasport) {
                                    $('#pasport').removeClass('is-valid').addClass('is-invalid');
                                    $('#valid-pasport').removeClass('valid-feedback').addClass('invalid-feedback');
                                    $('#valid-pasport').html(data.responseJSON.errors.pasport);
                                }

                                if (data.responseJSON.errors.country) {
                                    $('#country_id').removeClass('is-valid').addClass('is-invalid');
                                    $('#valid-country_id').removeClass('valid-feedback').addClass('invalid-feedback');
                                    $('#valid-country_id').html(data.responseJSON.errors.country);
                                }

                                $('#btn-save').html('<i class="fas fa-check"></i> Save Changes');
                                $('#btn-save').removeAttr('disabled');
                            } else {
                                if (data.responseJSON.errors.name) {
                                    $('#name').removeClass('is-valid').addClass('is-invalid');
                                    $('#valid-name').removeClass('valid-feedback').addClass('invalid-feedback');
                                    $('#valid-name').html(data.responseJSON.errors.name);
                                }

                                if (data.responseJSON.errors.pasport) {
                                    $('#pasport').removeClass('is-valid').addClass('is-invalid');
                                    $('#valid-pasport').removeClass('valid-feedback').addClass('invalid-feedback');
                                    $('#valid-pasport').html(data.responseJSON.errors.pasport);
                                }

                                if (data.responseJSON.errors.country) {
                                    $('#country_id').removeClass('is-valid').addClass('is-invalid');
                                    $('#valid-country_id').removeClass('valid-feedback').addClass('invalid-feedback');
                                    $('#valid-country_id').html(data.responseJSON.errors.country);
                                }

                                $('#btn-save').html('<i class="fas fa-check"></i> Update');
                                $('#btn-save').removeAttr('disabled');
                            }
                        } catch {
                            if (state == "save") {
                                swal({
                                    title: "Maaf!",
                                    text: "Terjadi kesalahan, Silahkan coba lagi",
                                    icon: "error",
                                    timer: 3000
                                });
                            } else {
                                swal({
                                    title: "Maaf!",
                                    text: "Terjadi kesalahan, Silahkan coba lagi",
                                    icon: "error",
                                    timer: 3000
                                });
                            }

                            $('#formModal').modal('hide');
                        }
                    }
                });
            });

            // Edit Category
            $('body').on('click', '#btn-edit', function() {
                var id = $(this).val();
                $.get('{{ route('admin.wna.index') }}' + '/' + id + '/edit', function(data) {
                    $('#company-form').find('.form-control').removeClass('is-invalid is-valid');
                    $('#id').val(data.id);
                    $('#pasport').val(data.pasport);
                    $('#name').val(data.name);
                    $('#country_id').val(data.country_id);
                    $('#btn-save').val('update').removeAttr('disabled');
                    $('#formModal').modal('show');
                    $('.modal-title').html('Edit Data');
                    $('#btn-save').html('<i class="fas fa-check"></i> Edit');
                }).fail(function() {
                    swal({
                        title: "Maaf!",
                        text: "Gagal mengambil Data",
                        icon: "error",
                        timer: 3000
                    });
                });
            });

            // Delete company
            $('body').on('click', '#btn-delete', function(){
                var id = $(this).val();
                swal("Peringatan!", "Apakah anda yakin?", "warning", {
                    buttons: {
                        cancel: "Tidak",
                        ok: {
                            text: "Iya",
                            value: "ok"
                        }
                    },
                }).then((value) => {
                    switch (value) {
                        case "ok" :
                            $.ajax({
                                type: "DELETE",
                                url: '{{ route('admin.wna.store') }}' + '/' + id,
                                success: function(data) {
                                    $('#company-table').DataTable().draw(false);
                                    $('#company-table').DataTable().on('draw', function() {
                                        $('[data-toggle="tooltip"]').tooltip();
                                    });

                                    swal({
                                        title: "Berhasil!",
                                        text: "Data berhasil dihapus",
                                        icon: "success",
                                        timer: 3000
                                    });
                                },
                                error: function(data) {
                                    swal({
                                        title: "Maaf!",
                                        text: "Terjadi kesalahan, Silahkan coba lagi",
                                        icon: "error",
                                        timer: 3000
                                    });
                                }
                            });
                        break;

                        default :
                            swal({
                                title: "Oh Ya!",
                                text: "Data aman, jangan khawatir",
                                icon: "info",
                                timer: 3000
                            });
                        break;
                    }
                });
            });
        });
    </script>
@endsection
