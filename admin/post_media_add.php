<?php
header('Content-type:application/json;charset=utf-8');
require('../db.php');
require('../lib.php');

$topic = $_POST['topic'];
$post_date = $_POST['post_date'];
$url = $_POST['url_youtube'];

$query ="INSERT INTO smart_assis_media VALUES (null,'$topic','$topic','$url')";
$res = mysqli_query($objCon, $query);

$tstatus = $res ? 'ok' : 'error';
$resp = [
        'status'=>$tstatus,
        
	];
echo json_encode($resp);
return $resp; 


