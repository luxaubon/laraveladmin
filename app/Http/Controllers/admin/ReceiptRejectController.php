<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\receipt;
use App\region;
use App\Images;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as LaraFile;

class ReceiptRejectController extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }


    public function folder(){return 'receipt_reject';}
    public function statis(){return 3;}

    public function index(Request $request){
        if($request->search){

            $member = DB::table('receipt')
            ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
            ->select('receipt.id','name', 'last_name', 'phone', 'receipt.created_at','receipt_status','admin_name','receipt_reject')
            ->Where('receipt_status','=',$this->statis())
            ->orWhere('name',$request->search)
            ->orWhere('last_name',$request->search)
            ->orWhere('phone',$request->search)
            ->orderBy('id', 'DESC')
            ->paginate(30);
        
        }else{

            $member = DB::table('receipt')
            ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
            ->select('receipt.id','name', 'last_name', 'phone', 'receipt.created_at','receipt_status','admin_name','receipt_reject')
            ->Where('receipt_status','=',$this->statis())
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
    
    public function show($id)
    {
        //dd(Auth::user()->id);

        $pages_id = receipt::findOrFail($id);
        $member = DB::table('receipt')
        ->join('user_otp', 'receipt.member_id', '=', 'user_otp.id')
        ->select('receipt.id','name', 'last_name', 'phone', 'receipt.created_at','receipt_status','admin_name','receipt_reject')
        ->Where('receipt_status','=',$this->statis())
        ->orderBy('receipt.id', 'DESC')
        ->paginate(30);

        $gallery = explode(",",$pages_id->gallery);
        foreach($gallery as $value) {
           $image[] = Images::find($value);
        }

        $region = DB::table('region')->select('region_name')->distinct('region_name')->where('status',1)->groupBy('region_name')->get();
        $shop_name = region::where('status',2)->get();

        $data = array(
            'member' => $member,
            'pages_id' => $pages_id,
            'folder' => $this->folder(),
            'image' => $image,
            'region' => $region,
            'shop_name' => $shop_name,
        );
        
        return view('admin.'.$this->folder().'.index',$data);
    }

    //$date_start = $request->date_start == '' ?  "" : strtotime($request->date_start);
    public function edit(Request $request){
        $receipt_date = $request->receipt_date == '' ?  "" : strtotime($request->receipt_date);

        $check = receipt::whereNotIn('id', [$request->id])->where('receipt_number','=',$request->receipt_number)->where('receipt_date','=',$receipt_date)->first();
        if($check){
            $this->validate(
                request(), 
                ['code_error' => 'required'],
                ['code_error.required' => 'เลขที่ใบเสร็จและเวลาตรงกัน กรุณาตรวจสอบอีกครั้ง']
            );
        }else{
            $this->validate(request(), [
                'receipt_number'    => 'required',
                'receipt_date'      => 'required',
                'receipt_price'     => 'required',
                'receipt_point'     => 'required',
                'receipt_status'    => 'required',
            ]);

            $post = receipt::findOrFail($request->id);
            $member_id = $request->member_id;

            if ($request->hasFile('files')) {
                    $photos = $request->file('files');
                    $images_id = '';
                    $i=0;
                    foreach ($photos as $photo) {
                        if($photo != ''){
                            $i++;
                            $extension          = $photo->getClientOriginalExtension();
                            $nameimages         = $member_id.'-'.$i.'-'.date('dms').'-'.rand(0,99999).'.'.$extension;
                            $paths              = $photo->move('images/'.$member_id.'/', $nameimages);
                            $images             = new Images;
                            $images->sid        = $member_id;
                            $images->table      = 'user_otp';
                            $images->image      = $nameimages;
                            $images->receipt_id = $request->id;
                            $images->save();
                            $images_id.=  $images->id.',';
                        }
                    }
                    $gallery = $post->gallery.$images_id;
                    $post->gallery = $gallery;
                }
                
                
                if($request->region_id_dealer){
                    $region_id = $request->region_id_dealer;
                }else if($request->region_id_company){
                    $region_id = $request->region_id_company;
                }else if($request->region_id){
                    $region_id = $request->region_id;
                }
                $shop_name = region::find($region_id);
                
                $post->receipt_number       = $request->receipt_number;
                $post->receipt_date         = $receipt_date;
                $post->receipt_price        = $request->receipt_price;
                $post->receipt_product_1    = ($request->receipt_product_1) ? $request->receipt_product_1 : '';
                $post->receipt_product_2    = ($request->receipt_product_2) ? $request->receipt_product_2 : '';
                $post->receipt_product_3    = ($request->receipt_product_3) ? $request->receipt_product_3 : '';
                $post->receipt_product_4    = ($request->receipt_product_4) ? $request->receipt_product_4 : '';
                $post->receipt_product_5    = ($request->receipt_product_5) ? $request->receipt_product_5 : '';
                $post->receipt_product_6    = ($request->receipt_product_6) ? $request->receipt_product_6 : '';
                $post->receipt_status       = $request->receipt_status;
                $post->receipt_point        = $request->receipt_point;
                $post->admin_id             = Auth::user()->id;
                $post->region_id            = ($shop_name->region_id) ? $shop_name->region_id : '';
                $post->region_name	        = ($request->region) ? $request->region : '';
                $post->region_province      = ($request->province) ? $request->province : '';
                $post->shop_name            = ($shop_name->shop_name) ? $shop_name->shop_name : '';
                $post->status_shop          = ($request->status_shop) ? $request->status_shop : '';
                $post->save();

                return redirect('/admin/'.$this->folder().'/index');
        }
    }

    public function del_img(Request $request){
        $images = Images::find($request->numrow);
        $page = receipt::find($request->id);

        $name_delpic=explode(",",$page->gallery);           
        $totaldelpic=count($name_delpic); // จำนวนข้อมูล
        $listgroup_update='';   
        for ($i=0; $i < $totaldelpic-1 ; $i++ ) { if($name_delpic[$i]!=$request->numrow) {$listgroup_update.=$name_delpic[$i].','; } } // ดึงค่าลำดับกลุ่ม

        // UPDATE
        $page->gallery = $listgroup_update;
        $page->save();
        //DELET FILES
        @LaraFile::delete("images/".$page->member_id.'/'.$images->image);
        // DELETE DATABSE
        $images->delete();
        
    }

    public function del_content(Request $request){
        $post = receipt::find($request->numrow);
        $post->receipt_reject = $request->rejectText;
        $post->admin_id = Auth::user()->id;
        $post->admin_name = Auth::user()->name;
        $post->receipt_status = 3;
        $post->save();
    }

    // public function zipFiles(Request $request){
        
    //     $member = DB::table('images')
    //     ->join('user_otp', 'images.sid', '=', 'user_otp.id')
    //     ->select('user_otp.id','name', 'last_name', 'phone', 'code_number', 'images.created_at', 'images.image', 'images.status')
    //     ->orderBy('id', 'DESC')
    //     ->get();

    //     $myArrayHeaders = array('ลำดับ');
    //     $name           = ($request->name == 'show') ? $myArrayHeaders[] = "ชื่อ" : '';
    //     $last_name      = ($request->last_name == 'show') ? $myArrayHeaders[] = "นามสกุล" : '';
    //     $phone          = ($request->phone == 'show') ? $myArrayHeaders[] = "เบอร์โทร" : '';
    //     $code           = ($request->code == 'show') ? $myArrayHeaders[] = "รหัสใต้ฝา" : '';
    //     $date_register  = ($request->date_register == 'show') ? $myArrayHeaders[] = "วันที่สมัคร" : '';
    //     $status         = ($request->status == 'show') ? $myArrayHeaders[] = "สถานะ" : '';
    //     $link_image     = ($request->link_image == 'show') ? $myArrayHeaders[] = "link รูป" : '';
    //     header('Content-Type: text/html; charset=utf-8');
        
    //     $myArrayData = array();
    //     $i = 0;
    //     foreach($member as $data){
    //         $i++;
    //         $myArrayData[$i] = array($i);
    //         $name           = ($request->name == 'show') ?  array_push($myArrayData[$i],$data->name) : '';
    //         $last_name      = ($request->last_name == 'show') ?   array_push($myArrayData[$i],$data->last_name) : '';
    //         $phone          = ($request->phone == 'show') ? array_push($myArrayData[$i],$data->phone) : '';
    //         $code           = ($request->code == 'show') ? array_push($myArrayData[$i],$data->code_number) : '';
    //         $date_register  = ($request->date_register == 'show') ? array_push($myArrayData[$i],DateThai($data->created_at)) : '';
    //         $status         = ($request->status == 'show') ? array_push($myArrayData[$i],$data->status) : '';
    //         $link_image     = ($request->link_image == 'show') ? array_push($myArrayData[$i],asset('images/'.$data->id.'/'.$data->image.'')) : '';
    //     }

    //     $filename = 'memberallstatus';
    //     return zipfile('memberallstatus.zip',$myArrayHeaders,$myArrayData,$request->pass,$filename);

    //     //https://www.programmersought.com/article/78061553647/
        
    // }
    

}
