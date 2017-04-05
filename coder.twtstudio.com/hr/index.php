<?php
header('location: https://recruit.twtstudio.com/');
exit;
	session_start();
	include './sso.php';
	$ssoHelper = new TwTSSO(19, 'qltWPZJz8AhJixQ240P5', false);

	$token = $_GET['token'];
	if ($token) {
		$userInfo = $ssoHelper->getUserInfo($token);
		$_SESSION['user'] = $userInfo;
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">	<link rel="stylesheet" type="text/css" href="./libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<script src='./libs/jquery/jquery-1.11.0.min.js'></script>
	<script src='./libs/jquery/jquery.easing.1.3.min.js'></script>
	<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
	<title>天外天工作室 2016 夏季纳新</title>
</head>
<body>
	<div class='container'>
	<h1 id='twtJoinSlogan' style="top: 13%">天外天工作室 Waiting For You!</h1>
	<?php if (!isset($_SESSION['user'])) { ?>
	<div id="twtJoinLogin" style="display:block">
		<form class="form-horizontal" id='twtLoginForm'>
			<p><a href="sp/2016-presentation/" target="_blank" style="color:#fff;text-decoration:underline">纳新宣讲页面（适配屏幕�?280*800�?/a></p>
			<p style="margin-bottom:20px"><a href="sp/2016-2/" target="_blank" style="color:#fff;text-decoration:underline">2016 秋季纳新宣传�?/a></p>

			<p style="color:#fff">本年度天外天工作室仅在北洋园校区纳新，卫津路的同学们我们明年再见 ~</p>
			<div class="form-group">
				<a class="btn btn-plat btn-block" style='font-size:16px' href="<?php echo $ssoHelper->getLoginUrl('http://coder.twtstudio.com/hr');?>">登录</a>
			</div>
		</form>
	</div>
	<?php } else { ?>
	<div id='twtJoinFormWrap'>
		<form class="form-horizontal" id='twtJoinForm'>
			<p><a href="sp/2016-presentation/" target="_blank" style="color:#fff">纳新宣讲页面（适配屏幕�?280*800�?/a></p>
			<p style="margin-bottom:20px;color:#fff"><a href="sp/2016-2/" target="_blank">2016 秋季纳新宣传�?/a></p>

			<p style="color:#fff">本年度天外天工作室仅在北洋园校区纳新，卫津路的同学们我们明年再见 ~</p>
			<div class="form-group">
				<label for="inputName" class="col-sm-3 control-label">姓名</label>
				<div class="col-sm-9">
					<input type="text" value="<?=$_SESSION['user']->result->user_info->username;?>" class="form-control" id="inputName" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="inputCollege" class="col-sm-3 control-label">学院</label>
				<div class="col-sm-9">
					<input type="text" value="<?=$_SESSION['user']->result->college;?>" class="form-control" id="inputCollege" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="inputMajor" class="col-sm-3 control-label">专业</label>
				<div class="col-sm-9">
					<input type="text" value="<?=$_SESSION['user']->result->major;?>" class="form-control" id="inputMajor" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="inputGrade" class="col-sm-3 control-label">年级</label>
				<div class="col-sm-9">
					<input type="text" value="<?=$_SESSION['user']->result->user_info->stu_in_time;?>" class="form-control" id="inputGrade" readonly>
				</div>
			</div> 
			<div class="form-group">
				<label for="inputContact" class="col-sm-3 control-label">联系方式</label>
				<div class="col-sm-9">
					<input type="telephone" class="form-control" id="inputContact" pattern="[0-9]" required>
				</div>
			</div>
      <div class="form-group">
        <label for="inputContact" class="col-sm-3 control-label">意向组别</label>
        <div class="col-sm-9">
          <select name="group" id="inputGroup" class="form-control">
            <option value="产品�?>产品�?/option>
            <option value="设计�?>设计�?/option>
            <option value="前端�?>前端�?/option>
            <option value="程序�?>程序�?/option>
            <option value="移动组Android">移动组Android</option>
            <option value="移动组iOS">移动组iOS</option>
          </select>
        </div>
      </div>
			<div class="form-group">
				<label for="inputReason" class="col-sm-3 control-label">加入原因</label>
				<div class="col-sm-9">
					<textarea type="text" class="form-control" id="inputReason" row='5' style='max-width:100%' required></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="button" onclick="onSubmitClick()" class="btn btn-plat btn-block" style='font-size:16px'>填好�?/button>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>
	<div id='twtJoinResult'>
		<h2>提交成功</h2>
		<h2>请等待后续通知</h2>
	</div>
	</div>


	<script type="text/javascript">
		function onLoginSubmitClick()
		{
			$.ajax({
				url:"http://coder.twtstudio.com/index.php/home/api/login",
				data: {
					account: inputAccount.value,
					password: inputPassword.value
				},
				method: 'post',
				dataType: 'json',
				success: function(data){
					if(data.code)
					{
						data = data.data;
						inputName.value = data.name;
						inputCollege.value = data.college;
						inputMajor.value = data.major;
						inputGrade.value = data.grade;
						$('#twtJoinLogin').fadeOut(400,function(){
							$('#twtJoinFormWrap').fadeIn(1000);
						})
					}
					else
						alert(data.msg);
				}
			});
		}

		function onSubmitClick()
		{
			$.ajax({
				url:"http://coder.twtstudio.com/index.php/home/api/submit",
				data: {
					phone: inputContact.value,
					reason: inputReason.value,
          group: inputGroup.value
				},
				method: 'post',
				dataType: 'json',
				success: function(data){
					if(data.code)
					{
						$('#twtJoinFormWrap').fadeOut(400,function(){
							$('#twtJoinResult').fadeIn(1000);
						})
					}
					else
						alert(data.msg);
				}
			});
		}

	</script>
</body>
</html>