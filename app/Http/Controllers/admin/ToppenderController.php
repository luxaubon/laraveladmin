<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use App\Images;
use Auth;
use App\Toppender;
use Illuminate\Support\Facades\File as LaraFile;
use Illuminate\Support\Facades\DB;
// add this
/*
use App\File;
use Illuminate\Support\Facades\DB;
LaraFile::delete("public/images/main-1549017697.png");
$time_stamp = time();
&&  ((date_start <= $time_stamp) && (date_stop='' || ( date_stop >= $time_stamp) ))
*/
class ToppenderController extends Controller
{
    //
    public function __construct(){

        $this->middleware('admin');
        //$this->middleware('auth',['except'=>['index','show']]);

    }

    public function folder(){return 'toppender';}
    public function status(){return 'toppender';}

    public function index()
    {
        //$user = Auth::user();
        
        $pages = Toppender::orderBy('id','DESC')->get();
        $data = array(
            'pages' => $pages,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

     public function store(Request $request){
    	$this->validate(request(), [
            'date_start' => 'required',
            'date_stop' => 'required',
            'status' => 'required',
            'online' => 'required',
            'luckynumber' => 'required',
            
        ]);
        
        $date_start = $request->date_start == '' ?  "" : strtotime($request->date_start);
        $date_stop = $request->date_stop == '' ?  "" : strtotime($request->date_stop);


        $post = new Toppender;
        $post->status = $request->status;
        $post->date_start = $date_start;
        $post->date_stop = $date_stop;
        $post->luckynumber = $request->luckynumber;
        $post->online = $request->online;
        $post->save();

        return redirect()->back();
    
    }

    public function show($id)
    {
        $pages_id = Toppender::findOrFail($id);
        $pages = Toppender::orderBy('id','DESC')->get();

        $date_start = date('Y-m-d H:i:s',$pages_id->date_start);
        $date_stop = date('Y-m-d H:i:s',$pages_id->date_stop);

        $user = DB::select("SELECT COUNT('images.id') as totals,user_otp.phone,name,last_name
            FROM  user_otp
            INNER JOIN images ON user_otp.id = images.sid
            WHERE code_first_number = $pages_id->status
            AND   images.status = 1
            AND   images.created_at BETWEEN '".$date_start."' AND '".$date_stop."'
            GROUP BY user_otp.id
            ORDER BY totals DESC
        ");

        $data = array(
            'pages_id'  => $pages_id,
            'pages'     => $pages,
            'folder'    => $this->folder(),
            'user'      => $user
         );
        return view('admin.'.$this->folder().'.index',$data);
    }
    public function edit(Request $request)
    {
      $this->validate(request(), [
            'date_start' => 'required',
            'date_stop' => 'required',
            'status' => 'required',
            'online' => 'required',
            'luckynumber' => 'required',
        ]);

       $post = Toppender::find($request->id);

        $date_start = $request->date_start == '' ?  "" : strtotime($request->date_start);
        $date_stop = $request->date_stop == '' ?  "" : strtotime($request->date_stop);

        $post->status = $request->status;
        $post->date_start = $date_start;
        $post->date_stop = $date_stop;
        $post->luckynumber = $request->luckynumber;
        $post->online = $request->online;
        $post->save();

       return redirect()->back();
    }

    public function del_content(Request $request){
        $page = Toppender::find($request->numrow);
        $page->delete();
        
    }


}
