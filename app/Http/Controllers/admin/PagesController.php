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
            'seo_th' => 'required|max:50',
            'seo_en' => 'required|max:50'
        ]);
        
        if ($request->hasFile('files')) {
            $photos = $request->file('files');
            $images_id = '';
            $i=0;
            foreach ($photos as $photo) {
                if($photo != ''){
                    $i++;
                    $extension = $photo->getClientOriginalExtension();
                    $nameimages = 'gallery'.date('dym').time('ss').$i.'.'.$extension;
                    $paths   = $photo->move('public/images/', $nameimages);
                    $images = new Images;
                    $images->table = $this->folder();
                    $images->image = $nameimages;
                    $images->save();
                    $images_id.=  $images->id.',';
                }
            }
        }else{ $images_id = ''; }
        if ($request->hasFile('image')) {
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
        }else{$filename='';}
        if ($request->hasFile('slidefacebook')) {
            $sfname = 'sf'.date('dym').time().'.'.$request->slidefacebook->getClientOriginalExtension();
            $slidefacebook = $request->slidefacebook->move('public/images/',$sfname);
        }else{$sfname='';}
        if ($request->hasFile('slide')) {
            $slidename = 'slide'.date('dym').time().'.'.$request->slide->getClientOriginalExtension();
            $slide = $request->slide->move('public/images/',$slidename);
        }else{$slidename='';}
    
        $seo[] =  array(
                        'seo_th' =>  (mysql_escape(stripslashes(slug($request->seo_th)))),
                        'seo_en' =>  (mysql_escape(stripslashes(slug($request->seo_en))))
                    );   
        $title[] =  array(
                        'title_th' =>  (mysql_escape(stripslashes($request->title_th))),
                        'title_en' =>  (mysql_escape(stripslashes($request->title_en)))
                    );
        $caption[] =  array(
                        'caption_th' =>  (mysql_escape(stripslashes($request->caption_th))),
                        'caption_en' =>  (mysql_escape(stripslashes($request->caption_en)))
                    );
        $detail[] =  array(
                        'detail_th' =>  (mysql_escape(stripslashes($request->detail_th))),
                        'detail_en' =>  (mysql_escape(stripslashes($request->detail_en)))
                    );
        $date_start = $request->date_start == '' ?  "" : strtotime($request->date_start);
        $date_stop = $request->date_stop == '' ?  "" : strtotime($request->date_stop);


        $post = new Pages;
        $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
        //$post->keyword = $request->keyword;
        //$post->description = $request->description;
        $post->title = json_encode($title,JSON_UNESCAPED_UNICODE);
        $post->caption = json_encode($caption,JSON_UNESCAPED_UNICODE);
        $post->detail = json_encode($detail,JSON_UNESCAPED_UNICODE);
        $post->title_ss = $request->title_ss;
        $post->description_ss = $request->description_ss;
        $post->status = $this->status();
        $post->online = $request->online;
        $post->image = $filename;
        $post->slide = $slidename;
        $post->slidefacebook = $sfname;
        $post->gallery = $images_id;
        $post->date_start = $date_start;
        $post->date_stop = $date_stop;
        //$post->tags = $request->tags;
        $post->save();

        $pages = Pages::all()->where('status',$this->status());
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
        );

        return view('admin.'.$this->folder().'.index',$data);
    
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
            'seo_th' => 'required|max:50',
            'seo_en' => 'required|max:50',
        ]);

       $post = Pages::find($request->id);

       if ($request->hasFile('files')) {
       $photos = $request->file('files');
        $images_id = '';
        $i=0;
        foreach ($photos as $photo) {
            if($photo != ''){
                $i++;
                $extension = $photo->getClientOriginalExtension();
                $nameimages = 'gallery'.date('dym').time('ss').$i.'.'.$extension;
                $paths   = $photo->move('public/images/', $nameimages);
                $images = new Images;
                $images->table = $this->folder();
                $images->image = $nameimages;
                $images->save();
                $images_id.=  $images->id.',';
            }
        }
            $gallery = $post->gallery.$images_id;
             $post->gallery = $gallery;
        }
        

        if ($request->hasFile('image')) {
            LaraFile::delete("public/images/".$post->image);
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
            $post->image = $filename;
        }
        if ($request->hasFile('slidefacebook')) {
            LaraFile::delete("public/images/".$post->slidefacebook);
            $sfname = 'sf'.date('dym').time().'.'.$request->slidefacebook->getClientOriginalExtension();
            $slidefacebook = $request->slidefacebook->move('public/images/',$sfname);
            $post->slidefacebook = $sfname;
        }
        if ($request->hasFile('slide')) {
            LaraFile::delete("public/images/".$post->slide);
            $slidename = 'slide'.date('dym').time().'.'.$request->slide->getClientOriginalExtension();
            $slide = $request->slide->move('public/images/',$slidename);
            $post->slide = $slidename;
        }

        $date_start = $request->date_start == '' ?  "" : strtotime($request->date_start);
        $date_stop = $request->date_stop == '' ?  "" : strtotime($request->date_stop);
        
        $seo[] =  array(
                        'seo_th' =>  (mysql_escape(stripslashes(slug($request->seo_th)))),
                        'seo_en' =>  (mysql_escape(stripslashes(slug($request->seo_en))))
                    );   
        $title[] =  array(
                        'title_th' =>  (mysql_escape(stripslashes($request->title_th))),
                        'title_en' =>  (mysql_escape(stripslashes($request->title_en)))
                    );
        $caption[] =  array(
                        'caption_th' =>  (mysql_escape(stripslashes($request->caption_th))),
                        'caption_en' =>  (mysql_escape(stripslashes($request->caption_en)))
                    );
        $detail[] =  array(
                        'detail_th' =>  (mysql_escape(stripslashes($request->detail_th))),
                        'detail_en' =>  (mysql_escape(stripslashes($request->detail_en)))
                    );

        $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
        //$post->keyword = $request->keyword;
        //$post->description = $request->description;
        $post->title = json_encode($title,JSON_UNESCAPED_UNICODE);
        $post->caption = json_encode($caption,JSON_UNESCAPED_UNICODE);
        $post->detail = json_encode($detail,JSON_UNESCAPED_UNICODE);
        $post->title_ss = $request->title_ss;
        $post->description_ss = $request->description_ss;
        $post->status = $this->status();
        $post->online = $request->online;
        $post->date_start = $date_start;
        $post->date_stop = $date_stop;
        //$post->tags = $request->tags;
        $post->save();

        /*$pages = Pages::all()->where('status',$this->status());
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
        );*/
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
