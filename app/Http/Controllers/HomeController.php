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
use App\db_code;
use App\province;
use App\Toppender;

use Session;

//use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\DB;

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
        if(Session::get('ss_phone') && Session::get('ss_id') ){
            return redirect('/member');
            // if(Session::get('ss_phone') ){
                
            // }else{
            //     return redirect('/register');
            // }
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

            $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
            if(!empty($toppender)){
                if(time() > $toppender->date_start && time() < $toppender->date_stop){
                    $toppender_status = 'online';  
                }else{
                    $toppender_status = 'offline';
                }
            }

            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                'toppender_status' => $toppender_status,
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
       
        //Session::put('ss_phone', $request->phone);

        if($phone){
            Session::put('ss_phone', $phone->phone);
            Session::put('ss_id',$phone->id);
            return 'registerDont';
        }else{

               // return 'success';
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

    public function register(Request $request) {
        $phone = $request->phone;
        if($phone == ''){
            return redirect('/');
        }
        $setting = Setting::find(1);
        $province = province::all();
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

        $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
        if(!empty($toppender)){
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
            }
        }

        $data = array(
            //HEAD
            'setting' => $setting,
            'slides' => $slides,
            'province' => $province,
            'toppender_status' => $toppender_status,
            'phone' => $phone
            //HEAD
        );
        return view('register',$data);
    }

    public function registerPhone(Request $request){

        $post                  = new User_otp;
        $post->name            = $request->name;
        $post->last_name       = $request->last_name;
        $post->date            = $request->date;
        $post->month           = $request->month;
        $post->year            = $request->year+543;
        $post->sex             = $request->sex;
        $post->phone           = $request->phone;

        $post->address         = $request->address;
        $post->zipcode         = $request->zipcode;
        $post->province        = $request->province;
        $post->amphoe          = $request->amphoe;
        $post->district        = $request->district;

        $post->jobs            = $request->jobs;
        $post->salary          = $request->salary;
        $post->save();

        if($post){
            Session::put('ss_phone', $request->phone);
            Session::put('ss_id', $post->id);
            return 'success';
        }else{
            return 'fail';
        }
    
    }
    public function logout(){
        Session::forget('ss_phone');
        Session::forget('ss_id');
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

            $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
            if(!empty($toppender)){
                if(time() > $toppender->date_start && time() < $toppender->date_stop){
                    $toppender_status = 'online';  
                }else{
                    $toppender_status = 'offline';
                }
            }

            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                'toppender_status' => $toppender_status,
                //HEAD
            );

            return view('index',$data);

    }
    
    public function history(Request $request){
       
        if(Session::get('ss_phone') && Session::get('ss_id')){
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

            $images_code = Images::where('sid',Session::get('ss_id'))->orderBy('id', 'DESC')->paginate(10);

            $myarray_query = array();
            $myarray = explode(',',$request->code);
            foreach($myarray as $code){
                if(!empty($code)){
                    array_push($myarray_query,$code);
                }
            }
            $history = DB::table('images')->select('code_number', 'status')->whereIn('id', $myarray_query)->orderBy('id', 'DESC')->get();
            $history_count = DB::table('images')->select('code_number', 'status')->whereIn('id', $myarray_query)->where('status',1)->count();

            $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
            if(!empty($toppender)){
                if(time() > $toppender->date_start && time() < $toppender->date_stop){
                    $toppender_status = 'online';  
                }else{
                    $toppender_status = 'offline';
                }
            }
            $point = Images::where('sid',Session::get('ss_id'))->where('status',1)->count();
         
            $data = array(
                //HEAD
                'setting'               => $setting,
                'point'                 => $point,
                'slides'                => $slides,
                'images_code'           => $images_code,
                'toppender_status'      => $toppender_status,
                'history'               => $history,
                'history_count'         => $history_count
                //HEAD
            );
            return view('history',$data);
        }else{
            return redirect('/');
        }
    }

    public function member(){
       
        if(Session::get('ss_phone') && Session::get('ss_id')){
            $user_check         = Log_otp::where('user_id',Session::get('ss_id'))->where('status',1)->orderBy('id', 'DESC')->first();
            $block = '';
            $dateblock = '';
            if($user_check){
                if(time() > strtotime($user_check['date_block']) && $user_check['date_block'] != null){
                    $user_check->status  = 2;
                    $user_check->save();
                }else if(time() < strtotime($user_check['date_block']) && $user_check['date_block'] != null){
                    $block = 'block';
                    $dateblock = $user_check['date_block'];
                }else{

                }
            }

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
            $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
            if(!empty($toppender)){
                if(time() > $toppender->date_start && time() < $toppender->date_stop){
                    $toppender_status = 'online';  
                }else{
                    $toppender_status = 'offline';
                }
            }
            
            $point = Images::where('sid',Session::get('ss_id'))->where('status',1)->count();
            

            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                'block' => $block,
                'point' => $point,
                'dateblock' => $dateblock,
                'toppender_status' => $toppender_status
                //HEAD
            );
            return view('member',$data);
        }else{
            return redirect('/');
        }
    }

    public function checkCode(Request $request){

        if(Session::get('ss_phone') == null && Session::get('ss_id') == null){
            return redirect('/');
        }
       
        $user_check         = Log_otp::where('user_id',Session::get('ss_id'))->where('status',1)->orderBy('id', 'DESC')->first();
        
        if($user_check){
            if(time() > strtotime($user_check['date_block']) && $user_check['date_block'] != null){
                $user_check->status  = 2;
                $user_check->save();
            }else if(time() < strtotime($user_check['date_block']) && $user_check['date_block'] != null){

                return redirect()->back();
                
            }else{

            }
        }
        
            $numberData = count($request->number)-1;
            $images_id = '';
            for($i=0; $i <= $numberData; $i++ ){

                $photo          = $request->file('image')[$i];
                $code_number    = $request->number[$i];
                $check_code     = db_code::where('code_number',$code_number)->first();


                if($check_code['status'] == 1){
                    
                    $stauts = 1; // กรอกมาใหม่
                    $check_code->status  = 2;
                    $check_code->save();

                }else if($check_code['status'] == 2){
                    $stauts = 2; // ซ้ำ
                }else{
                    $stauts = 3; // มั่ว
                    $user_check2         = Log_otp::where('user_id',Session::get('ss_id'))->where('status',1)->orderBy('id', 'DESC')->first();   
                    if($user_check2){
                        $count               = Log_otp::where('user_id',Session::get('ss_id'))->count('id');
                        if($user_check2->total_use < 5){
                            $user_check2->total_use  = $user_check2->total_use + 1;
                            $user_check2->save();
                        }else{
                            if($count < 3){
                                $count = 1;
                            }else if($count == 3){
                                $count = 1;
                            }else if($count == 4){
                                $count = 2;
                            }else if($count == 5){
                                $count = 3;
                            }else if($count == 6){
                                $count = 4;
                            }else if($count == 7){
                                $count = 5;
                            }else{
                                $count = 6;
                            }
                            $startDate  = time(); 
                            $dateNow    = date('Y-m-d H:i:s', strtotime('+'.$count.' day', $startDate));
                            $user_check2->date_block  = $dateNow;
                            $user_check2->save();
                            
                            return redirect()->back();

                        }
                    }else{
                        $user_log               = new Log_otp;
                        $user_log->user_id      = Session::get('ss_id');
                        $user_log->total_use    = 1;
                        $user_log->save();
                    }
                }

                $extension      = $photo->getClientOriginalExtension();
                $nameimages     = Session::get('ss_id').'-'.$i.'-'.date('dms').'-'.rand(0,99999).'.'.$extension;
                $paths          = $photo->move('images/'.Session::get('ss_id').'/', $nameimages);

                $images                     = new Images;
                $images->sid                = Session::get('ss_id');
                $images->code_first_number  = $code_number[0];
                $images->code_number        = $code_number;
                $images->status             = $stauts;
                $images->table              = 'user_otp';
                $images->image              = $nameimages;
                $images->save();
               $images_id.=  $images->id.',';
            }

            // $post           = User_otp::find(Session::get('ss_id'));
            // $post->gallery  = $post->gallery.$images_id;
            // $post->save();


            return redirect('/history?code='.$images_id);

    }   

    public function results(){
       
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

            $pages = Pages::all();

            $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
            if(!empty($toppender)){
                if(time() > $toppender->date_start && time() < $toppender->date_stop){
                    $toppender_status = 'online';  
                }else{
                    $toppender_status = 'offline';
                }
            }
            if(Session::get('ss_id')){
                $point = Images::where('sid',Session::get('ss_id'))->where('status',1)->count();
            }else{
                $point = 0;
            }


            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                'pages' => $pages,
                'point' => $point,
                'toppender_status' => $toppender_status,
                //HEAD
            );

            return view('results',$data);
        
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

        $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
        if(!empty($toppender)){
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
            }
        }

        if(Session::get('ss_id')){
            $point = Images::where('sid',Session::get('ss_id'))->where('status',1)->count();
        }else{
            $point = 0;
        }


        $data = array(
            //HEAD
            'setting' => $setting,
            'slides' => $slides,
            'point' => $point,
            'toppender_status' => $toppender_status,
            //HEAD
        );

        return view('rules',$data);
    
        }

        public function toppender(){
            
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

            $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                
            }else{
                return redirect('/');
            }
            


            $date_start = date('Y-m-d H:i:s',$toppender->date_start);
            $date_stop = date('Y-m-d H:i:s',$toppender->date_stop);
            
            $user = DB::select("SELECT COUNT('images.id') as totals,user_otp.phone,name,last_name
                FROM  user_otp
                INNER JOIN images ON user_otp.id = images.sid
                WHERE code_first_number = $toppender->status
                AND   images.status = 1
                AND   images.created_at BETWEEN '".$date_start."' AND '".$date_stop."'
                GROUP BY user_otp.id
                ORDER BY totals DESC
                LIMIT $toppender->luckynumber
            ");
            if($user[0]->totals == 0){
                $user = 'nodata';
            }

            if(Session::get('ss_id')){
                $ssid = Session::get('ss_id');

                $myuser = DB::select("SELECT COUNT('images.id') as totals,user_otp.phone,name,last_name
                    FROM  user_otp
                    INNER JOIN images ON user_otp.id = images.sid
                    WHERE code_first_number = $toppender->status
                    AND   images.status = 1
                    AND   images.sid = '".$ssid."'
                    AND   images.created_at BETWEEN '".$date_start."' AND '".$date_stop."'
                    
                ");

                $point = Images::where('sid',Session::get('ss_id'))->where('status',1)->count();
                
            }else{
                $myuser = '';
                $point = 0;
            }
            $data = array(
                //HEAD
                'setting'   => $setting,
                'slides'    => $slides,
                'user'      => $user,
                'myuser'    => $myuser,
                'toppender_status' => 'online',
                'date_stop' => $date_stop,
                'point' => $point,
                //HEAD
            );

            return view('toppender',$data);

        }
       
        public function profile(){
            if(empty(Session::get('ss_id'))){
                return redirect('/');
            }else{
                $profile = User_otp::find(Session::get('ss_id'));
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
    
                $toppender = Toppender::where('online',2)->orderBy('id', 'DESC')->first();
                if(!empty($toppender)){
                    if(time() > $toppender->date_start && time() < $toppender->date_stop){
                        $toppender_status = 'online';  
                    }else{
                        $toppender_status = 'offline';
                    }
                }
    
                $data = array(
                    //HEAD
                    'setting' => $setting,
                    'slides' => $slides,
                    'profile' => $profile,
                    'toppender_status' => $toppender_status,
                    //HEAD
                );
    
                return view('profile',$data);
            }
            
        }

        public function updateProfile(Request $request){

                $post = User_otp::find(Session::get('ss_id'));
 
                // $post->name            = $request->name;
                // $post->last_name       = $request->last_name;
                $post->date            = $request->date;
                $post->month           = $request->month;
                $post->year            = $request->year+543;
                // $post->sex             = $request->sex;
                // $post->phone           = $request->phone;

                $post->address         = $request->address;
                $post->zipcode         = $request->zipcode;
                $post->province        = $request->province;
                $post->amphoe          = $request->amphoe;
                $post->district        = $request->district;

                // $post->jobs            = $request->jobs;
                // $post->salary          = $request->salary;
                $post->save();
                if($post){
                    return 'success';
                }else{
                    return 'error';
                }
            
        }
        



    

    
}
