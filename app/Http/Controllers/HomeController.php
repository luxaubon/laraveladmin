<?php

namespace App\Http\Controllers;

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
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $year = date('Y-m');
        // $countMont = Db_other::where('montcount','=',$year)->first();
        // if($countMont == []){
        //     $post = new Db_other;
        //     $post->montcount    = $year;
        //     $post->view         = 1;
        //     $post->name         = 'viewweb';
        //     $post->status       = 2;
        //     $post->save();
        // }else{
        //     $Dcount = $countMont->view + 1;
        //     $countMont->view    = $Dcount;
        //     $countMont->save();
        // }

        return view('index');
    }
}
