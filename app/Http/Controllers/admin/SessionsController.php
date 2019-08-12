<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
class SessionsController extends Controller
{
    //

    public function __construct(){

        //$this->middleware('auth');
       //$this->middleware('auth',['except'=>['store']]);

    }


    public function create(){

        /*$archives = Post::archives();

        $data = array(
            'archives' => $archives
         );

    	return view('sessions.create',$data);*/
    }

    public function store(){

    	if(! Auth()->attempt(request(['email','password']))){
            return back()->withErrors([
    			'message' =>'LOGIN FILD'
    		]);
    	}

    	//return redirect()->loginsuccess();
       // return redirect()->route('admin.page.index');
        return redirect()->home();

    }


    public function destroy(){

    	auth()->logout();

    	return view('admin.login');
    	
    }


}
