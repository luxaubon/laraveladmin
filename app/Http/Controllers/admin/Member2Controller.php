<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class Member2Controller extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }

    public function folder(){return 'member2';}

    public function index(Request $request){
        if($request->search){

            $member = DB::table('images')
            ->join('user_otp', 'images.sid', '=', 'user_otp.id')
            ->select('user_otp.id','name', 'last_name', 'phone', 'code_number', 'images.created_at', 'images.image', 'images.status')
            ->where('images.status',2)
            ->where('code_number',$request->search)
            ->orderBy('id', 'DESC')
            ->paginate(30);
        
        }else{

            $member = DB::table('images')
            ->join('user_otp', 'images.sid', '=', 'user_otp.id')
            ->select('user_otp.id','name', 'last_name', 'phone', 'code_number', 'images.created_at', 'images.image', 'images.status')
            ->where('images.status',2)
            ->orderBy('id', 'DESC')
            ->paginate(30);

        }
        

        $data = array(
            'member' => $member,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

    public function zipFiles(Request $request){
        
        $member = DB::table('images')
        ->join('user_otp', 'images.sid', '=', 'user_otp.id')
        ->select('user_otp.id','name', 'last_name', 'phone', 'code_number', 'images.created_at', 'images.image', 'images.status')
        ->where('images.status',2)
        ->orderBy('id', 'DESC')
        ->get();

        $myArrayHeaders = array('ลำดับ');
        $name           = ($request->name == 'show') ? $myArrayHeaders[] = "ชื่อ" : '';
        $last_name      = ($request->last_name == 'show') ? $myArrayHeaders[] = "นามสกุล" : '';
        $phone          = ($request->phone == 'show') ? $myArrayHeaders[] = "เบอร์โทร" : '';
        $code           = ($request->code == 'show') ? $myArrayHeaders[] = "รหัสใต้ฝา" : '';
        $date_register  = ($request->date_register == 'show') ? $myArrayHeaders[] = "วันที่สมัคร" : '';
        $status         = ($request->status == 'show') ? $myArrayHeaders[] = "สถานะ" : '';
        $link_image     = ($request->link_image == 'show') ? $myArrayHeaders[] = "link รูป" : '';
        header('Content-Type: text/html; charset=utf-8');
        
        $myArrayData = array();
        $i = 0;
        foreach($member as $data){
            $i++;
            $myArrayData[$i] = array($i);
            $name           = ($request->name == 'show') ?  array_push($myArrayData[$i],$data->name) : '';
            $last_name      = ($request->last_name == 'show') ?   array_push($myArrayData[$i],$data->last_name) : '';
            $phone          = ($request->phone == 'show') ? array_push($myArrayData[$i],$data->phone) : '';
            $code           = ($request->code == 'show') ? array_push($myArrayData[$i],$data->code_number) : '';
            $date_register  = ($request->date_register == 'show') ? array_push($myArrayData[$i],DateThai($data->created_at)) : '';
            $status         = ($request->status == 'show') ? array_push($myArrayData[$i],$data->status) : '';
            $link_image     = ($request->link_image == 'show') ? array_push($myArrayData[$i],asset('images/'.$data->id.'/'.$data->image.'')) : '';
        }

        $filename = 'memberduplicate';
        return zipfile('memberduplicate.zip',$myArrayHeaders,$myArrayData,$request->pass,$filename);

        //https://www.programmersought.com/article/78061553647/
        
    }
    

}
