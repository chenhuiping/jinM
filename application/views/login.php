<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <base href="<?= base_url()?>" />
	<meta charset="utf-8" />
	<title>JinAdvisor</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
<!--		<img src="assets/img/logo1.png" alt="" />-->
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->

			<h3 class="form-title">请登录</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span>输入您的邮箱和密码</span>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">邮箱</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="账户" id="email" name="email"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="密码" id="password" name="password"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="button" class="btn blue pull-right" id="login-btn" onclick="checkPwd()">
				登陆 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
				<h4>忘记密码?</h4>
				<p>
					          请
					  <a href="javascript:;"  id="forget-password">点击这里</a>
                    联系我们重置您的管理员密码。
				</p>
			</div>
			<div class="create-account">
				<p>
					没有账户？&nbsp;
					<a href="javascript:;" id="register-btn" >现在注册</a>
				</p>
			</div>

		<!-- END LOGIN FORM -->        
		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="form-vertical forget-form" action="index.html" method="post">
			<h3 >忘记密码?</h3>
			<p>输入您注册时使用的邮箱。</p>
			<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-envelope"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" autocomplete="off" name="email" />
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="button" id="back-btn" class="btn">
				<i class="m-icon-swapleft"></i> 返回
				</button>
				<button type="submit" class="btn blue pull-right">
				确认 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		</form>
		<!-- END FORGOT PASSWORD FORM -->
		<!-- BEGIN REGISTRATION FORM -->
		<form class="form-vertical register-form" action="index.html" method="post">
			<h3 >注册</h3>
            <p>请输入您的账户信息</p>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">用户名</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-user"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名" name="username"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">密码</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="密码" name="password"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">再次输入密码</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-ok"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="再次输入密码" name="rpassword"/>
                    </div>
                </div>
            </div>
			<p>请输入您的个人信息</p>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">真实姓名</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-font"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="真实姓名" name="fullname"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">邮箱</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-envelope"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="邮箱" name="email"/>
					</div>
				</div>
			</div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">电话</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-mobile-phone"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" placeholder="电话" name="address"/>
                    </div>
                </div>
            </div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">地址</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-home"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="地址" name="address"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">所属企业</label>
				<div class="controls">
					<div class="input-icon left">
						<i class=" icon-hospital"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="所属企业" name="city"/>
					</div>
				</div>
			</div>


			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
					<input type="checkbox" name="tnc"/> 我同意 <a href="#">使用协议</a>
					</label>  
					<div id="register_tnc_error"></div>
				</div>
			</div>
			<div class="form-actions">
				<button id="register-back-btn" type="button" class="btn">
				<i class="m-icon-swapleft"></i> 返回
				</button>
				<button type="submit" id="register-submit-btn" class="btn green pull-right">
				确认<i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		</form>
		<!-- END REGISTRATION FORM -->
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		2015 &copy; 联创宏图 - Admin Dashboard Template.
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.js"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js" type="text/javascript"></script>
	<script src="assets/scripts/login-soft.js" type="text/javascript"></script>      
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
    <script>
        function checkPwd()
        {
            var checkPwdURL = "/jinM/admin/login_do";
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            $.ajax({
                type: "post",
                url: checkPwdURL,
                dataType: "json",
                data: {
                    email : email,
                    password : password
                },
                success: function (data) {
                    if(data.status){
                        $('#login-btn').html("正在登陆 <i class='m-icon-swapright m-icon-white'></i>");
                        setTimeout("location.href='/jinM/admin/index'",800);
                    }
                    else{
                        alert("邮箱或密码错误，请重试");
                        $('#email').val("");
                        $('#password').val("");
                        $('#email').focus();
                    }
                }
            })
        }



    </script>

	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>


