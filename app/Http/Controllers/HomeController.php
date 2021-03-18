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
        if(Session::get('ss_phone') ){
            if(Session::get('ss_phone') && Session::get('ss_id')){
                return redirect('/member');
            }else{
                return redirect('/register');
            }
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
            $toppender = Toppender::orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
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

        $toppender = Toppender::orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
            }

        $data = array(
            //HEAD
            'setting' => $setting,
            'slides' => $slides,
            'province' => $province,
            'toppender_status' => $toppender_status,
            //HEAD
        );
        return view('register',$data);
    }

    public function registerPhone(Request $request){

        Session::put('ss_phone', $request->phone);

        $myarray = explode('-',$request->b_dates);
        $post                  = new User_otp;
        $post->name            = $request->name;
        $post->last_name       = $request->last_name;
        // $post->date            = $request->date;
        // $post->month           = $request->month;
        // $post->year            = $request->year;
        $post->date            = $myarray[2];
        $post->month           = $myarray[1];
        $post->year            = $myarray[0]+543;
        $post->sex             = $request->sex;
        $post->phone           = $request->phone;
        $post->address         = $request->address;
        $post->province        = $request->province;
        $post->jobs            = $request->jobs;
        $post->salary          = $request->salary;
        $post->save();

        Session::put('ss_id', $post->id);

        if($post){
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

            $toppender = Toppender::orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
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
            
            $toppender = Toppender::orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
            }
            $data = array(
                //HEAD
                'setting'               => $setting,
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
            $toppender = Toppender::orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
            }

            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                'block' => $block,
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
                        if($user_check2->total_use < 10){
                            $user_check2->total_use  = $user_check2->total_use + 1;
                            $user_check2->save();
                        }else{
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

            $post           = User_otp::find(Session::get('ss_id'));
            $post->gallery  = $post->gallery.$images_id;
            $post->save();


            return redirect('/history?code='.$images_id);

    }   

    // public function checkCode(Request $request){

        
    //         // $numberData = count($request->number)-1;
    //         // $images_id = '';
    //         // for($i=0; $i <= $numberData; $i++ ){
    //         //     $photo          = $request->file('image')[$i];
    //         //     $code_number    = $request->number[$i];
    //         //     $check_code     = db_code::where('code_number',$code_number)->first();
    //         // }
    //         //$check_code = DB::select("SELECT code_number FROM db_code where code_number = '1025231009'  ");

    //         //$check_code     = db_code::find(1025231009);

        
    //         // $check_code =  db_code::all();
    //         // Cache::put('key', $check_code,10);
    //         // if (Cache::has('key')){
    //         //     $value = Cache::get('key');
    //         // }
    //         //Cache::forget('key');
    //         // $value = Cache::remember('key', 10, function(){
    //         //     return db_code::all();
    //         //     //return DB::select("SELECT code_number FROM db_code where code_number = '1025231009'  ");
    //         // });
    //         // $check_code     = db_code::find(1025231009);
    //         // $check_code->status = 2;
    //         // $check_code->save();
    //         //return response()->json(['check_code' => $value]);
    //         //return response()->json(['check_code' => $check_code]);

    // } 

    
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

            $toppender = Toppender::orderBy('id', 'DESC')->first();
            if(time() > $toppender->date_start && time() < $toppender->date_stop){
                $toppender_status = 'online';  
            }else{
                $toppender_status = 'offline';
            }

            $data = array(
                //HEAD
                'setting' => $setting,
                'slides' => $slides,
                'pages' => $pages,
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

        $toppender = Toppender::orderBy('id', 'DESC')->first();
        if(time() > $toppender->date_start && time() < $toppender->date_stop){
            $toppender_status = 'online';  
        }else{
            $toppender_status = 'offline';
        }

        $data = array(
            //HEAD
            'setting' => $setting,
            'slides' => $slides,
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

            $toppender = Toppender::orderBy('id', 'DESC')->first();
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
                ORDER BY totals DESC
                LIMIT 10
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

            }else{
                $myuser = '';
            }

            $data = array(
                //HEAD
                'setting'   => $setting,
                'slides'    => $slides,
                'user'      => $user,
                'myuser'    => $myuser,
                'toppender_status' => 'online',
                //HEAD
            );

            return view('toppender',$data);

        }



    

    
}
