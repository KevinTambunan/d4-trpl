@extends('layouts.dashboard_layout')

@section('title', 'Mahasiswa - Notes | D4 TRPL Site')

@section('notes-act', 'active')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/mahasiswa/notes/any')}}">Notes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daftar Notes</li>
@endsection

<link rel="stylesheet" href="{{asset('assets/css/notes.css')}}">
@section('content')
    <div class="fluid-container">
        <div class="row">
            <div class="col-5">
                <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    @endif
                    <h5 class="bd-highlight judul-italic-20px text-body">Your Notes </h5>
                    <a class="nav-link ml-auto judul-italic-20px text-muted" style="margin-top:-29px" id="addNewNotes-tab" data-toggle="pill" href="#addNewNotes" role="tab" aria-controls="addNewNotes" aria-selected="false"><span data-feather="plus-circle"></span> Add New </a>
                    <div class="form-group">
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Filter
                            </button>
                            <div class="dropdown-menu mt-2 border-0" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{url('/mahasiswa/notes/terbaru')}}">Terbaru Dibuat</a>
                              <a class="dropdown-item" href="{{url('/mahasiswa/notes/terlama')}}">Terlama Dibuat</a>
                            </div>
                          </div>
                    </div>
                    {{-- add new --}}


                    @if (count($notes) <= 0)
                        <h4>Anda tidak punya note</h4>
                    @elseif (count($notes) == 1)
                        @php
                            $date = $note->created_at;
                            $date = $date->format('d-F-Y H:i');
                        @endphp
                        <div class="nav-link notes-nav" id="v-pills-{{$note->note_id}}-tab" data-toggle="pill" href="#v-pills-{{$note->note_id}}" role="tab" aria-controls="v-pills-{{$note->note_id}}" aria-selected="true">
                            <span>{{$date}}</span>
                            <h4>{{$note->judul}}</h4>
                            <span style="overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 3; /* number of lines to show */
                            -webkit-box-orient: vertical;">{{$note->deskripsi}}</span>
                        </div>
                    @elseif (count($notes) > 1)
                        @foreach ($notes as $item)
                            @php
                                $date = $item->created_at;
                                $date = $date->format('d-F-Y H:i');
                            @endphp
                            <div class="nav-link notes-nav note-hover" id="v-pills-{{$item->note_id}}-tab" data-toggle="pill" href="#v-pills-{{$item->note_id}}" role="tab" aria-controls="v-pills-{{$item->note_id}}" aria-selected="true">
                                <span>{{$date}}</span>
                                <h4>{{$item->judul}}</h4>
                                <span style="overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 3; /* number of lines to show */
                                -webkit-box-orient: vertical;"><?= $item->deskripsi ?></span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-7 tab-side ml-auto">
                <div class="tab-content" id="v-pills-tabContent">
                    {{-- add new --}}
                    <div class="tab-pane fade show active" id="addNewNotes" role="tabpanel" aria-labelledby="addNewNotes-tab">
                        <form class="form-signin" method="POST" action="{{ url('mahasiswa/newNotes/'.Auth()->id())}}">
                            @csrf
                            <div class="form-label-group">
                                <label for="judulNote"><b>Judul Note</b></label>
                                <textarea type="text" id="judulNote" rows="2" class="form-control @error('judulNote') is-invalid @enderror" name="judulNote" placeholder="Judul Note" required autofocus>{{ old('judulNote') }}</textarea>
                                @error('judulNote')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="visibility" class="mt-1"><b>Visibilty</b></label>
                                <select class="form-control" id="visibility" name="visibility">
                                  <option>Private</option>
                                  <option>Public</option>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <label for="deskripsiNote"><b>Deksripsi Note</b></label>
                                <textarea name="deskripsiNote" class="form-control @error('deskripsiNote') is-invalid @enderror" id="deskripsiNote" rows="15" placeholder="Deskripsikan Note anda disini">{{old('deskripsiNote')}}</textarea>
                                @error('deskripsiNote')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block fonts-quicsand mt-3 text-white">
                                Buat Note
                            </button>
                        </form>
                    </div>

                    @if (count($notes) <= 0)
                    {{-- jika note  --}}
                    @elseif (count($notes) == 1)
                        @php
                            $date = $note->created_at;
                            $date = $date->format('d-F-Y H:i');
                        @endphp
                        <div class="tab-pane fade" id="v-pills-{{$note->note_id}}" role="tabpanel" aria-labelledby="v-pills-{{$note->note_id}}-tab">

                            <div class="media">
                                <div class="media-body">
                                    <span>{{$date}}
                                        @if ($note->visibility == 'Private')
                                            <span class="badge rounded-pill bg-info p-1 text-white"> <i class="fas fa-eye-slash"></i> Private</span>
                                        @elseif ($note->visibility == 'Public')
                                            <span class="badge rounded-pill bg-success p-1 text-white"> <i class="fas fa-eye"></i> Public</span>
                                        @endif
                                    </span>
                                    <h4>{{$note->judul}}</h4>
                                </div>
                                <div class="dropdown mr-5">
                                    <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span data-feather="settings"></span>
                                    </a>

                                    <div class="dropdown-menu mr-3 border-0" aria-labelledby="dropdownMenuLink">
                                        <form action="/mahasiswa/deleteNote/{{$note->note_id}}" method="post">
                                            @csrf
                                            <button class="btn dropdown-item" type="submit"> <span data-feather="trash-2"></span> Hapus</button>
                                        </form>
                                        <a href="" class="ml-2 btn" data-toggle="modal" data-target="#staticBackdrop{{$note->note_id}}" role="button"><span data-feather="edit-3"></span> Edit</a>
                                    </div>
                                  </div>
                            </div>
                            <div>
                                <span>
                                    <?= $note->deskripsi ?>
                                </span>
                            </div>
                        </div>
                    @elseif (count($notes) > 1)
                    {{-- jika notes --}}
                        @foreach ($notes as $item)
                            @php
                                $date = $item->created_at;
                                $date = $date->format('d-F-Y H:i');
                            @endphp
                            <div class="tab-pane fade" id="v-pills-{{$item->note_id}}" role="tabpanel" aria-labelledby="v-pills-{{$item->note_id}}-tab">
                                <div class="media">
                                    <div class="media-body">
                                        <span>{{$date}}
                                            @if ($item->visibility == 'Private')
                                                <span class="badge rounded-pill bg-info p-1 text-white"> <i class="fas fa-eye-slash"></i> Private</span>
                                            @elseif ($item->visibility == 'Public')
                                                <span class="badge rounded-pill bg-success p-1 text-white"> <i class="fas fa-eye"></i> Public</span>
                                            @endif
                                        </span>
                                        <h4>{{$item->judul}}</h4>
                                    </div>
                                    <div class="dropdown mr-5">
                                        <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span data-feather="settings"></span>
                                        </a>

                                        <div class="dropdown-menu mr-3 border-0" aria-labelledby="dropdownMenuLink">
                                            <form action="/mahasiswa/deleteNote/{{$item->note_id}}" method="post">
                                                @csrf
                                                <button class="btn dropdown-item" type="submit"> <span data-feather="trash-2"></span> Hapus</button>
                                            </form>
                                            <a href="" class="ml-2 btn" data-toggle="modal" data-target="#staticBackdrop{{$item->note_id}}" role="button"><span data-feather="edit-3"></span> Edit</a>
                                        </div>
                                      </div>
                                </div>
                                <div>
                                    <span>
                                        <?= $item->deskripsi ?>
                                    </span>
                                </div>
                            </div>
                              <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{$item->note_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{$item->note_id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdrop{{$item->note_id}}Label">Edit Note</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-signin" method="POST" action="{{ url('mahasiswa/editNotes/'.$item->note_id)}}">
                                            @csrf
                                            <div class="form-label-group">
                                                <label for="judulNote"><b>Judul Note</b></label>
                                                <textarea type="text" id="judulNote" rows="2" class="form-control @error('judulNote') is-invalid @enderror" name="judulNote" placeholder="Judul Note" required autofocus>{{ $item->judul }}</textarea>
                                                @error('judulNote')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="visibility" class="mt-1"><b>Visibilty</b></label>
                                                <select class="form-control" id="visibility" name="visibility">
                                                  <option>Private</option>
                                                  <option>Public</option>
                                                </select>
                                            </div>
                                            <div class="form-label-group">
                                                <label for="deskripsiNote"><b>Deksripsi Note</b></label>
                                                @php
                                                    $input = $item->deskripsi;
                                                    $pecah = explode("<p>", $input);
                                                    $text = "";
                                                        for ($i=0; $i<=count($pecah)-1; $i++)
                                                        {
                                                            $part = str_replace($pecah[$i], " ". $pecah[$i] ." ", $pecah[$i]);
                                                            $text .= $part;
                                                        }
                                                    $input2 = $text;
                                                    $pecah2 = explode("</p>", $input2);
                                                    $text2 = "";
                                                        for ($i=0; $i<=count($pecah2)-1; $i++)
                                                        {
                                                            $part2 = str_replace($pecah2[$i], "\n". $pecah2[$i] ."\n", $pecah2[$i]);
                                                            $text2 .= $part2;
                                                        }
                                                @endphp
                                                <textarea name="deskripsiNote" class="form-control @error('deskripsiNote') is-invalid @enderror" id="deskripsiNote" rows="12" placeholder="Deskripsikan Note anda disini"><?= $text2 ?></textarea>
                                                @error('deskripsiNote')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
          </div>
    </div>
@endsection
