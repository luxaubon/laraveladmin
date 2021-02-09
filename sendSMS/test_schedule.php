<?php
require 'sendMessageService.php';

// define account and password
$account = 'user@test';
$password = 'xxxxxxxxxxxxxxxxxxx';

$mobile_no = '0830000000';
// or $mobile_no = '0830000000,0831111111';
$message = 'Test ทดสอบ';
$schedule = '2020-09-15 15:30';  // schedule time format: yyyy-MM-dd hh:mm
$category = 'General';
$sender_name = '';  // use default sender name if not defined

$results = SendMessageService::sendMessage($account, $password, $mobile_no, $message, $schedule, $category, $sender_name);

// use http proxy
//$proxy = 'localhost:8888';
//$proxy_userpwd = 'username:password';
//$results = SendMessageService::sendMessage($account, $password, $mobile_no, $message, $schedule, $category, $sender_name, $proxy, $proxy_userpwd);

if ($results['result']) {
    echo 'Send Success. Task ID=' . $results['task_id'] . ' Message ID=' . $results['message_id'];
} else {
    echo $results['error'];
}
