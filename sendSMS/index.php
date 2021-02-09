<?php
require 'sendMessageService.php';
date_default_timezone_set("Asia/Bangkok");
ini_set('display_errors', 1);
error_reporting(~0);
error_reporting(E_ALL ^ E_NOTICE);

@DEFINE ('DB_USER', 'uhvauqaayy');
@DEFINE ('DB_PASSWORD', 'hEjmgcH8Ve');
@DEFINE ('DB_HOST', 'localhost');
@DEFINE ('DB_NAME', 'uhvauqaayy');

global $connect;
$connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die($connect->connect_error());
$langauge = $connect->set_charset("utf8");

$account = 'voucher@americaotp';
$password = '9FD15EE59B177D825E2BDF64E543313F9C6BDB277942E3382551265A51EE0EB60C96AA637FE250CE';
$message = 'ด่วน!!  ลงทะเบียนเพื่อรับสิทธิ์ส่วนลดทันที 10% เมื่อช็อปครบ 5,000 บาทขึ้นไป ที่หน้าร้าน  (ลดสูงสุดไม่เกิน 1,000 บาท/ใบเสร็จ) คลิกเพื่อลงทะเบียน https://americanstandardvoucher.com/promotions รีบรับสิทธิ์ได้ตั้งแต่ 26 ก.พ.-14 มี.ค.64 นี้เท่านั้น (จำกัด 2,000 สิทธิ์)';
$category = 'General';
    $sender_name = ''; // use default sender name if not defined
$sql = "SELECT phone FROM user_otp where status =1 ";
$db = mysqli_query($connect,$sql);
print_r($data);
while($data = mysqli_fetch_array($db)){ 
    $mobile_no = $data["phone"];
    SendMessageService::sendMessage($account, $password, $mobile_no, $message, '', $category, $sender_name);
};






