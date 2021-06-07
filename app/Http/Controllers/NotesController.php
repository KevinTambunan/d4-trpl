<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter)
    {
        $user_id = Auth::User()->id;
        if($filter == 'any'){
            $notes = User::find($user_id)->note->sortByDesc('created_at');
        }else if($filter == 'terbaru'){
            $notes = User::find($user_id)->note->sortByDesc('created_at');
        }else if($filter == 'terlama'){
            $notes = User::find($user_id)->note;
        }else{
            $notes = User::find($user_id)->note->sortByDesc('created_at');
        }
        $note = User::find($user_id)->note->first();
        return view('mahasiswa.notes', ['notes'=>$notes, 'note'=>$note]);
    }
    public function filter($request)
    {
        dd($request);
        $notes = Note::all()->sortByDesc('created_at');
        $note =  Note::first();

        return view('mahasiswa.notes', ['notes'=>$notes, 'note'=>$note]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userID)
    {
        $request->validate([
            'judulNote' => 'required|max:255',
            'deskripsiNote' => 'required',
            'visibilty' => 'in_array:public,private',
        ]);

        $input = $request->deskripsiNote;
        $pecah = explode("\r\n\r\n", $input);
        $text = "";
            for ($i=0; $i<=count($pecah)-1; $i++)
            {
                $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
                $text .= $part;
            }

        $n = Note::get();
        $en = end($n);
        $end = end($en);



        $note = new Note;

        $note->user_Id = $userID;
        $note->judul = $request->judulNote;
        $note->deskripsi= $text;
        $note->visibility = $request->visibility;

        $note->save();

        if($request->visibility == 'Public'){
            $pengumuman = new Pengumuman;

            $pengumuman->user_Id = $userID;
            $pengumuman->note_id = $end->note_id + 1;
            $pengumuman->judul = $request->judulNote;
            $pengumuman->deskripsi= $text;
            $pengumuman->suka= 1;
            $pengumuman->tidak_suka= 0;

            $pengumuman->save();
        }

        return redirect('/mahasiswa/notes/daftarNotes')->with('status', 'Note berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $note_id)
    {
        $request->validate([
            'judulNote'=> 'required|max:255',
            'deskripsiNote' => 'required',
            'visibility' => 'required'
        ]);

        $input = $request->deskripsiNote;
        $pecah = explode("\r\n\r\n", $input);
        $text = "";
            for ($i=0; $i<=count($pecah)-1; $i++)
            {
                $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
                $text .= $part;
            }

            $note = Note::where('note_id', $note_id)->first();
            if($note->visibility == 'Public'){
                if($request->visibility == 'Private'){
                    Pengumuman::where('note_id', $note_id)->delete();
                }
            }elseif ($note->visibility == 'Private'){
                if($request->visibility == 'Public'){
                    $pengumuman = new Pengumuman;

                    $pengumuman->user_Id = $note->user_id;
                    $pengumuman->note_id = $note->note_id;
                    $pengumuman->judul = $request->judulNote;
                    $pengumuman->deskripsi= $text;
                    $pengumuman->suka= 1;
                    $pengumuman->tidak_suka= 0;

                    $pengumuman->save();
                }
            }
        Note::where('note_id', $note_id)->update([
            'judul' => $request->judulNote,
            'deskripsi' => $text,
            'visibility' => $request->visibility
        ]);

        return redirect('/mahasiswa/notes/any')->with('status','Notes dengan judul ' . $request->judulNote . ' telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($note_id)
    {
        $note = Note::where('note_id', $note_id)->first();
            if($note->visibility == 'Public'){
                Pengumuman::where('note_id', $note_id)->delete();
            }

        Note::where('note_id',$note_id)->delete();
        return redirect('/mahasiswa/notes/any')->with('status', 'notes berhasil di hapus');
    }
}
