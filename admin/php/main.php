<?php
session_start();
if(empty($_SESSION['user'])){
       header("location:http://localhost/admin/index/login.html");exit();
}else{
 header("location:http://localhost/admin/index/index.html");exit();
} 
?>