<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\receipt;
use App\Images;
use App\User_otp;


class ExportController extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }

    public function folder(){return 'export';}

    public function index(Request $request){
        if($request->search){

            $member = DB::table('receipt')
            ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
            ->select('name','last_name','phone'
            ,'receipt_product_1','receipt_product_2'
            ,'receipt_product_3','receipt_product_4'
            ,'receipt_product_5','receipt_product_6')
            ->Where('name',$request->search)
            ->orWhere('last_name',$request->search)
            ->orWhere('phone',$request->search)
            ->orderBy('receipt.id', 'DESC')
            ->paginate(30);
        
        }else{

            $member = DB::table('receipt')
            ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
            ->select('name','last_name','phone'
            ,'receipt_product_1','receipt_product_2'
            ,'receipt_product_3','receipt_product_4'
            ,'receipt_product_5','receipt_product_6')
            ->orderBy('receipt.id', 'DESC')
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
        //receipt_product_1


        $member = DB::table('receipt')
        ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
        ->select('name','last_name','phone'
        ,'receipt_product_1','receipt_product_2'
        ,'receipt_product_3','receipt_product_4'
        ,'receipt_product_5','receipt_product_6')
        ->orderBy('receipt.id', 'DESC')
        ->get();

        function checkTxt($data){
            switch ($data) {
                case 0 : $reTrunData = '-- ไม่เลือก --'; break;
                case 1 : $reTrunData = 'ผลิตภัณฑ์ทำความสะอาด'; break;
                case 2 : $reTrunData = 'ผลิตภัณฑ์เพื่อสุขภาพ&ความงาม'; break;
                case 3 : $reTrunData = 'เครื่องดื่มขนมขบเคี้ยว ของหวาน'; break;
                case 4 : $reTrunData = 'อุปกรณ์ทำความสะอาด'; break;
                case 5 : $reTrunData = 'ผลิตภัณฑ์สำหรับเด็ก'; break;
                case 6 : $reTrunData = 'ผลิตภัณฑ์และอุปกรณ์การซักรีด'; break;
                case 7 : $reTrunData = 'ไฮยีนส์ น้ำยาซักผ้าขาว'; break;
                case 8 : $reTrunData = 'ไฮยีนส์ น้ำย่ซักผ้าสี'; break;
                case 9 : $reTrunData = 'ไฮยีนส์ น้ำยารีดผ้า'; break;
                default : $reTrunData = ''; break;
            }
            return $reTrunData;
         }
         
        $myArrayHeaders = array('ลำดับ');
        $name           = ($request->name == 'show') ? $myArrayHeaders[] = "ชื่อ" : '';
        $last_name      = ($request->last_name == 'show') ? $myArrayHeaders[] = "นามสกุล" : '';
        $phone          = ($request->phone == 'show') ? $myArrayHeaders[] = "เบอร์โทร" : '';
        $receipt_product_1           = ($request->receipt_product_1 == 'show') ? $myArrayHeaders[] = "กลุ่มสินค้าที่ชื้อร่วม 1" : '';
        $receipt_product_2           = ($request->receipt_product_2 == 'show') ? $myArrayHeaders[] = "กลุ่มสินค้าที่ชื้อร่วม 2" : '';
        $receipt_product_3           = ($request->receipt_product_3 == 'show') ? $myArrayHeaders[] = "กลุ่มสินค้าที่ชื้อร่วม 3" : '';
        $receipt_product_4           = ($request->receipt_product_4 == 'show') ? $myArrayHeaders[] = "กลุ่มสินค้าที่ชื้อร่วม 4" : '';
        $receipt_product_5           = ($request->receipt_product_5 == 'show') ? $myArrayHeaders[] = "กลุ่มสินค้าที่ชื้อร่วม 5" : '';
        $receipt_product_6           = ($request->receipt_product_6 == 'show') ? $myArrayHeaders[] = "กลุ่มสินค้าที่ชื้อร่วม 6" : '';

        header('Content-Type: text/html; charset=utf-8');
        
        $myArrayData = array();
        $i = 0;
        foreach($member as $data){
            $i++;
            $myArrayData[$i] = array($i);
            $name           = ($request->name == 'show') ?  array_push($myArrayData[$i],$data->name) : '';
            $last_name      = ($request->last_name == 'show') ?   array_push($myArrayData[$i],$data->last_name) : '';
            $phone          = ($request->phone == 'show') ? array_push($myArrayData[$i],$data->phone) : '';
            $receipt_product_1           = ($request->receipt_product_1 == 'show') ? array_push($myArrayData[$i],checkTxt($data->receipt_product_1)) : '';
            $receipt_product_2           = ($request->receipt_product_2 == 'show') ? array_push($myArrayData[$i],checkTxt($data->receipt_product_2)) : '';
            $receipt_product_3           = ($request->receipt_product_3 == 'show') ? array_push($myArrayData[$i],checkTxt($data->receipt_product_3)) : '';
            $receipt_product_4           = ($request->receipt_product_4 == 'show') ? array_push($myArrayData[$i],checkTxt($data->receipt_product_4)) : '';
            $receipt_product_5           = ($request->receipt_product_5 == 'show') ? array_push($myArrayData[$i],checkTxt($data->receipt_product_5)) : '';
            $receipt_product_6           = ($request->receipt_product_6 == 'show') ? array_push($myArrayData[$i],checkTxt($data->receipt_product_6)) : '';
        }

        $filename = 'Export_Group_Product';
        return zipfile('Export_Group_Product.zip',$myArrayHeaders,$myArrayData,$request->pass,$filename);

        //https://www.programmersought.com/article/78061553647/
        
    }
    

}
