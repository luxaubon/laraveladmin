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



			 ?>