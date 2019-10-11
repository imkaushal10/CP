<?php

include_once ('../includes/header.php');
include_once ('../includes/admnav.php');
include_once ('../includes/notification.php');

/*if(!Auth::isAuth()){
    header("Location: ../view/login.php");
}*/
if(empty($_SESSION['loggedin_user'])){
 	$_SESSION['error']= "Access denied!";
  	header('location: ../view/login.php');
  	exit;   
 }

?>


