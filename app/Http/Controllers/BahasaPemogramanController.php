<?php

namespace App\Http\Controllers;

use App\Models\BahasaPemograman;
use App\Models\BPTopik;
use Illuminate\Http\Request;

class BahasaPemogramanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'bahasaPemograman' => 'required|max:500|string',
            'judul' => 'required|string|max:500',
            'link' => 'required|string',
            'estimasi' => 'required|integer',
            'level' => 'required'
        ]);

        $bp = BahasaPemograman::get();
        $bp_id = end($bp);

        $bahasaPemograman = new BahasaPemograman;

        $bahasaPemograman->bahasaPemograman = $request->bahasaPemograman;
        $bahasaPemograman->save();




        $bp_topik = new BPTopik;
        $bp_topik->bahasa_pemograman_id = $bp_id[0]->id+1;
        $bp_topik->judul = $request->judul;
        $bp_topik->link = $request->link;
        $bp_topik->estimasi = $request->estimasi;
        $bp_topik->level = $request->level;

        $bp_topik->save();
        return redirect('admin/learningPath')->with('status', 'bahasa pemomgraman berhasil ditambahkan');
    }
    public function tambahTopikBP(Request $request)
    {
        $request->validate([
            'bp_id' => 'required|max:500|string',
            'judul' => 'required|string|max:500',
            'link' => 'required|string',
            'estimasi' => 'required|integer',
            'level' => 'required'
        ]);

        $bp_topik = new BPTopik;
        $bp_topik->bahasa_pemograman_id = $request->bp_id;
        $bp_topik->judul = $request->judul;
        $bp_topik->link = $request->link;
        $bp_topik->estimasi = $request->estimasi;
        $bp_topik->level = $request->level;

        $bp_topik->save();
        return redirect('learningPath/detail/'.$request->bp_id)->with('status', 'bahasa pemomgraman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahasaPemograman  $bahasaPemograman
     * @return \Illuminate\Http\Response
     */
    public function show(BahasaPemograman $bahasaPemograman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahasaPemograman  $bahasaPemograman
     * @return \Illuminate\Http\Response
     */
    public function edit(BahasaPemograman $bahasaPemograman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BahasaPemograman  $bahasaPemograman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BahasaPemograman $bahasaPemograman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahasaPemograman  $bahasaPemograman
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahasaPemograman $bahasaPemograman)
    {
        //
    }
}
