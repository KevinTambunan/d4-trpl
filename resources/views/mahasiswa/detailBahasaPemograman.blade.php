@extends('layouts.dashboard_layout')
@section('learningPath-act', 'active')
@section('title', 'Mahasiswa - Learning Path | D4 TRPL Site')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/admin/learningPath')}}">Learning Path</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Bahasa Pemograman</li>
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

    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">{{$data[0]->bahasaPemograman->bahasaPemograman}}</h5>
              <p class="card-text">Bahasa Pemograman. Dibuat di website ini pada : {{$data[0]->bahasaPemograman->created_at}}</p>
            </div>
          </div>
    </div>

    <div class="row mt-2">
        @foreach ($data as $item)
        <div class="col-md-4 mt-2">
            <div class="card border-right-0 border-left-0 border-bottom-0" style="border-top: 4px solid rgb(195, 241, 241)">
                <div class="card-body">
                  <h5 class="card-title">{{$item->judul}}</h5>
                  <p class="card-text">Sub topik ke-{{$loop->iteration}} dalam bahasa pemograman {{$item->bahasaPemograman->bahasaPemograman}}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><span data-feather="clock"></span> Estimasi : {{$item->estimasi}} Menit</li>
                  <li class="list-group-item"><span data-feather="activity"></span> Level : {{$item->level}}</li>
                  <li class="list-group-item"><span data-feather="calendar"></span> Dibuat Pada : {{$item->created_at}}</li>
                </ul>
                <div class="card-body">
                  Baca di : <a href="{{$item->link}}" class="card-link">{{$item->link}}</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>

@endsection
