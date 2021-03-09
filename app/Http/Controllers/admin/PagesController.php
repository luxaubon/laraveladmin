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

    }

    public function folder(){return 'page';}
    public function status(){return 'Pages';}

    public function index()
    {
        //$user = Auth::user();
        
        $pages = Pages::all()->where('status',$this->status());
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

     public function store(Request $request){
    	$this->validate(request(), [
            'seo_th' => 'required',
        ]);
        
        $seo[] =  array(
                        'seo_th' =>  (mysql_escape(stripslashes($request->seo_th))),
                    );   
        $title[] =  array(
                        'title_th' =>  (mysql_escape(stripslashes($request->title_th))),
                    );
        $caption[] =  array(
                        'caption_th' =>  (mysql_escape(stripslashes($request->caption_th))),
                    );
        $detail[] =  array(
                        'detail_th' =>  (stripslashes($request->detail_th)),
                    );

        $post = new Pages;
        $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
        $post->title = json_encode($title,JSON_UNESCAPED_UNICODE);
        $post->caption = json_encode($caption,JSON_UNESCAPED_UNICODE);
        $post->detail = json_encode($detail,JSON_UNESCAPED_UNICODE);
        $post->status = $this->status();
        $post->online = $request->online;
        $post->save();

        $pages = Pages::all()->where('status',$this->status());
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
        );

         return redirect()->back();
    
    }

    public function show($id)
    {
        $pages_id = Pages::findOrFail($id);
        $pages = Pages::all()->where('status',$this->status());
        //$image = Pages::find($id)->images;
        $gallery = explode(",",$pages_id->gallery);
        foreach($gallery as $value) {
           $image[] = Images::find($value);
        }
        
        $data = array(
            'pages_id' => $pages_id,
            'pages' => $pages,
            'folder' => $this->folder(),
            'image' => $image,
         );
        return view('admin.'.$this->folder().'.index',$data);
    }
    public function edit(Request $request)
    {
       $this->validate(request(), [
            'seo_th' => 'required',
        ]);

       $post = Pages::find($request->id);


        $seo[] =  array(
                        'seo_th' =>  (mysql_escape(stripslashes($request->seo_th))),
                    );   
        $title[] =  array(
                        'title_th' =>  (mysql_escape(stripslashes($request->title_th))),
                    );
        $caption[] =  array(
                        'caption_th' =>  (mysql_escape(stripslashes($request->caption_th))),
                    );
        $detail[] =  array(
                        'detail_th' =>  (stripslashes($request->detail_th)),
                    );

        $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
        $post->title = json_encode($title,JSON_UNESCAPED_UNICODE);
        $post->caption = json_encode($caption,JSON_UNESCAPED_UNICODE);
        $post->detail = json_encode($detail,JSON_UNESCAPED_UNICODE);
        $post->status = $this->status();
        $post->online = $request->online;
        $post->save();

       return redirect()->back();
    }

    public function del_content(Request $request){
        $page = Pages::find($request->numrow);

        if ($page->image) {
            LaraFile::delete("public/images/".$page->image);
        }
        $gallery = explode(",",$page->gallery);
        foreach($gallery as $value) {
           $image = Images::find($value);
           LaraFile::delete("public/images/".$value->image);
           $image->delete();
        }

        $page->delete();
        
    }

    public function update_listpic(Request $request){
        if($request->x=="") { $post_item=0; } else { $post_item=$request->x;}
        if($request->y=="") { $post_location=0; } else { $post_location=$request->y; } 
        if($request->id=="") { $request->id=0; } else { $request->id; } 

        $page = Pages::find($request->id);

        $name_edit=explode(",",$page->gallery);         
        $totalrow=count($name_edit); // จำนวนข้อมูล
        $ac=0;
        $postadd="";
        $stopfeed=$totalrow-1; 
        for ($i=0; $i < $totalrow ; $i++ ){ 
        if($post_location==$i) {$postadd.=$post_item; if($i<$stopfeed) { $postadd.=","; }   $ac--;} else {      
        if($post_item!=$name_edit[$ac]) {  $postadd.=$name_edit[$ac];   if($i<$stopfeed) { $postadd.=","; }   } else {
        $ac++;$postadd.=$name_edit[$ac];    if($i<$stopfeed) { $postadd.=","; }}}$ac++;}

        $page->gallery = $postadd;
        $page->save();     
    }

    public function del_img(Request $request){
        $images = Images::find($request->numrow);
        $page = Pages::find($request->id);

        $name_delpic=explode(",",$page->gallery);           
        $totaldelpic=count($name_delpic); // จำนวนข้อมูล
        $listgroup_update='';   
        for ($i=0; $i < $totaldelpic-1 ; $i++ ) { if($name_delpic[$i]!=$request->numrow) {$listgroup_update.=$name_delpic[$i].','; } } // ดึงค่าลำดับกลุ่ม

        // UPDATE
        $page->gallery = $listgroup_update;
        $page->save();
        //DELET FILES
        LaraFile::delete("public/images/".$images->image);
        // DELETE DATABSE
        $images->delete();
        
    }

}
