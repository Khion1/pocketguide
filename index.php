<?php
 include('settings.php');

 session_start();
 if(isset($_SESSION['uid'])){
   include('home.php');

 }else{
   include('authentication/login.php');
 }
?>
