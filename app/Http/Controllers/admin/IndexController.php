<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pages;
use App\User;
use App\Db_other;


class IndexController extends Controller
{
     

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function folder(){return 'dashboard';}
    public function status(){return 'Pages';}

    public function index()
    {
        //$user = Auth::user();
        
        $pagesView = Pages::orderBy('view','DESC')
                 ->where('status',$this->status())
                 ->limit(5)
                 ->get();

        $pagesOnline = Pages::all()
                       ->where('online',0)
                       ->count();

        $pagesOffline = Pages::all()
                        ->where('online',1)
                        ->count();
        $user = User::all()->count();

        //User::DEFAULT_TYPE,

        $montcount = '';
        $view = '';
        $viewMont = Db_other::all()->where('status',2);
        foreach($viewMont as $dataMont) {
            $montcount.= "'".ViewDate($dataMont->montcount)."',";
            $view.= $dataMont->view.',';
        }
        $data = array(
            'pagesView' => $pagesView,
            'folder' => 'dashboard',
            'pagesOnline' => $pagesOnline,
            'pagesOffline' => $pagesOffline,
            'user' => $user,
            'montcount' => $montcount,
            'view' => $view,
           
        );

        return view('admin.'.$this->folder().'.index',$data);
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
        //
    }
}
