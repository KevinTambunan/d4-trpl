@extends('layouts.dashboard_layout')
@section('daftarUser-act', 'active')
@section('title', 'Admin - Daftar Mahasiswa | D4 TRPL Site')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/admin/daftarUser')}}">Daftar User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Semua User</li>
@endsection
{{-- css kami --}}
<link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
</style>
