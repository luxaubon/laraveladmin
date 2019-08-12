<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test;
use App\Pages;
class TestController extends Controller
{
    public function index(){

    	if ( !function_exists('mysql_escape'))
{
    function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
}




    $data = Test::all();
    $pages = Pages::all();
    // $var = json_decode($data,true);
    // $t = mysql_escape(stripslashes($data));
   // return json_encode($data,JSON_UNESCAPED_UNICODE);
    return response()->json(['one'=>$data,'two'=>$pages]);
    }

}
