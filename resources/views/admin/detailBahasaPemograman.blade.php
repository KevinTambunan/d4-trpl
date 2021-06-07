@extends('layouts.dashboard_layout')
@section('learningPath-act', 'active')
@section('title', 'Admin - Learning Path | D4 TRPL Site')
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

        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">{{$data[0]->bahasaPemograman->bahasaPemograman}}</h5>
              <p class="card-text">Bahasa Pemograman. Dibuat di website ini pada : {{$data[0]->bahasaPemograman->created_at}}</p>
              <button class="btn btn-outline-info mb-2" data-toggle="modal" data-target="#staticBackdrop"><span data-feather="plus"></span> Tambah topik dalam bahasa pemograman ini</button>
            </div>
          </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah topik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/tambahTopikBP')}}" method="post">
                    @csrf
                    <input type="hidden" name="bp_id" id="" value="{{$data[0]->bahasaPemograman->id}}">
                    <div class="form-group">
                        <label for="judul">Judul Topik </label>
                        <input type="text" class="form-control" id="judul" aria-describedby="jdulHelp" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="estimasi">Estimasi membaca Topik 1 (dalam menit)</label>
                        <input type="number" class="form-control" id="estimasi" name="estimasi">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="level">
                            <option>Beginer</option>
                            <option>Medium</option>
                            <option>Hard</option>
                            <option>Expert</option>
                          </select>
                      </div>
                    <div class="form-group">
                        <label for="link">link membaca Topik 1</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tambahkan</button>
            </div>
                </form>
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
