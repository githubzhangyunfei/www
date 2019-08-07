<?php
     session_start();
     $id=$_SESSION['id'];
     //浏览器编码
     header("Content-Type: text/html;charset=utf-8");
     //设置时区
     date_default_timezone_set('Asia/shanghai');
     //链接数据库
     $link=mysqli_connect('localhost','root','19931130','data')or die('链接数据库失败'); 
     //打印MYSQL服务器信息 //print_r($link);
     //设置查询编码
     $link->query("set names utf8");
     $sql="select * from UserTables where id='$id'";  
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
      $row=$result->fetch_array(MYSQLI_ASSOC);
      echo json_encode($row);
      unset($row);
      mysqli_close();
exit;
?>