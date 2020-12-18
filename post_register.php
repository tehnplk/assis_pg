<?php
header('Content-type:application/json;charset=utf-8');
require('db.php');
require('lib.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    return;
}

$token = empty($_POST['token'])?null:$_POST['token'];
$cid  =  empty($_POST['cid'])?null:$_POST['cid'];
$byear =  empty($_POST['byear'])?null:$_POST['byear'];

$resp = null;

if(empty($token) || empty($cid) || empty($byear)){

    $resp = [
        'status'=>'0',
		'message'=>'data no complete.'
    ];
    echo json_encode($resp);
    return;    
}

$sql = "select cid from patient where cid = '$cid' and (YEAR(birthday)+543) ='$byear' limit 1";
$result = mysqli_query($objCon, $sql);
$total = mysqli_num_rows($result);

if($total > 0){
	$now = date('Y-m-d H:i:s');
	$sql =  "REPLACE INTO smart_assis_client (cid, token, approved, dupdate) VALUES ('$cid','$token','no','$now') ";
	$res_1 = mysqli_query($objCon, $sql);
	
	$sql =  " update smart_assis_client t,patient p set  t.hn = p.hn , t.pname = p.pname , t.fname = p.fname ,";
	$sql = $sql." t.lname = p.lname ,t.birth = p.birthday ,t.sex = p.sex ";
	$sql = $sql . " where t.cid = p.cid  and t.cid = '$cid'";
	$res_2 = mysqli_query($objCon, $sql);
	
	$resp = [
        'status'=>'1',
        'cid'=>$cid,
        'token'=>$token,
		'res_1'=>$res_1,
		'res_2'=>$res_2,
		'message'=>'success'
	];
	echo json_encode($resp);
	return;    

}else{
	$resp =  [
		'status'=>'2',
		'message'=>'no success'
	];
	echo json_encode($resp);
	return;
}



