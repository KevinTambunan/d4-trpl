@extends('layouts.dashboard_layout')

@section('title', 'Mahasiswa - Profile | D4 TRPL Site')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/mahasiswa/profile')}}">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data dirimu</li>
@endsection

@section('profile-act', 'active')

@section('content')
    <div class="fluid-container">
        <div class="row">
            <div class="col-md-6">
                <div class="data-diri">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    @endif
                    <div class="media">
                        <img src="{{asset('assets/gambar/profile/'.$user->foto)}}" class="align-self-start mr-3 rounded-circle" height="150">
                        <div class="media-body">
                            <h5 class="mt-0">{{$user->name}}</h5>
                            <p><span data-feather="mail"></span> {{$user->email}}</p>
                            <p><span data-feather="facebook"></span> {{$user->facebook}}</p>
                            <p><span data-feather="twitter"></span> {{$user->twiter}}</p>
                            <p><span data-feather="instagram"></span> {{$user->Instagram}}</p>
                            <p><span data-feather="youtube"></span> {{$user->youtube}}</p>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="settings"></span>
                            </a>

                            <div class="dropdown-menu border-0" aria-labelledby="dropdownMenuLink">
                                <a href="" class="btn" data-toggle="modal" data-target="#staticBackdrop" role="button"><span data-feather="edit-3"></span> Edit</a>
                                <form action="{{'/mahasiswa/deleteProfile/'.$user->id}}" method="post">
                                    @csrf
                                    <button class="btn dropdown-item" type="submit"><span data-feather="trash-2" style="margin-left: -12px"></span> Default</button>
                                </form>
                            </div>
                        </div>
                         <!-- Modal -->
                         <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Note</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-signin" method="POST" action="{{ url('mahasiswa/editProfile/'.$user->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook">facebook</label>
                                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{$user->facebook}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="twiter">twiter</label>
                                            <input type="text" class="form-control" id="twiter" name="twiter" value="{{$user->twiter}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">instagram</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{$user->Instagram}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube">youtube</label>
                                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{$user->youtube}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @foreach ($fotoProfile as $item)
                    <div class="col-md-4">
                        <div class="card text-white border-0 mb-2">
                            <form action="{{url('/mahasiswa/profile/gantiFoto/'.$user->id.'/'.$item->foto)}}" method="post">
                                @csrf
                                <img src="{{asset('assets/gambar/profile/'.$item->foto)}}" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <button class="btn btn-outline-info rounded-circle " title="Jadikan Sebagai Foto Profile anda"><span data-feather="arrow-up"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
