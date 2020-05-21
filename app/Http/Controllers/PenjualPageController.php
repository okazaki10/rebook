<?php

namespace App\Http\Controllers;

use App\PenjualPage;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
class PenjualPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = Helper::auth(Session::get('email'),Session::get('password'));
            return view('penjual.index',compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PenjualPage  $penjualPage
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualPage $penjualPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenjualPage  $penjualPage
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualPage $penjualPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenjualPage  $penjualPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualPage $penjualPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenjualPage  $penjualPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualPage $penjualPage)
    {
        //
    }
}
