<?php

function mylog($db,$hn, $view, $time)
{
    $query ="INSERT INTO smart_assis_log (uuid,hn,view,time) VALUES (UUID(),'$hn','$view','$time') ";
    mysqli_query($db, $query);


}

function getHn($db, $token)
{
    if (empty($token)) {
        return null;
    }
    
    $sql ="select hn from smart_assis_client where token = '$token' limit 1";
   
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $hn = $row['hn']; //  ดึงจาก db
    return  $hn;
    
}

function getVn($db, $token)
{
    if (empty($token)) {
        return null;
    }

    $sql = "SELECT
    q.vn
    FROM
    smart_assis_client c
    left join ovst_queue_server q on q.hn = c.hn
    where c.token = '$token' and q.date_visit = CURDATE() order by q.time_visit desc limit 1";
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $vn = $row['vn']; //  ดึงจาก db
    return  $vn;
    
}

function getApproved($db, $token)
{
    if (empty($token)) {
        return null;
    }

    $sql = "SELECT approved
    FROM
    smart_assis_client c
    left join ovst_queue_server q on q.hn = c.hn
    where c.token = '$token'  and approved ='yes' order by q.time_visit desc limit 1";
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $approved = $row['approved']; //  ดึงจาก db
    return  $approved;
    
}



function getCid($db, $hn)
{
    if (empty($hn)) {
        return null;
    }

    $sql ="select cid from smart_assis_client where hn = '$hn' limit 1";
   
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    
    $cid = $row['cid'];
    ; //  ดึงจาก db
    return  $cid;
    
}

function getQueue($db, $vn)
{
    if (empty($vn)) {
        return null;
    }

    $sql = "SELECT
    q.depq
    FROM
    smart_assis_client c
    left join ovst_queue_server q on q.hn = c.hn
    where q.vn = '$vn' and q.date_visit = CURDATE() limit 1";

    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $q = $row['depq']; //  ดึงจาก db
    return  $q;
    
}

function getPlace($db, $vn)
{
    if (empty($vn)) {
        return null;
    }

    $sql = "SELECT
	k.department
FROM
	ovst_queue_server q 
inner join ovst o on o.vn = q.vn
left join kskdepartment k on k.depcode = o.cur_dep
WHERE
	q.vn = '$vn' AND  
	q.date_visit = CURDATE( ) 
	LIMIT 1";

    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


    $place = $row['department']; //  ดึงจาก db
    return  $place;
    
}

function getDep($db, $vn)
{
    if (empty($vn)) {
        return null;
    }

    $sql = "SELECT
	o.cur_dep
FROM
	ovst_queue_server q 
inner join ovst o on o.vn = q.vn
left join kskdepartment k on k.depcode = o.cur_dep
WHERE
	q.vn = '$vn' AND  
	q.date_visit = CURDATE( ) 
	LIMIT 1";

    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


    $dep = $row['cur_dep']; //  ดึงจาก db
    return  $dep;
    
}

function getWaitMessage($db, $vn)
{
    if (empty($vn)) {
        return null;
    }

    $sql = "SELECT
	q.wait_dep
FROM
	ovst_queue_server q 

WHERE
	q.vn = '$vn' AND  
	q.date_visit = CURDATE( ) 
	LIMIT 1";

    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


    $wait = $row['wait_dep']; //  ดึงจาก db

    $wait_msg = 'อีก '.$wait.'นาที โดยประมาณ'; //  ดึงจาก db
    return  $wait_msg;
}

function DateThai($strDate)
{
    if (empty($strDate)) {
        return "";
    } else {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
}



