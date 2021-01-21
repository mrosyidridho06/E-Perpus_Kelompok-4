@extends('layouts.dashboard')

@section('title', 'Perpustakaan')

@section('style')
<style>
    .page-item.active .page-link {
        color: #FFF !important;
        background-color: #1E9FF2 !important;
        border-color: #1E9FF2 !important;
    }

    .pagination .page-lin {
        color: blue !important;
    }
</style>
@endsection

@section('content')
@if(session('ERR'))
<div class="alert alert-danger" role="alert">
    {{ session('ERR') }}
</div>
@endif
@if(session('OK'))
<div class="alert alert-success" role="alert">
    {{ session('OK') }}
</div>
@endif
<h1>Selamat Datang, {{ Auth::user()->name }}</h1>
{{-- <h1>Selamat Datang, {{ Auth::user()->name }}</h1> --}}
{{-- <h1>Selamat Datang, {{ $buku }}</h1>
<h1>Selamat Datang, {{ $bukuDipinjam }}</h1>
<h1>Selamat Datang, {{ $anggota }}</h1> --}}
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Anggota Terdaftar</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <h1>{{$anggota}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buku Perpustakaan</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <h1>{{$buku}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buku Dipinjam</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <h1>{{$bukuDipinjam}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection