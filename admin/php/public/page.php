<?php
//如果有pageNow就使用，没有就默认第一页。
if (!empty($_GET['page'])){
     $pageNow = $_GET['page'];
     $pageSize = $_GET['limit'];
}else{
     $pageNow = 1;    //当前显示第几页
}
//echo $limit."---".$end."<br/>"; exit;
//编码
header("Content-Type: text/html;charset=utf-8");
//链接数据库
$link =  mysqli_connect('127.0.0.1', 'root', '19931130', 'data');
//设置字符编码
$link->query("set names utf8");
//设置时区
date_default_timezone_set('Asia/shanghai');
//统计条数
     $sql="select * from UserTables";
     $result1=$link->query($sql);
$count=mysqli_num_rows($result1); //echo $count;exit;
if(!empty($_GET['limit'])){
    $pageSize = $_GET['limit'];
}else{
    $pageSize = 20;   //每页显示的数量
}
$rowCount = $count;   //总条数
//$pageNow = 1;    //当前显示第几页
$pageCount = ceil(($rowCount/$pageSize));//计算总页数
//当前页 减1 乘以 每页显示条数
$pre = ($pageNow-1)*$pageSize;
  $sql2 = "select * from UserTables limit $pre,$pageSize";//exit;
//查询数据操作
$result2=$link->query($sql2);
//获取数据表中的所有数据 返回二维数组
$row=$result2->fetch_all(MYSQLI_ASSOC); 
$data=array();
$data["code"]=0;
//$data["msg"]="";
$data["count"]=$count;
$data["data"]=$row;
 //print_r($data);
//传递json数据
 echo json_encode($data);
//关闭数据库
@mysqli_close($link);
//结束
exit;
 
      
?>