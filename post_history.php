<?php
header('Content-type:application/json;charset=utf-8');
require('db.php');
require('lib.php');

// รับเฉพาะ POST REQUEST เท่านั้น
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    return;
}

// ตั้งค่า
$is_hos4 = false;  // เป็น hos4 หรือไม่ ไม่เป็นใส่ false เป็นใส่ true
$depcode = '010'; // รหัสแผนกที่ซักประวัติ
$staff = "Smart Assis";  // ซักโดยแอพพลิเคชัน Smart Assis
// ตั้งค่า

$token = empty($_POST['token'])?null:$_POST['token'];
$hn  = getHn($objCon,$token);
$vn = getVn($objCon, $token);  // เพิ่ม getVn ใน lib.php
//$vn = '160530101551'; // ลบบรรทัดนี้ออกเมื่อใช้งานจริง

$cc  =  empty($_POST['cc'])?null:$_POST['cc'];
$cc_duration = empty($_POST['days'])?null:$_POST['days']." วัน";
$bw =  empty($_POST['bw'])?null:$_POST['bw'];
$height =  empty($_POST['bh'])?null:$_POST['bh'];
$bmi =  empty($_POST['bmi'])?null:$_POST['bmi'];

$resp = null;

if(empty($vn)){
    $resp = [
        'status'=>'0',
		'message'=>'vn not found.'
    ];
    echo json_encode($resp);
    return;    
}

$sql = "update opdscreen t set t.cc ='$cc', t.cc_duration = '$cc_duration', t.bw= '$bw',t.height='$height',t.bmi = '$bmi' where vn = '$vn' ";

$res_1 = mysqli_query($objCon, $sql);
$res_2 = $is_hos4;

if($res_1){

	if($is_hos4){
		$sql = " insert into opdscreen_cc_list set ";
		$sql .= " opdscreen_cc_list_id = get_serialnumber('opdscreen_cc_list_id'), ";
		$sql .= " vn = '$vn', ";
		$sql .= " cc = '$cc', ";
		$sql .= " period_qty  = '$cc_duration', ";
		$sql .= " period_unit_name ='วัน', ";
		$sql .= " depcode = '$depcode', ";
		$sql .= " staff = '$staff', ";
		$sql .= " update_datetime = now()";

		$res_2 = mysqli_query($objCon, $sql);
	}
	
	$resp = [
        'status'=>'1',
        'vn'=>$vn,
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



