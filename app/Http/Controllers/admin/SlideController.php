<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Slides;
use App\Db_other;
use Auth;
use Illuminate\Support\Facades\File as LaraFile;

class SlideController extends Controller
{
     public function __construct(){

        //$this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }
    public function folder(){return 'slide';}
     public function id(){return 1;}

     public function index()
    {
        $pages = Db_other::find($this->id());
        if($pages->gallery != ''){
            $gallery = explode(",",$pages->gallery);
            foreach($gallery as $value) {
               $image[] = Slides::find($value);
            }
        }else {$image = ''; }
        $data = array(
            'pages_id' => '',
            'folder' => $this->folder(),
            'image' => $image,
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

    public function show($id)
    {
        $pages_id = Slides::findOrFail($id);


        $pages = Db_other::find($this->id());
        $gallery = explode(",",$pages->gallery);
        foreach($gallery as $value) {
           $image[] = Slides::find($value);
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
            'title_th' => 'required|max:50',
            'title_en' => 'required|max:50'
        ]);

       $post = Slides::find($request->editID);
         $title[] =  array(
                        'title_th' =>  (mysql_escape(stripslashes($request->title_th))),
                        'title_en' =>  (mysql_escape(stripslashes($request->title_en)))
                    );
        $caption[] =  array(
                        'caption_th' =>  (mysql_escape(stripslashes($request->caption_th))),
                        'caption_en' =>  (mysql_escape(stripslashes($request->caption_en)))
                    );
        $link[] =  array(
                        'link_th' =>  (mysql_escape(stripslashes($request->link_th))),
                        'link_en' =>  (mysql_escape(stripslashes($request->link_en)))
                    );
        
        if ($request->hasFile('image')) {
            LaraFile::delete("public/images/".$post->image);
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
            $post->image = $filename;
        }

        $post->title = json_encode($title,JSON_UNESCAPED_UNICODE);
        $post->caption = json_encode($caption,JSON_UNESCAPED_UNICODE);
        $post->link = json_encode($link,JSON_UNESCAPED_UNICODE);
        $post->online = $request->online;
        $post->save();

       return redirect()->back();
    }


    public function store(Request $request){
        $this->validate(request(), [
            'title_th' => 'required|max:50',
            'title_en' => 'required|max:50'
        ]);
        if ($request->hasFile('image')) {
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
        }else{$filename='';}

        $title[] =  array(
                        'title_th' =>  (mysql_escape(stripslashes($request->title_th))),
                        'title_en' =>  (mysql_escape(stripslashes($request->title_en)))
                    );
        $caption[] =  array(
                        'caption_th' =>  (mysql_escape(stripslashes($request->caption_th))),
                        'caption_en' =>  (mysql_escape(stripslashes($request->caption_en)))
                    );
        $link[] =  array(
                        'link_th' =>  (mysql_escape(stripslashes($request->link_th))),
                        'link_en' =>  (mysql_escape(stripslashes($request->link_en)))
                    );

        $post = new Slides;
        $post->title = json_encode($title,JSON_UNESCAPED_UNICODE);
        $post->caption = json_encode($caption,JSON_UNESCAPED_UNICODE);
        $post->link = json_encode($link,JSON_UNESCAPED_UNICODE);
        $post->online = $request->online;
        $post->image = $filename;
        $post->save();

        
        $update = Db_other::find($this->id());
        $update->gallery = $update->gallery.','.$post->id;
        $update->save();

        $pages_id = Db_other::find($this->id());
        $gallery = explode(",",$pages_id->gallery);
        foreach($gallery as $value) {
           $image[] = Slides::find($value);
        }

        $data = array(
            'pages_id' => '',
            'folder' => $this->folder(),
            'image' => $image,
         );
        return view('admin.'.$this->folder().'.index',$data);

    }

    public function update_listpic(Request $request){
        if($request->x=="") { $post_item=0; } else { $post_item=$request->x;}
        if($request->y=="") { $post_location=0; } else { $post_location=$request->y; } 
        if($request->id=="") { $request->id=0; } else { $request->id; } 

        $page = Db_other::find($this->id());

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
        $images = Slides::find($request->numrow);
        $page = Db_other::find($this->id());

        $name_delpic=explode(",",$page->gallery);           
        $totaldelpic=count($name_delpic); // จำนวนข้อมูล
        $listgroup_update='';   
        
        for ($i=0; $i < $totaldelpic; $i++ ) { 
            if($name_delpic[$i]!=$request->numrow){
                $listgroup_update.=$name_delpic[$i].','; 
            } 
        } // ดึงค่าลำดับกลุ่ม
        
        $datalist = substr_replace($listgroup_update,"",-1);
        $page->gallery = $datalist;
        $page->save();
        //DELET FILES
        LaraFile::delete("public/images/".$images->image);
        // DELETE DATABSE
        $images->delete();
        
    }



}
