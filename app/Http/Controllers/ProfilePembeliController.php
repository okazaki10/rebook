<?php

namespace App\Http\Controllers;

use App\ProfilePembeli;
use Illuminate\Http\Request;
use App\Helper\Helper;
use DB;
use App\Daftar;
use Session;
class ProfilePembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $daftar = Daftar::find($user->id);
        return view('pembeli.profile',compact('user','daftar'));
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
        $user = Helper::auth(Session::get('email'), Session::get('password'));
        $this->validate(request(), [
            'email' => 'required|min:8',
            'password' => 'required|min:4',
            'konfirmasi_password' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'foto_profil' => 'nullable'
        ]);
        $daftar = Daftar::find($user->id);
        if ($request->get('password') == $request->get('konfirmasi_password')) {
            $daftar->email = $request->get('email');
            $daftar->password = $request->get('password');
            $daftar->nama_lengkap = $request->get('nama_lengkap');
            $daftar->alamat = $request->get('alamat');
            $daftar->tanggal_lahir = $request->get('tanggal_lahir');
            $daftar->no_hp = $request->get('no_hp');
            if ($request->hasFile('foto_profil')) {
                $path = $request->file('foto_profil')->store('public/profil');
                $path2 = str_replace("public", "storage", $path);
                $daftar->foto_profil = $path2;
            }
            $daftar->save();
            Session::put('email', $daftar->email);
            Session::put('password', $daftar->password);
            return redirect('/');
        } else {
            return redirect('daftar/create')->with('failed', 'konfirmasi password tidak sama');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfilePembeli  $profilePembeli
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilePembeli $profilePembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfilePembeli  $profilePembeli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfilePembeli  $profilePembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilePembeli $profilePembeli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfilePembeli  $profilePembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilePembeli $profilePembeli)
    {
        //
    }
}
