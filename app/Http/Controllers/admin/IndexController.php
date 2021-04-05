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
        $countCode = Images::count();

        $register = DB::select("SELECT COUNT(`id`) as total , DATE_FORMAT(`created_at`, '%e/%c/%Y') as `dates`
            FROM user_otp WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY `dates` ORDER BY created_at");

        $dataChartRegister = '';
        foreach($register as $data){
            $dataChartRegister.= '{device:"'.$data->dates.'",geekbench:'.$data->total.'},';
        }

        $transactionAllday = DB::select("SELECT DATE_FORMAT(`created_at`, '%e/%c/%Y') as `date`, 
        COUNT(`id`) as total FROM images WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY date");
        $dataChartTransaction = '';
        foreach($transactionAllday as $data){
            $dataChartTransaction.= '{device:"'.$data->date.'",geekbench:'.$data->total.'},';
        }

        $job = DB::select("SELECT COUNT('jobs') as total,jobs FROM user_otp WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY jobs");
        $dataChartJobs = '';
        foreach($job as $data){
            switch ($data->jobs) {
                case 0: $jobS = 'อื่นๆ';break;
                case 1: $jobS = 'พนักงานบริษัท';break;
                case 2: $jobS = 'พนักงานโรงงาน';break;
                case 3: $jobS = 'ข้าราชการ';break;
                case 4: $jobS = 'นักเรียน/นักศึกษา';break;
                case 5: $jobS = 'ลูกจ้างทั่วไป';break;
                case 6: $jobS = 'เจ้าของธุระกิจ';break;
                case 7: $jobS = 'พ่อค้า แม่ค้า (ค้าขาย)';break;
                case 8: $jobS = 'เกษตรกร';break;
                case 9: $jobS = 'เกษียณ/แม่บ้าน';break;
                default: $jobS = 'อื่นๆ'; break;
              }
            $dataChartJobs.= '{device:"'.$jobS.'",geekbench:'.$data->total.'},';
        }


        $salary = DB::select("SELECT COUNT('salary') as total,salary FROM user_otp WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY salary");
        $dataChartSalary = '';
        foreach($salary as $data){
            switch ($data->salary) {
                case 0: $salary = 'อื่นๆ';break;
                case 1: $salary = 'ต่ำกว่า 5,000 บาท';break;
                case 2: $salary = '5,001 - 7,999 บาท';break;
                case 3: $salary = '8,000 - 9,999 บาท';break;
                case 4: $salary = '10,000 - 11,999 บาท';break;
                case 5: $salary = '12,000 - 13,999 บาท';break;
                case 6: $salary = '14,000 - 15,999 บาท';break;
                case 7: $salary = '16,000 - 19,999 บาท';break;
                case 8: $salary = '20,000 - 24,999 บาท';break;
                case 9: $salary = '25,000 - 29,999 บาท';break;
                case 10: $salary = '30,000 บาท หรือมากกว่า';break;
                default: $salary = 'อื่นๆ'; break;
              }
            $dataChartSalary.= '{device:"'.$salary.'",geekbench:'.$data->total.'},';
        }

        $code = DB::select("SELECT COUNT('id') as total,code_first_number
                FROM  images
                WHERE images.status IN (1,4)
                AND code_first_number IN (1,2,3)
                AND created_at BETWEEN '".$date_start."' AND '".$date_stop."'
                GROUP BY code_first_number");
        $codeTitle = '';
        $codeData = '';
        foreach($code as $data){
            switch ($data->code_first_number) {
                case 1: $taste = 'Lemon';break;
                case 2: $taste = 'Orange';break;
                case 3: $taste = 'Mix Berry';break;
                default: $taste = ''; break;
              }
            $codeData.= $data->total.',';
            $codeTitle.= '"'.$taste.'",';
        }

        $ageTitle = '';
        $ageData = '';
        $age1_5 = DB::select("SELECT count(id) as total  FROM user_otp where year < 2563 and year > 2549 AND created_at BETWEEN '".$date_start."' AND '".$date_stop."'");
        if($age1_5[0]->total > 0){
            $ageData.= $age1_5[0]->total.',';
            $ageTitle.= '"ช่างอายุระหว่าง 1-15 ปี",';  
        }
        $age16_25 = DB::select("SELECT count(id) as total  FROM user_otp where year < 2548 and year > 2539 AND created_at BETWEEN '".$date_start."' AND '".$date_stop."'");
        if($age16_25[0]->total > 0){
            $ageData.= $age16_25[0]->total.',';
            $ageTitle.= '"ช่างอายุระหว่าง 16-25 ปี",';  
        }
        $age26_35 = DB::select("SELECT count(id) as total  FROM user_otp where year < 2538 and year > 2529 AND created_at BETWEEN '".$date_start."' AND '".$date_stop."'");
        if($age26_35[0]->total > 0){
            $ageData.= $age26_35[0]->total.',';
            $ageTitle.= '"ช่างอายุระหว่าง 26-35 ปี",';  
        }
        $age36_45 = DB::select("SELECT count(id) as total  FROM user_otp where year < 2528 and year > 2519 AND created_at BETWEEN '".$date_start."' AND '".$date_stop."'");
        if($age36_45[0]->total > 0){
            $ageData.= $age36_45[0]->total.',';
            $ageTitle.= '"ช่างอายุระหว่าง 36-45 ปี",';  
        }
        $age46 = DB::select("SELECT count(id) as total  FROM user_otp where year < 2518 AND created_at BETWEEN '".$date_start."' AND '".$date_stop."' ");
        if($age46[0]->total > 0){
            $ageData.= $age46[0]->total.',';
            $ageTitle.= '"ช่างอายุ 46 ปีขึ้นไป",';  
        }
        
        $sex = DB::select("SELECT COUNT('id') as total,sex FROM user_otp WHERE created_at BETWEEN '".$date_start."' AND '".$date_stop."' GROUP BY sex");
        $sexTitle = '';
        $sexData = '';
        foreach($sex as $data){
            switch ($data->sex) {
                case 1: $sexs = 'ชาย';break;
                case 2: $sexs = 'น.ส.';break;
                case 3: $sexs = 'นาง';break;
                default: $sexs = ''; break;
              }
            $sexData.= $data->total.',';
            $sexTitle.= '"'.$sexs.'",';
        }

        $Chart = array(
            'countUserAll' => $countUserAll,
            'countCode' => $countCode,
            'dataChartRegister' => $dataChartRegister,
            'dataChartTransaction' => $dataChartTransaction,
            'dataChartJobs' => $dataChartJobs,
            'dataChartSalary' => $dataChartSalary,

            'codeData' => $codeData,
            'codeTitle' => $codeTitle,
            'ageData' => $ageData,
            'ageTitle' => $ageTitle,
            'sexTitle' => $sexTitle,
            'sexData' => $sexData,
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
