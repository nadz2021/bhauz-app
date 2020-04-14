<?php
session_start();
include ("config/class/DBController.php");
include ("config/class/Users.php");

$user = new Users();
$error_msg='';
if(isset($_SESSION['isLogin'])) {
    if($_SESSION['isLogin'] == 1) {
        header("location:dashboard.php");
    }
}


if (isset($_REQUEST['login'])) {
    extract($_REQUEST);
    $clean_user = preg_replace("/['\";]/i","",$username); // remove the special characters that triggered to SQL injection
    $login = $user->checkUser($clean_user);
    if($login!=0) {
        $clean_pass = preg_replace("/['\";]/i","",$password); // remove the special characters that triggered to SQL injection
        $encrypt_password = md5($clean_pass);
        $user_login = $user->loginUser($clean_user, $encrypt_password);
        
        if($user_login!=0) {
		    $_SESSION['isLogin']    = 1;
            $_SESSION['username']   = $clean_user;
            $_SESSION['nick_name']  = $login[0]['nick_name__c'];
            $_SESSION['full_name']  = $login[0]['full_name__c'];
            header("location:dashboard.php");
            exit();
        }
        else {
            $error_msg = 'Wrong username or password';
        }
    }
    else {
        $error_msg = 'Wrong username or password';
    }
}

?>