<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pages;
use App\User;
use App\Db_other;
use App\User_otp;
use App\Images;
use App\receipt;

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

    public function index(Request $request)
    {
        if($request->date_start && $request->date_stop){
            $date_start = $request->date_start;
            $date_stop = $request->date_stop;
        }else{
            $date_start = date('Y-m-d');
            $date_stop = date('Y-m-d');
        }

        $countUserAll = User_otp::count();
        $countCode = receipt::count();

        $register = DB::select("SELECT COUNT(`id`) as total , DATE_FORMAT(`created_at`, '%e/%c/%Y') as `dates`
            FROM user_otp WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY `dates` ORDER BY created_at");

        $dataChartRegister = '';
        foreach($register as $data){
            $dataChartRegister.= '{device:"'.$data->dates.'",geekbench:'.$data->total.'},';
        }
       
        $transactionAllday = DB::select("SELECT DATE_FORMAT(`created_at`, '%e/%c/%Y') as `date`, 
        COUNT(`id`) as total FROM receipt WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY date");
        $dataChartTransaction = '';
        foreach($transactionAllday as $data){
            $dataChartTransaction.= '{device:"'.$data->date.'",geekbench:'.$data->total.'},';
        }

        $transactionMT = DB::select("SELECT DATE_FORMAT(`created_at`, '%e/%c/%Y') as `date`, 
        COUNT(`id`) as total FROM receipt WHERE status_shop = 'dealer' and created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY date");
        $dataChartTransactionMT = '';
        foreach($transactionMT as $data){
            $dataChartTransactionMT.= '{device:"'.$data->date.'",geekbench:'.$data->total.'},';
        }

        $transactionTT = DB::select("SELECT DATE_FORMAT(`created_at`, '%e/%c/%Y') as `date`, 
        COUNT(`id`) as total FROM receipt WHERE status_shop = 'company' and created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY date");
        $dataChartTransactionTT = '';
        foreach($transactionTT as $data){
            $dataChartTransactionTT.= '{device:"'.$data->date.'",geekbench:'.$data->total.'},';
        }

        $top5dealer = DB::select("SELECT COUNT('id') as total,shop_name FROM receipt WHERE status_shop = 'dealer' and created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY shop_name order  by total DESC limit 5");
        $top5dealerTitle = '';
        $top5dealerData = '';
        foreach($top5dealer as $data){
            $top5dealerData.= $data->total.',';
            $top5dealerTitle.= '"'.$data->shop_name.'",';
        }

        $top5company = DB::select("SELECT COUNT('id') as total,shop_name FROM receipt WHERE status_shop = 'company' and created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY shop_name order  by total DESC limit 5");
        $top5companyTitle = '';
        $top5companyData = '';
        foreach($top5company as $data){
            $top5companyData.= $data->total.',';
            $top5companyTitle.= '"'.$data->shop_name.'",';
        }
        
        $province = DB::select("SELECT COUNT('id') as total,region_province FROM receipt WHERE region_province != '' and created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY region_province order  by total DESC limit 5");
        $provinceTitle = '';
        $provinceData = '';
        foreach($province as $data){
            $provinceData.= $data->total.',';
            $provinceTitle.= '"'.$data->region_province.'",';
        }

         $Chart = array(
             'countUserAll' => $countUserAll,
             'countCode' => $countCode,
             'dataChartRegister' => $dataChartRegister,
             'dataChartTransaction' => $dataChartTransaction,
             'dataChartTransactionMT'   => $dataChartTransactionMT,
             'dataChartTransactionTT'   => $dataChartTransactionTT,

            'top5dealerData' => $top5dealerData,
            'top5dealerTitle' => $top5dealerTitle,
            'top5companyData' => $top5companyData,
            'top5companyTitle' => $top5companyTitle,
            'provinceTitle' => $provinceTitle,
            'provinceData' => $provinceData,

         );

        
        $data = array(
            'folder' => 'dashboard',
            'Chart' => $Chart,
           
        );
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
