<?php
header('Content-type:application/json;charset=utf-8');
require('db.php');
require('lib.php');

$token = empty($_GET['token'])?null:$_GET['token'];

//$hn = '630103081519';
$hn = getHn($objCon, $token);

mylog($objCon,$hn,'drug',date('Y-m-d H:i:s'));

$sql = "SELECT
n.name , CONCAT(d.name1,' ',d.name2,' ',d.name3) drugusage,o.qty,n.units,o.vstdate,n.sticker_short_name
FROM
opitemrece o
INNER JOIN drugitems n ON n.icode = o.icode
LEFT JOIN drugusage d on d.drugusage = n.drugusage
WHERE
hn = '$hn' and curdate() < DATE_ADD(o.vstdate, INTERVAL 6 MONTH)
ORDER BY
o.icode";
 $result = mysqli_query($objCon, $sql);


$data = [];


//  fetch loop
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    $data[] = [
        'ename'=>$row["drugusage"],
        'tname'=>$row["sticker_short_name"],
        'amount'=>$row["qty"].$row["units"],
        'usage'=> $row["drugusage"],
        'vstdate'=>$row["vstdate"]        
    ];
}

$res = [];
$res[]=$data;
echo json_encode($res);