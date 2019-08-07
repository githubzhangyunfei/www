<?php
     session_start();
     require('public/databases.php');
     $username=$_POST['username'];
     $password=$_POST['password'];
     //$code=$_POST['code']; 
     if($_POST['code']==$_SESSION['code']){
     //查询UserTables表中所有的数据
     $sql="select * from UserTables where UserName='$username' and  PassWord='$password'";  
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
      $row=$result->fetch_array(MYSQLI_ASSOC);
       if($row){
      //header("location:http://localhost/admin/index/index.html");exit();
      $data=array();
      $data['code']=1;  
      $data['url']="http://localhost/admin/index/index.php"; 
      $_SESSION['username']=$username;   
      $_SESSION['id']=$row['id'];  
        }else{
      $data['code']=0;
  
      }
}else{
      $data['code']=2;   
}
//传递json数据
echo json_encode($data);
//关闭数据库
unset($row); 
exit;





 


 

?>