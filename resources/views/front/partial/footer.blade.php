<div class="copyright">
	<div class="container text-center" style="overflow: hidden; padding:18px 0">
		<span><a href="http://www.miitbeian.gov.cn">{!! getSettingValueByKeyCache('beian') !!}</a></span>
		<span style="float:right">技术支持：芸来科技</span>
	</div>
</div>

<div class="register" style="display: none">
	<div class="regist-title">
		<p>您好! 欢迎注册!</p>
		<img src="{{asset('images/cha.png')}}" alt="" class="cha">
	</div>
	<form action="" class="regForm">
		<div class="regist-content">
		  	<div class="form-group">
		    	<label for="inputEmail" class="col-sm-3 control-label">邮箱:</label>
		    	<div class="col-sm-9">
		      		<input type="text" class="form-control" id="inputEmail" name="email" placeholder="请输入您的邮箱">
		      		<input type="button" class="send-code" data-type="inputEmail" value="发送验证码"/>
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputCode" class="col-sm-3 control-label">验证码:</label>
		    	<div class="col-sm-9">
		      		<input type="text" class="form-control" id="inputCode" name="code" placeholder="请输入验证码">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputName" class="col-sm-3 control-label">用户名:</label>
		    	<div class="col-sm-9">
		      		<input type="text" class="form-control" id="inputName" name="name" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5]/g,'')" placeholder="2-14个字符: 英文、数字或中文">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputPassword" class="col-sm-3 control-label">登录密码:</label>
		    	<div class="col-sm-9">
		      		<input type="password" class="form-control" id="inputPassword" name="password" placeholder="6-20个字符">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="more" >
		  		<a href="javascript:void(0);" class="regist">立即注册</a>
		  	</div>
		</div>
	</form>
</div>
<div class="loginframe" style="display: none">
	<div class="regist-title">
		<p>您好! 欢迎登录!</p>
		<img src="{{asset('images/cha.png')}}" alt="" class="cha">
	</div>
	<form action="" class="loginForm">
		<div class="regist-content">
		  	<div class="form-group">
		    	<label for="loginName" class="col-sm-3 col-xs-12 control-label">账号:</label>
		    	<div class="col-sm-9 col-xs-12">
		      		<input type="text" class="form-control" id="loginName" name="name" placeholder="请输入用户名">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="form-group">
		    	<label for="loginPassword" class="col-sm-3 col-xs-12 control-label">密码:</label>
		    	<div class="col-sm-9 col-xs-12">
		      		<input type="password" class="form-control" id="loginPassword" name="password" placeholder="请输入您的密码">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="operate">
		  		<span id="newRegist">注册新账号</span>
		  		<span id="forgetPassword">忘记密码</span>
		  	</div>
		  	<div class="more">
		  		<a href="javascript:void(0);" class="login">登录</a>
		  	</div>
		</div>
	</form>
</div>
<div class="forgetPassword" style="display: none">
	<div class="regist-title">
		<p>您好! 欢迎登录!</p>
		<img src="{{asset('images/cha.png')}}" alt="" class="cha">
	</div>
	<form action="" class="resetForm">
		<div class="regist-content">
		  	<div class="form-group">
		    	<label for="resetEmail" class="col-sm-3 control-label">邮箱:</label>
		    	<div class="col-sm-9">
		      		<input type="text" class="form-control" id="resetEmail" name="email" placeholder="请输入注册邮箱">
		      		<input type="button" class="send-code" data-type="resetEmail" value="发送验证码"/>
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="form-group">
		    	<label for="resetCode" class="col-sm-3 control-label">验证码:</label>
		    	<div class="col-sm-9">
		      		<input type="text" class="form-control" id="resetCode" name="code" placeholder="请输入验证码">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="form-group">
		    	<label for="resetPassword" class="col-sm-3 control-label">新密码:</label>
		    	<div class="col-sm-9">
		      		<input type="password" class="form-control" id="resetPassword" name="newpwd" placeholder="6-20个字符">
		    	</div>
		    	<div class="clearfix"></div>
		  	</div>
		  	<div class="more">
		  		<a href="javascript:void(0);" class="reset">立即重置</a>
		  	</div>
		</div>
	</form>
</div>
<div class="zhezhao" style="display: none"></div>
