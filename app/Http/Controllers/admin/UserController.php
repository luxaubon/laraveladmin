<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Images;
use App\User_otp;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }

    public function folder(){return 'user';}

    public function index(Request $request){
      
        if($request->search){
            $myArray = array();
            $member = User_otp::where('name', 'LIKE',"%$request->search%")->orWhere('phone', 'LIKE',"%$request->search%")->orderBy('id', 'DESC')->paginate(30);
            foreach($member as $db){
                $myArray[$db->id] = array($db->id);
                array_push($myArray[$db->id],$db->name);
                array_push($myArray[$db->id],$db->last_name);
                array_push($myArray[$db->id],$db->phone);
                array_push($myArray[$db->id],Images::where('sid',$db->id)->whereIn('status',array(1,4))->count());
                array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',2)->count());
                array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',3)->count());
                array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',5)->count());
            }
           
        }else{

            $myArray = array();
            $member = User_otp::orderBy('id', 'DESC')->paginate(30);
            foreach($member as $db){
                $myArray[$db->id] = array($db->id);
                array_push($myArray[$db->id],$db->name);
                array_push($myArray[$db->id],$db->last_name);
                array_push($myArray[$db->id],$db->phone);
                array_push($myArray[$db->id],Images::where('sid',$db->id)->whereIn('status',array(1,4))->count());
                array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',2)->count());
                array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',3)->count());
                array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',5)->count());
            }

        }

            


        $data = array(
            'myArray' => $myArray,
            'member' => $member,
            'pages_id' => '',
            'folder' => $this->folder(),
           
        );

        return view('admin.'.$this->folder().'.index',$data);
    }

    public function show($id)
    {
        $pages_id = User_otp::findOrFail($id);
        $image = Images::orderBy('id', 'DESC')->where('sid',$id)->paginate(15);
        
        $myArray = array();
        $member = User_otp::orderBy('id', 'DESC')->paginate(30);
        foreach($member as $db){
            $myArray[$db->id] = array($db->id);
            array_push($myArray[$db->id],$db->name);
            array_push($myArray[$db->id],$db->last_name);
            array_push($myArray[$db->id],$db->phone);
            array_push($myArray[$db->id],Images::where('sid',$db->id)->whereIn('status',array(1,4))->count());
            array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',2)->count());
            array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',3)->count());
            array_push($myArray[$db->id],Images::where('sid',$db->id)->where('status',5)->count());
        }

        $myArrayMember = array(
            $pages_id->id,
            $pages_id->name,
            $pages_id->last_name,
            $pages_id->phone,
            Images::where('sid',$pages_id->id)->whereIn('status',array(1,4))->count(),
            Images::where('sid',$pages_id->id)->where('status',2)->count(),
            Images::where('sid',$pages_id->id)->where('status',3)->count(),
            Images::where('sid',$pages_id->id)->where('status',5)->count(),
        );

        $data = array(
            'pages_id' => $pages_id,
            'myArray' => $myArray,
            'myArrayMember' => $myArrayMember,
            'member' => $member,
            'image' => $image,
            'folder' => $this->folder(),
         );
        return view('admin.'.$this->folder().'.index',$data);
    }

    public function del_content(Request $request){
        $post = Images::find($request->numrow);
        $post->textreject = $request->rejectText;
        $post->admin_id = Auth::id();
        $post->admin_name = Auth::user()->name;
        $post->status = 5;
        $post->save();
    }

    public function edit(Request $request){
    	$this->validate(request(), [
            'status' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $filename     = $request->editID.'-bof-'.date('dms').'-'.rand(0,99999).'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->image->move('images/'.$request->editID.'/',$filename);
        }else{$filename='';}


        $post = new Images;
        $post->sid  = $request->editID;
        $post->code_first_number = $request->status;
        $post->status = 4;
        $post->image = $filename;
        $post->table = 'user_otp';
        $post->admin_id = Auth::id();
        $post->admin_name = Auth::user()->name;
        $post->save();

        return redirect()->back();
    
    }


    

}
