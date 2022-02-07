@extends('admin.layouts.master')
@section('title', 'Kabupaten')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kabupaten</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fas fa-map"></i>
                        Kabupaten
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-primary">
                    <br>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover" id="company-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kabupaten</th>
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
                ajax: '{{ route('admin.kabupaten.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'city_name',
                        name: 'city_name'
                    },
                ],
                buttons: [],
                order: []
            });

            $('#company-table').DataTable().on('draw', function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        });
    </script>
@endsection
