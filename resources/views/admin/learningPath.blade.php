@extends('layouts.dashboard_layout')
@section('learningPath-act', 'active')
@section('title', 'Admin - Learning Path | D4 TRPL Site')
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

        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif

    <h5>Daftar Learning Path</h5>
    <button class="btn btn-outline-info mb-2" data-toggle="modal" data-target="#lp"><span data-feather="plus"></span> Tambah Learning Path</button>

    <!-- Modal -->
    <div class="modal fade" id="lp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="lpLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lpLabel">Tambah Learning Path</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/tambahLearningPath')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bp">Nama Learning Path</label>
                        <input type="text" class="form-control" id="bp" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi"></textarea>
                      </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="bahasaPemograman">
                            @foreach ($bahasaPemograman as $item)
                                <option>{{$item->bahasaPemograman}}</option>
                            @endforeach
                          </select>
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
    <div class="row">
    @foreach ($learningPath as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$item->judul}}</h5>
                  <p class="card-text">{{$item->deskripsi}}</p>
                  <a class="btn btn-sm btn-outline-info" href="{{url('learningPath/'.$item->bahasaPemograman)}}"><span data-feather="book-open"></span> Pelajari</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>



    <h5>Daftar Bahasa Pemograman</h5>
    <button class="btn btn-outline-info mb-2" data-toggle="modal" data-target="#staticBackdrop"><span data-feather="plus"></span> Tambah bahasa pemograman</button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Bahasa Pemograman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/tambahBahasaPemograman')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bp">Nama bahasa pemograman</label>
                        <input type="text" class="form-control" id="bp" name="bahasaPemograman">
                    </div>
                    <h6>Topik 1 dalam bahasa pemograman ini</h6>
                    <div class="form-group">
                        <label for="judul">Judul Topik 1</label>
                        <input type="text" class="form-control" id="judul" aria-describedby="jdulHelp" name="judul">
                        <small id="jdulHelp" class="form-text text-muted">Masukkan judul Topik 1 dalam bahasa pemograman ini</small>
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
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Bahasa Pemograman</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bahasaPemograman as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->bahasaPemograman}}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{url('learningPath/detail/'.$item->id)}}"><span data-feather="settings"></span> Detail</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
