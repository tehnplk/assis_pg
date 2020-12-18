<?php
header('Content-type:application/json;charset=utf-8');
require('../db.php');
require('../lib.php');

$cid = $_POST['cid'];
$approved1 = $_POST['approved'];

$query ="UPDATE smart_assis_client SET approved  ='$approved1' WHERE cid='$cid' ";
$res = mysqli_query($objCon, $query);

$tstatus = $res ? 'ok' : 'error';
$resp = [
        'status'=>$tstatus,
        
	];
echo json_encode($resp);
return ; 