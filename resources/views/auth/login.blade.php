@extends('layouts.welcome_layout')

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
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 mt-3 ">
            <div class="border-0">
                <ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active btn-outline-info" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link btn-outline-info" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-2">
                                <img src="{{asset('assets/gambar/logo/logo (2).png')}}" alt="" width="130" height="130">
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror border-top-0 border-left-0 border-right-0" style="border-bottom: 3px solid rgb(34, 148, 168)" name="email" value="{{ old('email') }}" placeholder="Email address" required>
                                <label for="inputEmail">Email address</label>
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

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-info btn-block">
                                {{ __('Login') }}
                            </button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form class="form-signin" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="text-center mb-2">
                                <img src="{{asset('assets/gambar/logo/logo (2).png')}}" alt="" width="130" height="130">
                            </div>
                            <input name="role" value="admin" type="hidden">
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

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-info btn btn-block fonts-quicsand">
                                {{ __('Register') }}
                            </button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection
