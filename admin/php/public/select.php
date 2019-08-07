<?php
     require('databases.php');
     //查询UserTables表中所有的数据
     $sql="select * from UserTables";  
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
     $data=$result->fetch_all(MYSQLI_ASSOC);
     print_r($data);
   
 
//传递json数据
//echo json_encode($data);

 

?>