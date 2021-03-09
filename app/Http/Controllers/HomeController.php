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
        if(Session::get('ss_phone')){
            return redirect('/member');
        }else{
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
        }
    }

    public function login(Request $request) {
        $phone = User_otp::where('phone','=',$request->phone)->where('status','=',1)->first();
        
        if($phone){
            Session::put('ss_id',$phone->id);
            Session::put('ss_phone', $request->phone);
            return 'loginsuccess';
        }else{
            return 'faile';
        }
        
    }

    public function OTP(Request $request) {
        $phone = User_otp::where('phone','=',$request->phone)->where('status','=',1)->first();
       
        Session::put('ss_phone', $request->phone);

        if($phone){
            Session::put('ss_id',$phone->id);
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

    public function registerPhone(Request $request){

        Session::put('ss_phone', $request->phone);

        $post                  = new User_otp;
        $post->name            = $request->name;
        $post->last_name       = $request->last_name;
        $post->date            = $request->date;
        $post->month           = $request->month;
        $post->year            = $request->year;
        $post->sex             = $request->sex;
        $post->phone           = $request->phone;
        $post->address         = $request->address;
        $post->province        = $request->province;
        $post->jobs            = $request->jobs;
        $post->salary          = $request->salary;
        $post->save();

        if($post){
            return 'success';
        }else{
            return 'fail';
        }
    
    }
    public function logout(){
        Session::forget('ss_phone');

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

    }
    public function member(){
       
        if(Session::get('ss_phone')){
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

            return view('member',$data);
        }else{
            return redirect('/');
        }
    }

    public function checkCode(Request $request){

        $numberData = count($request->number)-1;
        $images_id = '';
        for($i=0; $i <= $numberData; $i++ ){

            $photo          = $request->file('image')[$i];
            $code_number    = $request->number[$i];

            $extension      = $photo->getClientOriginalExtension();
            $nameimages     = Session::get('ss_id').'-'.$i.'-'.date('dms').'-'.rand(0,99999).'.'.$extension;
            $paths          = $photo->move('images/'.Session::get('ss_id').'/', $nameimages);

            $images                 = new Images;
            $images->sid            = Session::get('ss_id');
            $images->code_number    = $code_number;
            $images->table          = 'user_otp';
            $images->image          = $nameimages;
            $images->save();
            $images_id.=  $images->id.',';

        }

        $post           = User_otp::find(Session::get('ss_id'));
        $post->gallery  = $post->gallery.$images_id;
        $post->save();

        return redirect()->back();

    }   

    
    public function rules(){
       
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

            return view('rules',$data);
        
    }


    
}
