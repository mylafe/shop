<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>管理员登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Public/css/adminstyle.css" rel='stylesheet' type='text/css' />
</head>
<body>
	<div class="main">
		<div class="login">
			<h1>管理系统登录</h1>
			<div class="inset">
				<!--start-main-->
				<form action="Login/login" method="post">
			         <div>
			         	<!-- <h2>管理登录</h2> -->
						<span><label>用户名</label></span>
						<span><input type="text" name="username" class="textbox" ></span>
					 </div>
					 <div>
						<span><label>密码</label></span>
					    <span><input type="password" name="password" class="password"></span>
					 </div>
					 <div>
					    <span><input type="text" id="input_verify" name="verify"  placeholder="验证码" style="width:100px;">
              			<img width="50%" class="left15" height="50" alt="验证码" style="cursor:pointer;" src="<?php echo U('Admin/Login/verify_c',array());?>" title="点击刷新" onclick="this.src='/index.php/Admin/Login/verify_c.html'"></span>
					 </div>
					 <div>
					 	<input type="checkbox" id="auto" name="auto" class="checked">
					 	<label for="a1">七天内自动登陆</label>
					 </div>
					<div class="sign">
                        <input type="submit" value="登录" class="submit" />
					</div>
					</form>
				</div>
			</div>
		<!--//end-main-->
		</div>

<div class="copy-right">
	<p>&copy; shopimooc</p>

</div>

</body>
</html>