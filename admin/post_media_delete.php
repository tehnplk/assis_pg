<?php
header('Content-type:application/json;charset=utf-8');
require('../db.php');
require('../lib.php');

$id = $_POST['id'];

$query ="delete from  smart_assis_media where id ='$id' ";
$res = mysqli_query($objCon, $query);

$tstatus = $res ? 'ok' : 'error';
$resp = [
        'status'=>$tstatus,
        
	];
echo json_encode($resp);
return $resp; 


