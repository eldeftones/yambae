<?php

namespace App\Http\Controllers;

use App\Models\Bill;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home');
    }


    public function test()
    {
        //return view('backend.player.audio-player');

        $bill = Bill::find(29);
        echo (new \App\Mail\BillCreated($bill))->render();


    }

}
