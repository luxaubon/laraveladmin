<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menus;
/*

use App\Slides;
use App\Db_other;
use Auth;
use Illuminate\Support\Facades\File as LaraFile;


*/
class TreesController extends Controller
{
    public function __construct(){

        //$this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }
    
    
    public function folder(){return 'trees';}


    public function index(){

         $Menu = new Menus;
        try {
            $allCategories = $Menu->tree();

        } catch (Exception $e) {
           echo "Caught exception : <b>".$e->getMessage()."</b><br/>";
        }

        $mainmenu = Menus::all();

        $data = array(
            'pages_id' => '',
            'folder' => $this->folder(),
            'categories' => $allCategories,
            'mainmenu' => $mainmenu,
        );
    	return view('admin.'.$this->folder().'.index',$data);
    }

    public function store(Request $request){
        $this->validate(request(), [
            'name_th' => 'required|max:50',
            'name_en' => 'required|max:50',
            'seo_th' => 'required|max:50',
            'seo_en' => 'required|max:50',
        ]);

        if ($request->hasFile('image')) {
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
        }else{$filename='';}

        $seo[] =  array(
                        'seo_th' =>  (mysql_escape(stripslashes(slug($request->seo_th)))),
                        'seo_en' =>  (mysql_escape(stripslashes(slug($request->seo_en))))
                    );
        $name[] =  array(
                        'name_th' =>  (mysql_escape(stripslashes($request->name_th))),
                        'name_en' =>  (mysql_escape(stripslashes($request->name_en)))
                    );

        $post = new Menus;
        $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
        $post->name = json_encode($name,JSON_UNESCAPED_UNICODE);
        $post->parent_id = $request->parent_id;
        $post->save();

        $Menu = new Menus;
        try {
            $allCategories=$Menu->tree();
        } catch (Exception $e) {
            //no parent category found
        }

        $mainmenu = Menus::all();

        $data = array(
            'pages_id' => '',
            'folder' => $this->folder(),
            'categories' => $allCategories,
            'mainmenu' => $mainmenu,
        );
        return view('admin.'.$this->folder().'.index',$data);

    }

    public function show($id)
    {
        $pages_id = Menus::findOrFail($id);
         $Menu = new Menus;
        try {
            $allCategories=$Menu->tree();
        } catch (Exception $e) {
            //no parent category found
        }

        $mainmenu = Menus::whereNotIn('id', [$pages_id->id])->get();

        $data = array(
            'pages_id' => $pages_id,
            'folder' => $this->folder(),
            'categories' => $allCategories,
            'mainmenu' => $mainmenu,
        );
        return view('admin.'.$this->folder().'.index',$data);

    }

    public function edit(Request $request)
    {
       $this->validate(request(), [
            'name_th' => 'required|max:50',
            'name_en' => 'required|max:50',
            'seo_th' => 'required|max:50',
            'seo_en' => 'required|max:50',
        ]);

       $post = Menus::find($request->editID);

        $this->validate(request(), [
            'name_th' => 'required|max:50',
            'name_en' => 'required|max:50'
        ]);

        if ($request->hasFile('image')) {
            $filename = 'main'.date('dym').time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('public/images/',$filename);
        }else{$filename='';}

        $seo[] =  array(
                        'seo_th' =>  (mysql_escape(stripslashes(slug($request->seo_th)))),
                        'seo_en' =>  (mysql_escape(stripslashes(slug($request->seo_en))))
                    );
        
        $name[] =  array(
                        'name_th' =>  (mysql_escape(stripslashes($request->name_th))),
                        'name_en' =>  (mysql_escape(stripslashes($request->name_en)))
                    );

        $post->seo = json_encode($seo,JSON_UNESCAPED_UNICODE);
        $post->name = json_encode($name,JSON_UNESCAPED_UNICODE);
        $post->parent_id = $request->parent_id;
        $post->save();

       return redirect()->back();
    }

    public function del_content(Request $request){

        $page = Menus::find($request->numrow);
        if ($page->image) {
            LaraFile::delete("public/images/".$page->image);
        }
        $mainmenu = Menus::where('parent_id', '=', $request->numrow)->get();

        foreach ($mainmenu as $db) {
           $post = Menus::find($db->id);
           $post->parent_id = '0';
           $post->save();
        }
        $page->delete();

    }


}
