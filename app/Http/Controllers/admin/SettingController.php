<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Setting;
use Auth;
use Illuminate\Support\Facades\File as LaraFile;

class SettingController extends Controller
{
    //

    public function __construct(){

        //$this->middleware('auth');
       //$this->middleware('auth',['except'=>['store']]);

    }
    public function folder(){return 'setting';}

    public function index(){

     	$pages = Setting::find(1);
        $data = array(
            'pages' => $pages,
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);


    }

    public function edit(Request $request){
      
     $post = Setting::find(1);

    //  $address_th[] =  array(
    //                 'company_th' =>  (mysql_escape(stripslashes($request->company_th))),
    //                 'address_th' =>  (mysql_escape(stripslashes($request->address_th))),
    //                 'tel_th' =>  (mysql_escape(stripslashes($request->tel_th))),
    //                 'fax_th' =>  (mysql_escape(stripslashes($request->fax_th))),
    //                 'phone_th' =>  (mysql_escape(stripslashes($request->phone_th))),
    //                 'ifram_th' =>  (mysql_escape(stripslashes($request->ifram_th))),
    //             );
    $address_en[] =  array(
                    'company_en' =>  (mysql_escape(stripslashes($request->company_en))),
                    'address_en' =>  (mysql_escape(stripslashes($request->address_en))),
                    'tel_en' =>  (mysql_escape(stripslashes($request->tel_en))),
                    'fax_en' =>  (mysql_escape(stripslashes($request->fax_en))),
                    'phone_en' =>  (mysql_escape(stripslashes($request->phone_en))),
                    'ifram_en' =>  (mysql_escape(stripslashes($request->ifram_en))),
                ); 
    $email[] = array(
                    'email' =>  (mysql_escape(stripslashes($request->email))),
                    'host' =>  (mysql_escape(stripslashes($request->host))),
                    'user' =>  (mysql_escape(stripslashes($request->user))),
                    'password' =>  (mysql_escape(stripslashes($request->password))),
                    'port' =>  (mysql_escape(stripslashes($request->port))),
                    'secure' =>  (mysql_escape(stripslashes($request->secure))),
                );
    $social[] = array(
                    'fb' =>  (mysql_escape(stripslashes($request->fb))),
                    'ig' =>  (mysql_escape(stripslashes($request->ig))),
                    'gg' =>  (mysql_escape(stripslashes($request->gg))),
                    'yt' =>  (mysql_escape(stripslashes($request->yt))),
                    'twt' =>  (mysql_escape(stripslashes($request->twt))),
                    'line' =>  (mysql_escape(stripslashes($request->line))),
                );
    $payment[] = array(
                    'user' =>  (mysql_escape(stripslashes($request->user))),
                    'pass' =>  (mysql_escape(stripslashes($request->pass))),
                );
    $seo[] = array(
                    'fb_id' =>  (mysql_escape(stripslashes($request->fb_id))),
                    'title' =>  (mysql_escape(stripslashes($request->title))),
                    'keyword' =>  (mysql_escape(stripslashes($request->keyword))),
                );

    if ($request->hasFile('imagefb')) {
            LaraFile::delete("public/images/".$post->imagefb);
            $slidename = 'imagefb'.date('dym').time().'.'.$request->imagefb->getClientOriginalExtension();
            $slide = $request->imagefb->move('public/images/',$slidename);
            $post->imagefb = $slidename;
        }
        
    if ($request->hasFile('image')) {
            LaraFile::delete("public/images/".$post->image);
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
            $post->image = $filename;
        }

    $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
    $post->email = json_encode($email,JSON_UNESCAPED_UNICODE);
    $post->social = json_encode($social,JSON_UNESCAPED_UNICODE);
    $post->address_th = $request->address_th;
    $post->address_en = json_encode($address_en,JSON_UNESCAPED_UNICODE);
    $post->payment = json_encode($payment,JSON_UNESCAPED_UNICODE);
    $post->save();  
    }

    


}
