<?php    
     require("./databases.php");
     $sql = "select * from Message order by id desc limit 0,5";//exit;
     //查询数据操作
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
     $row=$result->fetch_all(MYSQLI_ASSOC);
    //输出json数据
     echo json_encode($row);
    //关闭数据库
     mysqli_close($link);
    //销毁变量    
     unset($link);
//结束
exit;
?>