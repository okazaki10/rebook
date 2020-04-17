<?php

namespace App\Http\Controllers;

use App\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

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
        $daftar = $this->validate(request(), [
            'password' => 'required',
            'email' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'saldo' => 'required',
            'status' => 'required',
            'foto_profil' => 'required'
        ]);
        Daftar::create($daftar);
        return redirect('/');
    }

    public function validasi(Request $request)
    {
        $daftar = Daftar::where('email',$request->email)->where('password',$request->password);
        $jumlah = $daftar->count();
        if ($jumlah > 0){
        $status = $daftar->get();
            if ($status[0]['status'] == 1){
            return redirect('beli');
            }else if($status[0]['status'] == 2){
            return redirect('jual');
            }
        }else{
            return redirect('/');
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
}
