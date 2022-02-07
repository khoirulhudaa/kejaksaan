@extends('admin.layouts.master')
@section('title', 'Sistem Informasi Peta Digital')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/css/map.css') }}">
    <style>
      .map {
        position: relative;
        transform: translate(-50%, -50%);
        left: 15%;
        top: 300px;
      }
    </style>
@endsection

@section('content')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Sistem Informasi Peta Digital</h1>
      </div>
      <div class="section-body">
        <div class="card card-success">
            <div class="card-body" style="width: mac-content;display: flex;">
                <section class="map">
                    <div class="wrap-map">
                        <img src="{{ asset('backend/img/yellow.png') }}" alt="full" class="yellow" onclick="yellow()">
                        <img src="{{ asset('backend/img/purple.png') }}" alt="full" class="purple" onclick="purple()">
                        <img src="{{ asset('backend/img/red.png') }}" alt="full" class="red" onclick="red()">
                        <img src="{{ asset('backend/img/green.png') }}" alt="full" class="green" onclick="green()">
                        <img src="{{ asset('backend/img/cream.png') }}" alt="full" class="cream" onclick="cream()">
                    </div>
                </section>
            </div>
        </div>
    </div>
    </section>
  </div>
@endsection


