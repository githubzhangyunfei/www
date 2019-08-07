<?php
     session_start();
     require('public/databases.php');
     $username=$_SESSION['username'] ;
     //if(empty($username)){exit('请先登录');} 
     //查询UserTables表中所有的数据
     $sql="select * from UserTables where UserName='$username'";  
     $result=$link->query($sql);
     //获取数据表中的所有数据 返回二维数组
      $row=$result->fetch_array(MYSQLI_ASSOC);
     // print_r($row);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>网站后台管理模版</title>
		<link rel="stylesheet" type="text/css" href="../../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../../static/admin/css/admin.css"/>
	</head>
	<body>
		<div class="layui-tab page-content-wrap">
		  <ul class="layui-tab-title">
		    <li class="layui-this">修改资料</li>
		    <li>修改密码</li>
		  </ul>
		  <div class="layui-tab-content">
		    <div class="layui-tab-item layui-show">
		    	<form class="layui-form"  style="width: 90%;padding-top: 20px;" method='post' action='admin-info-save.php'>
				  <div class="layui-form-item">
				    <label class="layui-form-label">Id:</label>
				    <div class="layui-input-block">
				      <input type="text" name="id" disabled autocomplete="off" class="layui-input layui-disabled" value="<?php echo $row['id'];?>">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">用户:</label>
				    <div class="layui-input-block">
				      <input type="text" name="UserName" disabled autocomplete="off" class="layui-input layui-disabled" value="<?php echo $row['UserName'];  ?>">
				    </div>
				  </div>
				   <div class="layui-form-item">
				    <label class="layui-form-label">姓名:</label>
				    <div class="layui-input-block">
				      <input type="text" name="NickName" required  lay-verify="required" placeholder="请输入您的姓名" autocomplete="off" class="layui-input" value="<?php  echo $row['NickName'];?>">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">邮箱:</label>
				    <div class="layui-input-block">
				      <input type="text" name="Email" required  lay-verify="required" placeholder="请输入您的邮箱" autocomplete="off" class="layui-input" value="<?php  echo $row['Email'];?>">
				    </div>
				  </div>
				  <div class="layui-form-item layui-form-text">
				    <label class="layui-form-label">备注:</label>
				    <div class="layui-input-block">
				      <textarea name="Remark" placeholder="请输入内容" class="layui-textarea" ><?php  echo $row['Remark'];?></textarea>
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <div class="layui-input-block">
				      <button class="layui-btn layui-btn-normal" lay-submit lay-filter="adminInfo">立即提交</button>
				    </div>
				  </div>
				</form>
		    </div>
		    <div class="layui-tab-item">
		    	<form class="layui-form" v style="width: 90%;padding-top: 20px;" method='post' action='admin-info-post.php'>
               <div class="layui-form-item">
				    <label class="layui-form-label">Id:</label>
				    <div class="layui-input-block">
				      <input type="text" name="id"  disabled autocomplete="off" class="layui-input layui-disabled" value="<?php echo $row['id'];?>">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">用户名:</label>
				    <div class="layui-input-block">
				      <input type="text" name="username" disabled autocomplete="off" class="layui-input layui-disabled" value="<?php echo $row['UserName'];  ?>">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">旧密码:</label>
				    <div class="layui-input-block">
				      <input type="password" name="password1" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">新密码:</label>
				    <div class="layui-input-block">
				      <input type="password" name="password2" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">重复密码:</label>
				    <div class="layui-input-block">
				      <input type="password" name="password3" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
				    </div>
				  </div>
				  <div class="layui-form-item">
				    <div class="layui-input-block">
				      <button class="layui-btn layui-btn-normal" lay-submit lay-filter="adminPassword">立即提交</button>
				    </div>
				  </div>
				</form>
		    </div>
		  </div>
		</div>
	<script src="../../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
	<script> 
		//Demo
		layui.use(['form','element'], function(){
		  var form = layui.form();
		  var element = layui.element();
		  form.render();
		  //监听信息提交
		  form.on('submit(adminInfo)', function(data){
		    layer.msg(JSON.stringify(data.field));
		    return false;
		  });
		  //监听密码提交
		   form.on('submit(adminPassword)', function(data){
		    layer.msg(JSON.stringify(data.field));
		    return false;
		  });
		});
 
	</script>
	</body>
</html>