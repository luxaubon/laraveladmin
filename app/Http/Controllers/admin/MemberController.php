<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\receipt;
use App\region;
use App\Images;
use App\User_otp;

class MemberController extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }

    public function folder(){return 'member';}
    public function statis(){return 2;}

    public function index(Request $request){

        if($request->search){
            $member = receipt::groupBy('member_id')
            ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
            ->selectRaw('sum(receipt_point) as total,receipt.id,name,last_name,phone,receipt.created_at,receipt_status,receipt_point,status_shop')
            ->Where('receipt_status','=',$this->statis())
            ->Where('name',$request->search)
            ->orWhere('last_name',$request->search)
            ->orWhere('phone',$request->search)
            ->orderBy('receipt.id', 'DESC')
            ->paginate(30);
        
        }else{
            $member = receipt::groupBy('member_id')
            ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
            ->selectRaw('sum(receipt_point) as total,receipt.id,name,last_name,phone,receipt.created_at,receipt_status,receipt_point,status_shop')
            ->Where('receipt_status','=',$this->statis())
            ->orderBy('receipt.id', 'DESC')
            ->paginate(30);
        }

        // $member = receipt::groupBy('member_id')
        // ->selectRaw('member_id,receipt_status,status_shop, sum(receipt_point) as total')
        // ->where('receipt_status','=',$this->statis())
        // ->orderBy('total', 'DESC')
        // ->get();
        // foreach($member as $members){
        //     $showMember = User_otp::where('id','=',$members['member_id'])->first();
        //     for($i = 0; $i < $members['total']; $i++){
        //             $myArray[] = array(
        //                 'name' => $showMember->name,
        //                 'last_name' => $showMember->last_name,
        //                 'phone' => $showMember->phone,
        //                 'created_at' => $showMember->created_at,
        //                 'updated_at' => $showMember->updated_at,
        //                 'receipt_status' => $members->receipt_status,//receipt_status
        //                 'status_shop' => $members->status_shop,//status_shop
        //             );
        //     }
        // }
        // echo '<pre>';
        // print_r($myArray[0]);
        // echo '</pre>';
        // die();

        $data = array(
            'member' => $member,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

    public function zipFiles(Request $request){
        
        $member = receipt::groupBy('member_id')
        ->selectRaw('member_id,receipt_status,status_shop, sum(receipt_point) as total')
        ->where('receipt_status','=',$this->statis())
        ->orderBy('total', 'DESC')
        ->get();
        

        $myArrayHeaders = array('ลำดับ');
        $name           = ($request->name == 'show') ? $myArrayHeaders[] = "ชื่อ" : '';
        $last_name      = ($request->last_name == 'show') ? $myArrayHeaders[] = "นามสกุล" : '';
        $phone          = ($request->phone == 'show') ? $myArrayHeaders[] = "เบอร์โทร" : '';
        $shop_status    = ($request->shop_status == 'show') ? $myArrayHeaders[] = "ร้านค้า" : '';
        $date_register  = ($request->date_register == 'show') ? $myArrayHeaders[] = "วันที่สมัคร" : '';
        $status         = ($request->status == 'show') ? $myArrayHeaders[] = "สถานะ" : '';
        $link_image     = ($request->link_image == 'show') ? $myArrayHeaders[] = "link รูป" : '';
        header('Content-Type: text/html; charset=utf-8');
        foreach($member as $members){
            $showMember = User_otp::where('id','=',$members['member_id'])->first();
            for($i = 0; $i < $members['total']; $i++){

                if($members->status_shop == 'dealer'){
                    $txt = 'ร้านค้าตัวแทนจำหน่าย';
                }else{
                    $txt = 'ร้านค้าชั้นนำ';
                }

                if($members->receipt_status == 1){
                    $status = 'Waiting';
                }else if($members->receipt_status == 2){
                    $status = 'Approved';
                }else if($members->receipt_status == 3){
                    $status = 'Reject';
                }else{
                    $status = 'Reject';
                }

                $myArrayData[] = array(
                    //$myArrayData[0] + 1,
                    ($request->name == 'show') ? $showMember->name : '',
                    ($request->last_name == 'show') ?   $showMember->last_name : '',
                    ($request->phone == 'show') ? $showMember->phone : '',
                    ($request->shop_status == 'show') ?   $txt : '',
                    ($request->date_register == 'show') ? DateThai($showMember->created_at) : '',
                    ($request->status == 'show') ?   $status : '',
                    //($request->link_image == 'show') ? asset('images/'.$members->id.'/'.$members->image.''): ''
                );
            }
        }
        // echo '<pre>';
        // print_r($myArrayData);
        // echo '</pre>';
        // die();
        

        $filename = 'member';
        return zipfile('member.zip',$myArrayHeaders,$myArrayData,$request->pass,$filename);

        //https://www.programmersought.com/article/78061553647/
        
    }
    

}
