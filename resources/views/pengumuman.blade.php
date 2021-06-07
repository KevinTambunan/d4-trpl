@extends('layouts.dashboard_layout')
@section('pengumuman-act', 'active')
@section('title', 'All User - Pengumuman | D4 TRPL Site')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/pengumuman')}}">Pengumuman</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daftar Pengumuman</li>
@endsection

@section('content')
<div class="fluid-container">
    <div class="row">
        @foreach ($pengumuman as $item)
            <div class="col-md-4" >
                <div class="card mx-auto mb-3 border-left-0 border-right-0 border-bottom-0" style="border-top: 5px solid rgb(114, 212, 147)">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{asset('assets/gambar/base/'.$item->photo)}}" class="rounded-circle" alt="..." width="75" height="75">
                            </div>
                            <div class="col">
                                <h6></h6>
                                <h5 class="card-title">{{$item->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$item->created_at}}</h6>
                            </div>
                        </div>

                        <h6 class="mt-3">{{$item->judul}}</h6>
                        <p class="card-text"><?= substr($item->deskripsi,0,350) ?></p>
                        <div class="accordion" id="accordionExample">
                            <div class="card  border-0">
                            <div id="collapse{{$item->pengumuman_id}}" class="collapse mt-2" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <p class="card-text"><?= substr($item->deskripsi,350) ?></p>
                            </div>
                            <button class="btn text-center " type="button" data-toggle="collapse" data-target="#collapse{{$item->pengumuman_id}}" aria-expanded="true" aria-controls="collapse{{$item->pengumuman_id}}">
                                <span data-feather="arrow-down"></span><br> Selengkapnya
                            </button>
                            </div>
                    </div>


                    <ul class="list-group list-group-horizontal justify-content-start" style="margin-left: -60px">
                            <li class="list-group-item border-0">
                                <ul style="list-style: none">
                                    <li>
                                        <form action="/pengumuman/aksi/suka/{{$item->pengumuman_id}}" method="post">
                                            @csrf
                                            <button class="card-link btn" type="submit"><span data-feather="thumbs-up"></span></button>
                                        </form>
                                    </li>
                                    <li class="text-center">{{$item->suka}}</li>
                                </ul>
                            </li>
                            <li class="list-group-item border-0"  style="margin-left: -30px">
                                <ul style="list-style: none">
                                    <li>
                                        <form action="/pengumuman/aksi/tidak_suka/{{$item->pengumuman_id}}" method="post">
                                            @csrf
                                            <button class="card-link btn" type="submit"><span data-feather="thumbs-down"></span></i></button>
                                        </form>
                                    </li>
                                    <li class="text-center">{{$item->tidak_suka}}</li>
                                </ul>
                            </li>
                      </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
