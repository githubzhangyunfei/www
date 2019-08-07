<?php
     require('public/databases.php');
     $username=$_POST['username'];
     $password=$_POST['password'];
     //$code=$_POST['code']; 
     if($_POST['password']==$POST['repassword']){
     //查询UserTables表中所有的数据
     $sql="select UserName from UserTables where UserName='$username'";  
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
      $row=$result->fetch_all(MYSQLI_ASSOC);
      


}
?>