@extends('admin.layouts.master')
@section('title', 'Model F-1 DPD')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Model F-1 DPD</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-file-pdf"></i>
                        Model F-1 DPD
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card card-primary">  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <form action="{{ route('admin.F1.list') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="desa" name="desa" value="{{ $desa }}">
                                    <input type="hidden" id="calon" name="calon" value="{{ $calon }}">
                                    <button class="btn btn-primary btn-round" >
                                        <i class="fas fa-check"></i>
                                        Model F-1 DPD  
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <form action="{{ route('admin.F1.lampiran') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="desa" name="desa" value="{{ $desa }}">
                                    <button class="btn btn-primary btn-round">
                                        <i class="fas fa-check"></i>
                                        Lampiran F-1 DPD  
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection