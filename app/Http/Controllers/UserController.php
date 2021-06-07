<?php

namespace App\Http\Controllers;

use App\Models\FotoProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        $fotoProfile = FotoProfile::get();
        $user = Auth::user();
        return view('mahasiswa.profile', ['user' => $user, 'fotoProfile' => $fotoProfile]);
    }
    public function editProfile(Request $request, $userId){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required',
            'twiter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'
        ]);

        User::where('id', $userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twiter' => $request->twiter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube
        ]);

        return redirect('mahasiswa/profile')->with('status', 'Profile User berhasil di update');
    }
    public function deleteProfile($userId){

        User::where('id', $userId)->update([
            'facebook' => null,
            'twiter' => null,
            'instagram' => null,
            'youtube' => null
        ]);

        return redirect('mahasiswa/profile')->with('status', 'Profile User berhasil di atur ke default');
    }
    public function gantiFoto($userId, $namaFoto){

        User::where('id', $userId)->update([
            'foto' => $namaFoto
        ]);

        return redirect('mahasiswa/profile')->with('status', 'Foto User berhasil diperbaharui');
    }

    public function daftarUser(){
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        $dosen = User::where('role', 'dosen')->get();
        return view('admin.daftarUser', ['mahasiswa' => $mahasiswa, 'dosen' => $dosen]);
    }
    public function deleteUser($userId){
        User::where('id', $userId)->delete();
        return redirect('admin/daftarUser')->with('status', 'user berhasil di hapus');
    }
    public function tambahUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('admin/daftarUser')->with('status', 'user berhasil di tambahkan');
    }
}
