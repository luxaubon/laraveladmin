<?php
	

function checkActiveMenu($menu,$active){
				if($menu == $active){
					return 'active';
				}else{
					return false;
				}

			 }
function slug($str){
//$str = strtolower(trim($str));
	$str = preg_replace('/[^ก-ฮA-Za-z0-9-]+$/i', '-', $str);
	$str = preg_replace('/-+/', "_", $str);
	$str = str_replace(" ",'_',trim($str));
	$str = str_replace('"','_',trim($str));
	$str = str_replace("'",'_',trim($str));
	$str = str_replace("!",'_',trim($str));
	$str = str_replace("@",'_',trim($str));
	$str = str_replace("#",'_',trim($str));
	$str = str_replace("$",'_',trim($str));
	$str = str_replace("%",'_',trim($str));
	$str = str_replace("^",'_',trim($str));
	$str = str_replace("&",'_',trim($str));
	$str = str_replace("*",'_',trim($str));
	$str = str_replace("(",'_',trim($str));
	$str = str_replace(")",'_',trim($str));
	$str = str_replace("_",'_',trim($str));
	$str = str_replace("+",'_',trim($str));
	$str = str_replace("=",'_',trim($str));
	$str = str_replace("/",'_',trim($str));
	$str = str_replace("*",'_',trim($str));
	$str = str_replace("|",'_',trim($str));
	$str = str_replace(";",'_',trim($str));
	$str = str_replace(":",'_',trim($str));
	$str = str_replace("`",'_',trim($str));
	$str = str_replace('?','_',trim($str));
	$str = str_replace('.','_',trim($str));
	$str = str_replace(',','_',trim($str));
	$str = str_replace('<','_',trim($str));
	$str = str_replace('>','_',trim($str));
	$str = str_replace('�','_',trim($str));
	return $str;
}
if ( !function_exists('mysql_escape'))
{
    function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
}

function ViewDate($strDate){
				$strYear = date("Y",strtotime($strDate));
				$strMonth= date("n",strtotime($strDate));
				$strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strMonthThai";
			}

			function DateThai($strDate)
			{
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				$strHour= date("H",strtotime($strDate));
				$strMinute= date("i",strtotime($strDate));
				$strSeconds= date("s",strtotime($strDate));
				$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
				//$strMonthCut = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strDay $strMonthThai $strYear";
			}

			
			function sendMessage($account, $password, $mobile_no, $message, $schedule = '', $category = '', $sender_name = '', $proxy = '', $proxy_userpwd = '')
			{
				$option = '';
				if ($category == '') {
					$category = 'General';
				}
				$option = "SEND_TYPE={$category}";
				if ($sender_name != '') {
					$option .= ",SENDER={$sender_name}";
				}

				$params = array(
					'ACCOUNT' => $account,
					'PASSWORD' => $password,
					'MOBILE' => $mobile_no,
					'MESSAGE' => $message
				);
				if ($schedule) {
					$params['SCHEDULE'] = $schedule;
				}
				if ($option) {
					$params['OPTION'] = $option;
				}

				$curl_options = array(
					CURLOPT_URL => 'https://o8.sc4msg.com/SendMessage',
					CURLOPT_PORT => 443,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => http_build_query($params),
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_SSLVERSION => 6,
					CURLOPT_RETURNTRANSFER => true,
				);
				if ($proxy != '') {
					$curl_options[CURLOPT_PROXY] = $proxy;
					if ($proxy_userpwd != '') {
						$curl_options[CURLOPT_PROXYUSERPWD] = $proxy_userpwd;
					}
				}

				$ch = curl_init();
				curl_setopt_array($ch, $curl_options);
				$response = curl_exec($ch);
				$error = curl_error($ch);
				curl_close($ch);

				if ($error) {
					return array('result' => false, 'error' => $error);
				} else {
					// STATUS=0
					// TASK_ID=109692
					// END=OK
					//echo $response;
					//echo 'success';
					$results = explode("\n", trim($response));
					$index = count($results) - 1;
					if (trim($results[$index]) == 'END=OK') {
						$results[0] = trim($results[0]);
						if ($results[0] == 'STATUS=0') {
							$task_id = '';
							$message_id = '';
							foreach ($results as $result) {
								$datas = explode("=", $result);
								if ($datas[0] == 'TASK_ID') {
									$task_id = $datas[1];
								} elseif ($datas[0] == 'MESSAGE_ID') {
									$message_id = $datas[1];
								}
							}
							return array(
								'result'     => true,
								'task_id'    => $task_id,
								'message_id' => $message_id
							);
						} else {
							return array(
								'result' => false,
								'error'  => $results[0]
							);
						}
					} else {
						return array(
							'result' => false,
							'error'  => "Incorrect Response: {$response}"
						);
					}
				}
			}


			 ?>