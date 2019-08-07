<?php
     require("./databases.php");
     $data=array();
     $data['engine']=$_SERVER['SERVER_SOFTWARE'];
     $os=explode(" ", php_uname()); 
     $data['os']=$os[0];
     $DirName=$_SERVER['DOCUMENT_ROOT'];
     $data['size']=getSize(getDirSize($DirName)); // print_r($_SERVER);
     $data["phpservion"]=phpversion();
     $data["mysqlinfo"]=$link->server_info; 
     $data["hostname"]=$_SERVER["HTTP_HOST"];
      $sql = "select * from Message order by id desc limit 0,5";//exit;
     //查询数据操作
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
     $row=$result->fetch_all(MYSQLI_ASSOC);
     $data['list']=$row;
     function getDirSize($DirName){
     //定义初始值
     $size=0;
     //打开文件或目录
     $handle=opendir($DirName);     
     while($FileName=readdir($handle)){
     //
     $File=$DirName."/".$FileName;
     if($FileName!="."&&$FileName!=".."){
     //如果是目录 
     if(is_dir($File)){
          $size+=getDirSize($File);
     }
     //如果是文件
     if(is_file($File)){
          $size+=filesize($File);
     }
     }    
     }    
     //关闭文件
      closedir($handle);
     //返回大小 
      return $size;
     }
     function getSize($size){
      //单位转换  
      if($size>pow(2,40)){
          $dw="TB";
          $size=round($size/pow(2,40),2);
     }else if($size>pow(2,30)){
           $dw="GB";
           $size=round($size/pow(2,30),2);
      }else  if($size>pow(2,20)){
          $dw="MB";
          $size=round($size/pow(2,20),2);
     }else if($size>pow(2,10)){
          $dw="KB";
          $size=round($size/pow(2,10),2);
     }else
     {
          $dw='Bytes';
     }  
     return $size.$dw;  
     }

     //print_r($data);
     //echo getSize(getDirSize($DirName));
    //输出json数据
     echo json_encode($data);
    //关闭数据库
     mysqli_close($link);
    //销毁变量    
     unset($link);
//结束
exit;
 
      
?>