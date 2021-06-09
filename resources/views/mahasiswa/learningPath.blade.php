@extends('layouts.dashboard_layout')
@section('learningPath-act', 'active')
@section('title', 'Mahasiswa - Learning Path | D4 TRPL Site')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/admin/learningPath')}}">Learning Path</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daftar Learning Path</li>
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
@section('content')


    <h5>Daftar Learning Path</h5>
    <div class="row">
    @foreach ($learningPath as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$item->judul}}</h5>
                  <p class="card-text">{{$item->deskripsi}}</p>
                  <a class="btn btn-sm btn-outline-info" href="{{url('learningPt/'.$item->bahasaPemograman)}}"><span data-feather="book-open"></span> Pelajari</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>



@endsection
