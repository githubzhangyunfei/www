<?php
     require('public.php');
     //链接数据库
     $link=mysqli_connect('localhost','root','19931130','data')or die('链接数据库失败'); 
     //打印MYSQL服务器信息 //print_r($link);
     //设置查询编码
     $link->query("set names utf8");

?>