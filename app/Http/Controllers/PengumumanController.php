<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\PengumumanUser;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pengumuman = User::join('Pengumuman','user_id','=','id')->get();
        $pengumumanUser = PengumumanUser::get();
        return view('pengumuman', ['pengumuman'=>$pengumuman, 'pengumumanUser'=>$pengumumanUser]);
    }

    public function aturPengumuman()
    {
        $pengumuman = User::join('Pengumuman','user_id','=','id')->get();
        $pengumumanUser = PengumumanUser::get();

        return view('admin.aturPengumuman', ['pengumuman'=>$pengumuman, 'pengumumanUser'=>$pengumumanUser]);
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
        $userID = Auth::user();
        $request->validate([
            'judul' => 'required|string|min:3',
            'deskripsi' => 'required|string|min:10'
        ]);

        $input = $request->deskripsi;
        $pecah = explode("\r\n\r\n", $input);
        $text = "";
            for ($i=0; $i<=count($pecah)-1; $i++)
            {
                $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
                $text .= $part;
            }

        $pengumuman = new Pengumuman;

        $pengumuman->user_Id = $userID->id;
        $pengumuman->note_id = null;
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi= $text;
        $pengumuman->suka= 0;
        $pengumuman->tidak_suka= 0;

        $pengumuman->save();

        return redirect('admin/aturPengumuman')->with('status', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengumuman::where('pengumuman_id', $id)->delete();
        PengumumanUser::where('pengumuman_id', $id)->delete();
        return redirect('admin/aturPengumuman')->with('status', 'Pengumuman berhasil dihapus');
    }

    /**
     * Jika User Suka
     */
    public function aksi($filter, $pengumuman_id)
    {
        $pengumuman = Pengumuman::where('pengumuman_id', $pengumuman_id)->first();
        $ps = PengumumanUser::where([
            ['pengumuman_id', $pengumuman_id],
            ['user_id', Auth::user()->id]
        ])->first();

        if($filter == 'suka'){
            if($ps != null){
                if($ps->feedback == 'tidak_suka'){
                    Pengumuman::where('pengumuman_id', $pengumuman_id)->update([
                        'suka' => $pengumuman->suka + 1,
                        'tidak_suka' => $pengumuman->tidak_suka - 1,
                    ]);

                    PengumumanUser::where([
                        ['pengumuman_id', $pengumuman_id],
                        ['user_id', Auth::user()->id]
                    ])->update([
                        'feedback' => 'suka'
                    ]);
                }

                // kalau feedbacknya udah suka dulu dan diklik suka lagi
            }else{
                Pengumuman::where('pengumuman_id', $pengumuman_id)->update([
                    'suka' => $pengumuman->suka + 1,
                ]);

                $pengumumanSuka = new PengumumanUser;

                $pengumumanSuka->pengumuman_id = $pengumuman_id;
                $pengumumanSuka->user_id = Auth::user()->id;
                $pengumumanSuka->feedback = 'suka';
                $pengumumanSuka->save();
            }
        }elseif($filter == 'tidak_suka'){
            if($ps != null){
                if($ps->feedback == 'suka'){
                    Pengumuman::where('pengumuman_id', $pengumuman_id)->update([
                        'suka' => $pengumuman->suka - 1,
                        'tidak_suka' => $pengumuman->tidak_suka + 1,
                    ]);

                    PengumumanUser::where([
                        ['pengumuman_id', $pengumuman_id],
                        ['user_id', Auth::user()->id]
                    ])->update([
                        'feedback' => 'tidak_suka'
                    ]);
                }

                // kalau feedbacknya udah suka dulu dan diklik suka lagi
            }else{
                Pengumuman::where('pengumuman_id', $pengumuman_id)->update([
                    'tidak_suka' => $pengumuman->tidak_suka + 1,
                ]);

                $pengumumanSuka = new PengumumanUser;

                $pengumumanSuka->pengumuman_id = $pengumuman_id;
                $pengumumanSuka->user_id = Auth::user()->id;
                $pengumumanSuka->feedback = 'tidak_suka';
                $pengumumanSuka->save();
            }
        }

        return redirect('/pengumuman');
    }
}

