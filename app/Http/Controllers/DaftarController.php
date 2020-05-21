<?php

namespace App\Http\Controllers;


use App\Daftar;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|min:4',
            'password' => 'required|min:4',
            'konfirmasi_password' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'status' => 'required',
            'foto_profil' => 'nullable'
        ]);
        $daftar = new Daftar;
        if ($request->get('password') == $request->get('konfirmasi_password')) {
            $daftar->email = $request->get('email');
            $daftar->password = $request->get('password');
            $daftar->nama_lengkap = $request->get('nama_lengkap');
            $daftar->alamat = $request->get('alamat');
            $daftar->tanggal_lahir = $request->get('tanggal_lahir');
            $daftar->no_hp = $request->get('no_hp');
            $daftar->saldo = '0';
            $daftar->status = $request->get('status');
            if ($request->hasFile('foto_profil')) {
                $path = $request->file('foto_profil')->store('public/profil');
                $path2 = str_replace("public", "storage", $path);
                $daftar->foto_profil = $path2;
            } else {
                $daftar->foto_profil = "storage/no_profile.jpg";
            }
            $daftar->save();
            return redirect('/');
        } else {
            return redirect('daftar/create')->with('failed', 'konfirmasi password tidak sama');
        }
    }

    public function validasi(Request $request)
    {
        $auth = Helper::auth($request->email, $request->password);
        if ($auth != null) {
            Session::put('email', $auth->email);
            Session::put('password', $auth->password);
            if ($auth->status == 1) {
                return redirect('pembeli/');
            } else if ($auth->status == 2 || $auth->status == 3) {
                return redirect('penjual/');
            }
        } else {
            return redirect('/')->with('success','username atau password salah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        //
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
