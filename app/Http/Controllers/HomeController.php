<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Library\LineLoginLib;

use App\Slides;
use App\Db_other;
use App\Pages;
use App\Setting;
use App\Images;
use App\User_otp;
use App\province;

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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $setting = Setting::find(1);
        $data = array(
            //HEAD
            'setting' => $setting,
            //HEAD
        );
        if(Session::get('ss_id')){
            return view('choose',$data);
        }
        return view('index',$data);

    }

    public function choose(){

        $setting = Setting::find(1);
        $data = array(
            //HEAD
            'setting' => $setting,
            //HEAD
        );

        if(Session::get('ss_id')){
            return view('choose',$data);
        }

        return redirect('/linelogin');

    }
    public function done(){

        $setting = Setting::find(1);
        $data = array(
            //HEAD
            'setting' => $setting,
            //HEAD
        );

        if(Session::get('ss_id')){
            return view('done',$data);
        }

        return redirect('/linelogin');

    }


    public function linelogin(Request $request){
        define('LINE_LOGIN_CHANNEL_ID',1655784149);
        define('LINE_LOGIN_CHANNEL_SECRET','001a6b43fde6ffeb4206e294d17eb2ee');
        define('LINE_LOGIN_CALLBACK_URL','http://localhost:8000/linelogin');
        
        $LineLogin = new LineLoginLib(LINE_LOGIN_CHANNEL_ID, LINE_LOGIN_CHANNEL_SECRET, LINE_LOGIN_CALLBACK_URL);
        $dataToken = $LineLogin->requestAccessToken($request, true);
        if(!is_null($dataToken) && is_array($dataToken)){
            if(array_key_exists('access_token',$dataToken)){
                $_SESSION['ses_login_accToken_val'] = $dataToken['access_token'];
            }
            if(array_key_exists('refresh_token',$dataToken)){
                $_SESSION['ses_login_refreshToken_val'] = $dataToken['refresh_token'];
            }   
            if(array_key_exists('id_token',$dataToken)){
                $_SESSION['ses_login_userData_val'] = $dataToken['user'];
            }       
        }
        if(!isset($_SESSION['ses_login_accToken_val'])){    
            $LineLogin->authorize(); 
            exit;
        }
        $accToken = $_SESSION['ses_login_accToken_val'];
        if(isset($_SESSION['ses_login_userData_val']) && $_SESSION['ses_login_userData_val']!=""){
            $lineUserData = json_decode($_SESSION['ses_login_userData_val'],true);

            $user = User_otp::where('token_line','=',$lineUserData['sub'])->first();
            if($user){
                Session::put('ss_id',$user->id);
                return redirect('/choose');
            }else{
                $setting = Setting::find(1);
                $data = array(
                    //HEAD
                    'setting' => $setting,
                    'line_id' => $lineUserData['sub'],
                    'data_line' => $lineUserData,
                    //HEAD
                );
                return view('index',$data);
            }
        }
        
        
    }
    public function register(Request $request){

            $user                  = new User_otp;
            $user->token_line      = $request->token_line;
            $user->name            = $request->name;
            $user->last_name       = $request->last_name;
            $user->phone           = $request->phone;
            $user->save();

            if($user){
                Session::put('ss_id',$user->id);
                return 'success';
            }else{
                return 'fail';
            }

    }
    
    public function logout(){
        Session::forget('ss_id');
        return redirect('/');
    }

    public function dealer(){

        $setting = Setting::find(1);
        $region = DB::table('region')
        ->select('region_name')
        ->distinct('region_name')
        ->groupBy('region_name')
        ->get();

        $data = array(
            //HEAD
            'setting' => $setting,
            'region' => $region
            //HEAD
        );

        if(Session::get('ss_id')){
            return view('dealer',$data);
        }

        return redirect('/linelogin');

    }
    public function province(Request $request){

        $province = DB::table('region')
        ->select('region_province')
        ->Where('region_name','=',$request->val)
        ->distinct('region_province')
        ->groupBy('region_province')
        ->get();
        $data = '';
        if($province){
            $data.='<select name="province" id="province" class="form-control" onChange="showProvince(this.value)" required>';
                $data.='<option value="">กรุณาเลือกจังหวัด</option>';
                foreach($province as $province){
                    $data.='<option value="'.$province->region_province.'">'.$province->region_province.'</option>';
                }
            $data.='</select>';
        }
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function shop_name(Request $request){

        $shop_name = DB::table('region')
        ->select('shop_name','region_id')
        ->Where('region_province','=',$request->val)
        ->distinct('shop_name')
        ->groupBy('shop_name')
        ->get();
        $data = '';
        if($shop_name){
            $data.='<select name="region_id" id="region_id" class="form-control" required>';
                $data.='<option value="">กรุณาเลือกร้านค้า</option>';
                foreach($shop_name as $shop_name){
                    $data.='<option value="'.$shop_name->region_id.'">'.$shop_name->shop_name.'</option>';
                }
            $data.='</select>';
        }
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    
    public function sendData(Request $request){
        if(Session::get('ss_id')){

            if ($request->hasFile('files')) {
                $photos = $request->file('files');
                $images_id = '';
                $i=0;

                $shop_name = DB::table('region')->select('shop_name')->Where('region_id','=',$request->region_id)->first();
    
                foreach ($photos as $photo) {
                    if($photo != ''){
                        $i++;
                        $extension = $photo->getClientOriginalExtension();
                        $nameimages = Session::get('ss_id').'-'.$i.'-'.date('dms').'-'.rand(0,99999).'.'.$extension;
                        $paths   = $photo->move('images/'.Session::get('ss_id').'/', $nameimages);
                        $images = new Images;
                        $images->sid = Session::get('ss_id');
                        $images->status = $request->status;
                        $images->table = 'user_otp';
                        $images->image = $nameimages;
                        $images->region_id       = $request->region_id;
                        $images->region_name	 = $request->region;
                        $images->region_province = $request->province;
                        $images->shop_name       = $shop_name->shop_name;
                        $images->save();
                    }
                }
                return redirect('/done');
            }
        }else{
            return redirect('/linelogin');
        }
    }

    public function prize(){
        $setting = Setting::find(1);
        $data = array(
            //HEAD
            'setting' => $setting
            //HEAD
        );
        return view('/prize',$data);
    }
    
    
}
