<?php
header('Content-type:application/json;charset=utf-8');
require('db.php');
require('lib.php');

$token = empty($_GET['token'])?null:$_GET['token'];
$vn = getVn($objCon, $token);

$hn = getHn($objCon, $token);
$cid = getCid($objCon,$hn);
$queue_number = getQueue($objCon, $vn); // get from ??
$location = getPlace($objCon, $vn);  // get from ??
$message = getWaitMessage($objCon, $vn);  //  get form ??

mylog($objCon,$hn,'queue',date('Y-m-d H:i:s'));

$data = [
	'server_time'=>date('Y-m-d H:i:s'),
	'token'=>$token,
	'cid'=>$cid,
	'hn'=>$hn,
	'number'=>$queue_number,
	'location'=>$location,
	'message'=>$message
];
$res = [];
$res[]=$data;
echo json_encode($res);