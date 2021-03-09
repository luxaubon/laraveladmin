<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pages;
use App\User;
use App\Db_other;
use App\User_otp;

use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
     

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function folder(){return 'dashboard';}
    public function status(){return 'Pages';}

    public function index()
    {
        //$user = Auth::user();

        $pagesOnline = User_otp::count();

        $pagesOffline = User_otp::all()
                        ->where('percentage','!=','')
                        ->count();
        $user = Pages::sum('numbercode');
        //$user = $total - $pagesOffline;
        //User::DEFAULT_TYPE,

        $montcount = '';
        $view = '';
        $viewMont = Db_other::all()->where('status',2);
        foreach($viewMont as $dataMont) {
            $montcount.= "'".ViewDate($dataMont->montcount)."',";
            $view.= $dataMont->view.',';
        }

        // $memberOtp1 =  User_otp::Where('otp','!=','')->count();
        // $memberOtp2 =  User_otp::Where('otp','=',null)->count();

        // $chosse2 = DB::select("SELECT COUNT('user_otp.code_id') as code, pages.namecode
        //     FROM  user_otp
        //     INNER JOIN pages ON user_otp.code_id = pages.id
        //     GROUP BY user_otp.code_id");
        // $topics2 = '';
        // $data2 = '';
        // foreach($chosse2 as $data){
        //     $data2.= $data->code.',';
        //     $topics2.= '"'.$data->namecode.'",';
        // }

 
        // $chosse3 = DB::table('user_otp')
        //          ->select(DB::raw('count(shop_code) as total'),'shop_code')
        //          ->Where('shop_code','!=','')
        //          ->groupBy('shop_code')
        //          ->get();
        // $topics_shopcode = '';
        // $data_shopcode = '';
        // foreach($chosse3 as $data){
        //     $data_shopcode.= $data->total.',';
        //     $topics_shopcode.= '"'.$data->shop_code.'",';
        // }
        // $chosse4 = DB::select("SELECT DATE_FORMAT(`updated_at`, '%e/%c/%Y') as `date`, COUNT(`updated_at`) as total FROM user_otp where `code_id` != null or `shop_code` != '' GROUP BY `date` ORDER BY updated_at ASC");
       
        // $dataChart = '';
        // foreach($chosse4 as $data){
        //     $dataChart.= '{device:"'.$data->date.'",geekbench:'.$data->total.'},';
        // }
        // $member = array(
        //     'memberOtp1' => $memberOtp1,
        //     'memberOtp2' => $memberOtp2,
        //     'topics2'    => $topics2,
        //     'data2'    => $data2,
        //     'topics_shopcode'    => $topics_shopcode,
        //     'data_shopcode'    => $data_shopcode,
        //     'dataChart'    => $dataChart,
        // );
        
        $data = array(
            'folder' => 'dashboard',
            'pagesOnline' => $pagesOnline,
            'pagesOffline' => $pagesOffline,
            'user' => $user,
            'montcount' => $montcount,
            'view' => $view,
           //'member' => $member,
           
        );
        //dd($data);
        return view('admin.'.$this->folder().'.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
