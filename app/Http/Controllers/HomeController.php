<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slides;
use App\Db_other;
use App\Pages;
use App\Menus;
use App\Setting;
use App\Products;
use App\Images;
use App\User_otp;
use App\Log_otp;

use Session;

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
        $year = date('Y-m');
        $countMont = Db_other::where('montcount','=',$year)->first();
        if($countMont == []){
            $post = new Db_other;
            $post->montcount    = $year;
            $post->view         = 1;
            $post->name         = 'viewweb';
            $post->status       = 2;
            $post->save();
        }else{
            $Dcount = $countMont->view + 1;
            $countMont->view    = $Dcount;
            $countMont->save();
        }
        if(Session::get('ss_phone') == null){
            $setting = Setting::find(1);

            $slide = Db_other::find(1);
            if($slide->gallery != ''){
                $gallery1 = explode(",",$slide->gallery);
                foreach($gallery1 as $value1) {
                $image = Slides::find($value1);
                if($image['online'] == 0){
                        $slides[] = $image;
                }
                }
            }else {$slides = ''; }

            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                //HEAD
            );

            return view('index',$data);
        }else{
            return redirect('/choose');
        }
    }

    public function sendOTP(Request $request)
    {
        $post = new User_otp;
        $post->name = $request->name;
        $post->sex = $request->sex;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->otp = $request->otp;
        $post->save();

        if($post){
            Session::put('ss_phone', $request->phone);
            echo 'success';
        }else{
            echo 'error';
        }

    }

    public function Choose() {
        // Session::forget('ss_percentage');
        // dd(session()->all());
        $setting = Setting::find(1);
       if(Session::get('ss_percentage') == null || Session::get('ss_percentage') == ''){

            $page = Pages::where('status','=','Pages')->where('online',0)->where('numbercode','!=',0)->get();

            $choices = array();
            foreach($page as $data){
                $choices[$data['namecode']]= $data['percentage'];
            }
            $total = array_sum( $choices );
            $percent = rand( 0, $total * 100 ) / 100; 
            $award = null;
            $carry = 0;

            foreach ( $choices as $key => $value ) {
                $high = $carry + $value;
                $low = $carry;
                if ( $percent > $low && $percent <= $high ) {
                    $award = $key;
                    break;
                }
                $carry += $value;
            }

           $code = Session::put('ss_percentage', $award);

        }else{

            $code = Session::get('ss_percentage');

        }
        $data = array(
            //HEAD
            'setting' => $setting
            //HEAD
        );

     
        return view('choose',$data);
        
    }
    public function sendPercentage(Request $request) {

        $ShopCode = Pages::where('code','=',$request->shopcode)->where('status','=','ShopCode')->where('online',0)->first();
        
        if($ShopCode){
            
            $post = User_otp::where('phone','=',$request->phone)->first();
            
            if(!empty($post)){
                $post->shop_code = $request->shopcode;
                $post->save();

                $Pages = Pages::where('namecode','=',$request->percentage)->where('status','=','Pages')->where('online',0)->where('numbercode','!=',0)->first();
                $Pages->numbercode = $Pages->numbercode - 1;
                $Pages->save();

                $log = new Log_otp;
                $log->phone = $request->phone;
                $log->percentage = $request->percentage;
                $log->shopcode = $request->shopcode;
                $log->save();

                Session::forget('ss_percentage');
                Session::forget('ss_phone');
                echo 'success';
            }else{
                echo 'error';
            }
        }else{
            echo 'error';
        }

    }
    
}
