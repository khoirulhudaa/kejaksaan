@extends('admin.layouts.master')
@section('title', 'Pencegahan dan Penangkalan')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pencegahan dan Penangkalan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-file-pdf"></i>
                        Pencegahan dan Penangkalan
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {!! session('success') !!}
                    </div>
                </div>
            @endif

            <div class="section-body">
                <div class="card card-success">  
                    <div class="card-header">
                        <a class="btn btn-success" href="{{ route('admin.pencegahan.filter') }}">
                            <i class="fas fa-print"></i>
                            Download
                        </a>
                        @if (auth()->user()->isAdmin())
                        <a class="btn btn-success ml-auto" href="{{ route('admin.pencegahan.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </a>
                        @elseif (auth()->user()->isOperator())
                        <a class="btn btn-success ml-auto" href="{{ route('admin.pencegahan.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="ebook-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 200px;">dentitas Terdakwa</th>
                                        <th style="width: : 200px;overflow: hidden">Pasal yang disangkakan</th>
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
            $('#ebook-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.pencegahan.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'biodata',
                        name: 'biodata',
                    },
                    {
                        data: 'pasal',
                        name: 'pasal'
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

            // Delete one item
            $('body').on('click', '#btn-delete', function(){
                var id = $(this).val();
                var ebook = $(this).data('ebook');
                swal("Peringatan!", "Apakah anda yakin?", "warning", {
                    buttons: {
                        cancel: "Tidak!",
                        ok: {
                            text: "Ya",
                            value: "ok"
                        }
                    },
                }).then((value) => {
                    switch (value) {
                        case "ok" :
                            $.ajax({
                                type: "DELETE",
                                url: '{{ route('admin.pencegahan.index') }}' + '/' + id,
                                success: function(data) {
                                    $('#ebook-table').DataTable().draw(false);
                                    $('#ebook-table').DataTable().on('draw', function() {
                                        $('[data-toggle="tooltip"]').tooltip();
                                    });

                                    swal({
                                        title: "Selamat!",
                                        text: "Data berhasil di hapus",
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
