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
        //Session::forget('ss_phone');
        //Session::forget('user_id');
       // if(Session::get('ss_phone') == null || Session::get('user_id') == null){
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
        // }else{
        //     return redirect('/choose');
        // }
    }

    public function sendOTP(Request $request)
    {
        $usersame = User_otp::where('phone','=',$request->phone)->where('otp','=',$request->otp)->first();
        if($usersame){
            // Session::put('user_id', $usersame->id);
            // Session::put('ss_phone', $usersame->phone);
            echo 'sameotp';
        }else{
            $post = new User_otp;
            $post->name = $request->name;
            $post->sex = $request->sex;
            $post->email = $request->email;
            $post->phone = $request->phone;
            $post->otp = $request->otp;
            $post->save();

            if($post){
                Session::put('user_id', $post->id);
                Session::put('ss_phone', $request->phone);
                echo 'success';
            }else{
                echo 'error';
            }
        }

    }
    
    public function OTP() {
        $setting = Setting::find(1);

        $data = array(
            //HEAD
            'user' => json_decode($setting->payment)[0]->user,
            'pass' => json_decode($setting->payment)[0]->pass,
            //HEAD
        );

        return response()->json($data);
    }
    public function Choose() {
        // Session::forget('code_id');
        // Session::forget('ss_percentage');
       // dd(session()->all());

        $setting = Setting::find(1);

       if(Session::get('ss_percentage') == null || Session::get('ss_percentage') == '' && Session::get('code_id') == null || Session::get('code_id') == ''){

            $page = Pages::where('status','=','Pages')->where('online',0)->where('numbercode','>',0)->get();

            if($page){
                $choices = array();
                foreach($page as $data){
                    $choices[$data['id']]= $data['percentage'];
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
            
                $dbCode = Pages::find($award);
                if($dbCode){
                    Session::put('code_id',$dbCode->id);
                    Session::put('ss_percentage',$dbCode->namecode);
                    $codeMaxToday = 'PassCodeToday';
                }else{
                    $codeMaxToday = 'codemaxToday';
                    Session::forget('user_id');
                    Session::forget('ss_phone');
                }
            }else{
                $codeMaxToday = 'codemaxToday';
                Session::forget('user_id');
                Session::forget('ss_phone');
            }

        }else{
            $codeMaxToday = 'PassCodeToday';
        }
        
        $data = array(
            //HEAD
            'setting' => $setting,
            'codeMaxToday' => $codeMaxToday
            //HEAD
        );

        return view('choose',$data);
        
    }
    public function sendPercentage(Request $request) {

        $ShopCode = Pages::where('code','=',$request->shopcode)->where('status','=','ShopCode')->where('online',0)->first();
        
        if($ShopCode){

            $Pages = Pages::find(Session::get('code_id'));
            if($Pages->numbercode != 0){

                $post = User_otp::find(Session::get('user_id'));
                $post->shop_code = $request->shopcode;
                $post->code_id = Session::get('code_id');
                $post->percentage = Session::get('ss_percentage');
                $post->save();

                $Pages->numbercode = $Pages->numbercode - 1;
                $Pages->save();

                $log = new Log_otp;
                $log->user_id = Session::get('user_id');
                $log->phone = Session::get('ss_phone');
                $log->percentage = Session::get('ss_percentage');
                $log->shopcode = Session::get('ss_phone');
                $log->save();

                Session::forget('code_id');
                Session::forget('user_id');
                Session::forget('ss_percentage');
                Session::forget('ss_phone');

                echo 'success';

            }else{
                Session::forget('code_id');
                Session::forget('ss_percentage');
                echo 'codemax';
            }
 
        }else{
            echo 'error';
        }

    }
    
}
