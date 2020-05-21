<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use Session;
use App\Helper\Helper;
class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        if (Session::get('user') == '1'){
            return redirect('pembeli/');
        }else if(Session::get('user') == '2'){
            return redirect('penjual/'); 
        }else{
            return view('welcome');
        }
        */
        if (Session::has('email')){
        $auth = Helper::auth(Session::get('email'),Session::get('password'));
        if ($auth != null){
            if ($auth->status == 1){
                return redirect('pembeli/');
                }else if($auth->status == 2 || $auth->status == 3){
                return redirect('penjual/');
                }
            }else{
            return view('welcome');
        }
        }else{
            return view('welcome');
        }
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
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
