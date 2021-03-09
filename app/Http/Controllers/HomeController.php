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

    
    public function OTP(Request $request) {
        $phone = User_otp::where('phone','=',$request->phone)->where('status','=',2)->first();

        Session::put('ss_phone', $request->phone);

        if($phone){
            return 'registerDont';
        }else{

                return 'success';
                $setting = Setting::find(1);
                $account = json_decode($setting->payment)[0]->user;
                $password = json_decode($setting->payment)[0]->pass;
                $mobile_no = $request->phone;
                $message = 'หมายเลข OTP ของท่านคือ '.$request->otp;
                $category = 'General';
                $sender_name = ''; // use default sender name if not defined
                $results = sendMessage($account, $password, $mobile_no, $message, '', $category, $sender_name);
                if ($results) {
                    return 'success';
                } else {
                    return $results['error'];
                }
        }
        
    }

    public function register() {
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

        return view('register',$data);
        
    }


    
}
