<?php

namespace App\Http\Controllers;

use App\PembeliPage;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
use DB;
use App\Detail_buku;
use App\List_buku;
use App\Keranjang_belanja;
class PembeliPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Helper::auth(Session::get('email'),Session::get('password'));
        
        return view('pembeli.index',compact('user'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function edit(PembeliPage $pembeliPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembeliPage  $pembeliPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembeliPage $pembeliPage)
    {
        //
    }
}
