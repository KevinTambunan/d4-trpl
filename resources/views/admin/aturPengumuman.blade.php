@extends('layouts.dashboard_layout')
@section('atur-pengumuman-act', 'active')
@section('title', 'Admin - AturPengumuman | D4 TRPL Site')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/admin/aturPengumuman')}}">Atur Pengumuman</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daftar Pengumuman</li>
@endsection

@section('content')
<div class="fluid-container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-info btn-sm mt-2 mb-2" data-toggle="modal" data-target="#staticBackdrop">
        <span data-feather="plus"></span> Tambahkan Pengumuman
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" method="POST" action="{{ url('admin/tambahkanPengumuman') }}">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="judul" name="judul">
                          </div>
                          <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="10" name="deskripsi" placeholder="deskripsi"></textarea>
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
    <div class="row">
        @foreach ($pengumuman as $item)
            <div class="col-md-4" >
                <div class="card mx-auto mb-3 border-left-0 border-right-0 border-bottom-0" style="border-top: 5px solid rgb(114, 212, 147)">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{asset('assets/gambar/profile/'.$item->foto)}}" class="rounded-circle" alt="..." width="75" height="75">
                            </div>
                            <div class="col ml-3">
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

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
