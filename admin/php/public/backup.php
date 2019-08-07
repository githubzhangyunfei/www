<?php
 

 
//echo $limit."---".$end."<br/>"; exit;
//编码
header("Content-Type: text/html;charset=utf-8");
//链接数据库
$link = new mysqli('127.0.0.1', 'root', '19931130', 'data');
//设置字符编码
$link->query("set names utf8");
//设置时区
date_default_timezone_set('Asia/Shanghai');
//统计条数
 
  $sql2 = "select   table_name as 'Name', table_rows as 'Rows', truncate(data_length/1024, 2) as 'Data_length', truncate(index_length/1024, 2) as 'index_length',create_time as 'Create_time',engine as 'Engine',table_collation as 'Collation', table_comment as'Comment' from information_schema.tables where table_schema='data' order by data_length desc, index_length desc";//exit;
//查询数据操作
$result2=$link->query($sql2);
//获取数据表中的所有数据 返回二维数组
$row=$result2->fetch_all(MYSQLI_ASSOC);


 
foreach($row as  $k=>$v){
        $row[$k]['Selected']='false'; 
       
}

//print_r($row);//exit;
$list=array();
$list["code"]=1;
$list["data"]=$row;
//传递json数据
 echo json_encode($list);
//关闭数据库
@mysqli_close($link);
//结束
exit;
 
?>