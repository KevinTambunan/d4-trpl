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
@section('content')
    <div class="fluid-container">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-link active" id="nav-mahasiswa-tab" data-toggle="tab" href="#nav-mahasiswa" role="tab" aria-controls="nav-mahasiswa" aria-selected="true">Mahasiswa</a>
              <a class="nav-link" id="nav-dosen-tab" data-toggle="tab" href="#nav-dosen" role="tab" aria-controls="nav-dosen" aria-selected="false">Dosen</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-mahasiswa" role="tabpanel" aria-labelledby="nav-mahasiswa-tab">
                {{-- mahasiswa --}}
                <table class="table mt-3">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col"><span data-feather="mail"></span>Email</th>
                        <th scope="col"><span data-feather="facebook"></span>Facebook</th>
                        <th scope="col"><span data-feather="twitter"></span>Twitter</th>
                        <th scope="col"><span data-feather="instagram"></span>Instagram</th>
                        <th scope="col"><span data-feather="youtube"></span>Youtube</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->facebook}}</td>
                            <td>{{$item->twiter}}</td>
                            <td>{{$item->Instagram}}</td>
                            <td>{{$item->youtube}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="tab-pane fade" id="nav-dosen" role="tabpanel" aria-labelledby="nav-dosen-tab">
                {{-- dosen --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-info btn-sm mt-2" data-toggle="modal" data-target="#staticBackdrop">
                    <span data-feather="plus"></span> Tambahkan Dosen
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-signin" method="POST" action="{{ url('admin/tambahkanDosen') }}">
                                    @csrf
                                    <div class="text-center mb-2">
                                        <img src="{{asset('assets/gambar/logo/logo (2).png')}}" alt="" width="130" height="130">
                                    </div>
                                    <input name="role" value="dosen" type="hidden">
                                    <div class="form-label-group">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-top-0 border-left-0 border-right-0" style="border-bottom: 3px solid rgb(34, 148, 168)" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                                        <label for="name">Name</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-label-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-left-0 border-right-0" style="border-bottom: 3px solid rgb(34, 148, 168)" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                                        <label for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror border-top-0 border-left-0 border-right-0" style="border-bottom: 3px solid rgb(34, 148, 168)" name="password" placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-label-group">
                                        <input placeholder="Password Confirm" id="password-confirm" type="password" class="form-control border-top-0 border-left-0 border-right-0" style="border-bottom: 3px solid rgb(34, 148, 168)" name="password_confirmation" required autocomplete="new-password">
                                        <label for="password-confirm">Konfirmasi Password</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-info">Tambahkan</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
                <table class="table mt-3">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col"><span data-feather="mail"></span>Email</th>
                        <th scope="col"><span data-feather="facebook"></span>Facebook</th>
                        <th scope="col"><span data-feather="twitter"></span>Twitter</th>
                        <th scope="col"><span data-feather="instagram"></span>Instagram</th>
                        <th scope="col"><span data-feather="youtube"></span>Youtube</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->facebook}}</td>
                            <td>{{$item->twiter}}</td>
                            <td>{{$item->Instagram}}</td>
                            <td>{{$item->youtube}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
@endsection
