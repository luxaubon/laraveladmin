<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use App\Images;
use Auth;

use Illuminate\Support\Facades\File as LaraFile;

// add this
/*
use App\File;
use Illuminate\Support\Facades\DB;
LaraFile::delete("public/images/main-1549017697.png");
$time_stamp = time();
&&  ((date_start <= $time_stamp) && (date_stop='' || ( date_stop >= $time_stamp) ))
*/
class PagesController extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);
        $admin = Auth::user();
    }

    public function folder(){return 'page';}
    public function status(){return 'DiscountCoupons';}

    public function index()
    {

        
        $pages = Pages::where('status',$this->status())->orderBy('id', 'DESC')->paginate(10);
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

     public function store(Request $request){

        $this->validate(
            request(), 
                [
                    'seo'           => 'required',
                    'title'         => 'required',
                    'code_number'   => 'required',
                    'image'         => 'required'
                ],[
                    'seo.required'          => 'กรุณากรอก Seo Title',
                    'title.required'        => 'กรุณากรอก Title',
                    'code_number.required'  => 'กรุณากรอก Code',
                    'image.required'        => 'กรุณาเลือกรูปภาพ'
                ]
        );

        if ($request->hasFile('image')) {
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('images/',$filename);
        }else{$filename='';}

        $post                   = new Pages;
        $post->seo              = mysql_escape(stripslashes(slug($request->seo)));
        $post->title            = mysql_escape(stripslashes($request->title));
        $post->detail           = stripslashes($request->detail);
        $post->status           = $this->status();
        $post->online           = $request->online;
        $post->image            = $filename;
        $post->code_number      = $request->code_number;
        $post->shop_code        = $request->shop_code;
        $post->count_down       = $request->count_down;
        $post->receipt_number   = $request->receipt_number;
        $post->receipt_upload   = $request->receipt_upload;
        $post->save();

         return redirect()->back();
    
    }

    public function show($id)
    {
        $pages_id = Pages::findOrFail($id);
        $pages = Pages::where('status',$this->status())->orderBy('id', 'DESC')->paginate(10);
        //$image = Pages::find($id)->images;
        // $gallery = explode(",",$pages_id->gallery);
        // foreach($gallery as $value) {
        //    $image[] = Images::find($value);
        // }
        
        $data = array(
            'pages_id' => $pages_id,
            'pages' => $pages,
            'folder' => $this->folder(),
            //'image' => $image,
         );
        return view('admin.'.$this->folder().'.index',$data);
    }
    public function edit(Request $request)
    {
        $this->validate(
            request(), 
                [
                    'seo'           => 'required',
                    'title'         => 'required',
                    'code_number'   => 'required',
                ],[
                    'seo.required'          => 'กรุณากรอก Seo Title',
                    'title.required'        => 'กรุณากรอก Title',
                    'code_number.required'  => 'กรุณากรอก Code',
                ]
        );

        $post = Pages::find($request->id);

        if ($request->hasFile('image')) {
            LaraFile::delete("images/".$post->image);
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('images/',$filename);
            $post->image        = $filename;
        }

        $post->seo              = mysql_escape(stripslashes(slug($request->seo)));
        $post->title            = mysql_escape(stripslashes($request->title));
        $post->detail           = stripslashes($request->detail);
        $post->status           = $this->status();
        $post->online           = $request->online;
        $post->code_number      = $request->code_number;
        $post->shop_code        = $request->shop_code;
        $post->count_down       = $request->count_down;
        $post->receipt_number   = $request->receipt_number;
        $post->receipt_upload   = $request->receipt_upload;
        $post->save();

       return redirect()->back();
    }

    public function del_content(Request $request){
        $page = Pages::find($request->numrow);
        if ($page->image) {
            LaraFile::delete("images/".$page->image);
        }
        // $gallery = explode(",",$page->gallery);
        // foreach($gallery as $value) {
        //    $image = Images::find($value);
        //    LaraFile::delete("public/images/".$value->image);
        //    $image->delete();
        // }

        $page->delete();
        
    }

    // public function update_listpic(Request $request){
    //     if($request->x=="") { $post_item=0; } else { $post_item=$request->x;}
    //     if($request->y=="") { $post_location=0; } else { $post_location=$request->y; } 
    //     if($request->id=="") { $request->id=0; } else { $request->id; } 

    //     $page = Pages::find($request->id);

    //     $name_edit=explode(",",$page->gallery);         
    //     $totalrow=count($name_edit); // จำนวนข้อมูล
    //     $ac=0;
    //     $postadd="";
    //     $stopfeed=$totalrow-1; 
    //     for ($i=0; $i < $totalrow ; $i++ ){ 
    //     if($post_location==$i) {$postadd.=$post_item; if($i<$stopfeed) { $postadd.=","; }   $ac--;} else {      
    //     if($post_item!=$name_edit[$ac]) {  $postadd.=$name_edit[$ac];   if($i<$stopfeed) { $postadd.=","; }   } else {
    //     $ac++;$postadd.=$name_edit[$ac];    if($i<$stopfeed) { $postadd.=","; }}}$ac++;}

    //     $page->gallery = $postadd;
    //     $page->save();     
    // }

    // public function del_img(Request $request){
    //     $images = Images::find($request->numrow);
    //     $page = Pages::find($request->id);

    //     $name_delpic=explode(",",$page->gallery);           
    //     $totaldelpic=count($name_delpic); // จำนวนข้อมูล
    //     $listgroup_update='';   
    //     for ($i=0; $i < $totaldelpic-1 ; $i++ ) { if($name_delpic[$i]!=$request->numrow) {$listgroup_update.=$name_delpic[$i].','; } } // ดึงค่าลำดับกลุ่ม

    //     // UPDATE
    //     $page->gallery = $listgroup_update;
    //     $page->save();
    //     //DELET FILES
    //     LaraFile::delete("public/images/".$images->image);
    //     // DELETE DATABSE
    //     $images->delete();
        
    // }

}
