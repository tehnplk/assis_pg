<?php
session_start();
include "config.php";

$inputUser = $_POST['username'];
$inputPass = $_POST['password'];

// echo 'from input = '.$inputUser.' '.$inputPass.'<br>';
// echo 'config file = '.$username.' '.$password;

if ($inputUser == $username && $inputPass == $password) {
    $_SESSION["username"] = $inputUser;
    $_SESSION["password"] = $inputPass;
    session_write_close();

    header("location:approved.php");
    
} else {
    
    echo "<body onload=\"window.alert('User $inputUser รหัสผ่านผิดหรือไม่อยู่ในระบบ'); return history.back();\">";
}

