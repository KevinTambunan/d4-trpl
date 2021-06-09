<?php

namespace App\Http\Controllers;

use App\Models\BahasaPemograman;
use App\Models\LearningPath;
use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahasaPemograman = BahasaPemograman::get();
        $learningPath = learningPath::get();
        return view('admin.learningPath', ["bahasaPemograman" => $bahasaPemograman, "learningPath" => $learningPath]);
    }
    public function Mindex()
    {
        $bahasaPemograman = BahasaPemograman::get();
        $learningPath = learningPath::get();
        return view('mahasiswa.learningPath', ["bahasaPemograman" => $bahasaPemograman, "learningPath" => $learningPath]);
    }
    public function MbpDetail($bp_id)
    {
        $data = BahasaPemograman::find($bp_id)->BPTopik->sortByDesc('created_at');
        return view('mahasiswa.detailBahasaPemograman', ["data" => $data]);
    }
    public function MbelajarBP($bpNama)
    {
        $bp = BahasaPemograman::where('bahasaPemograman', $bpNama)->first();
        $data = BahasaPemograman::find($bp->id)->BPTopik->sortByDesc('created_at');
        return view('mahasiswa.detailBahasaPemograman', ["data" => $data]);
    }
    public function bpDetail($bp_id)
    {
        $data = BahasaPemograman::find($bp_id)->BPTopik->sortByDesc('created_at');
        return view('admin.detailBahasaPemograman', ["data" => $data]);
    }
    public function belajarBP($bpNama)
    {
        $bp = BahasaPemograman::where('bahasaPemograman', $bpNama)->first();
        $data = BahasaPemograman::find($bp->id)->BPTopik->sortByDesc('created_at');
        return view('admin.detailBahasaPemograman', ["data" => $data]);
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
            'judul' => 'required|string',
            'deskripsi' => 'required|string|min:5',
            'bahasaPemograman' => 'required'
        ]);

        $learningPath = new LearningPath;

        $learningPath->judul = $request->judul;
        $learningPath->deskripsi = $request->deskripsi;
        $learningPath->bahasaPemograman = $request->bahasaPemograman;

        $learningPath->save();

        return redirect('admin/learningPath')->with('status', 'Learning Path berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LearningPath  $learningPath
     * @return \Illuminate\Http\Response
     */
    public function show(LearningPath $learningPath)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LearningPath  $learningPath
     * @return \Illuminate\Http\Response
     */
    public function edit(LearningPath $learningPath)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LearningPath  $learningPath
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearningPath $learningPath)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearningPath  $learningPath
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearningPath $learningPath)
    {
        //
    }
}
