<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class Toprank3Controller extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }

    public function folder(){return 'toprank2';}
    public function status(){return 'Pages';}

    public function index()
    {
        //$user = Auth::user();
        $member = DB::select("SELECT COUNT('images.id') as pointcode,name,last_name,phone
            FROM  user_otp
            INNER JOIN images ON user_otp.id = images.sid
            WHERE images.status = 1
            AND code_first_number = 3
            GROUP BY user_otp.id
            ORDER BY pointcode DESC
            LIMIT 10
        ");
    
        $data = array(
            'member' => $member,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

    public function zipFiles(Request $request){

        $member = DB::select("SELECT COUNT('images.id') as pointcode,name,last_name,phone
            FROM  user_otp
            INNER JOIN images ON user_otp.id = images.sid
            WHERE images.status = 1
            AND code_first_number = 3
            GROUP BY user_otp.id
            ORDER BY pointcode DESC
            LIMIT 10
        ");
           // dd($member);
            header('Content-Type: text/html; charset=utf-8');
            $myArrayHeaders = array ('ลำดับ', 'ชื่อ', 'นามสกุล', 'เบอร์โทร', 'สิทธิ์');
            $myArrayData = array();
            $i = 0;
            foreach($member as $data){
                $i++;
                $myArrayData[] = array($i,$data->name,$data->last_name,$data->phone,$data->pointcode);
            }
            $filename = 'toprankMixBerry';
            zipfile('toprankMixBerry.zip',$myArrayHeaders,$myArrayData,$request->pass,$filename);

        //https://www.programmersought.com/article/78061553647/
        
    }
    

}
