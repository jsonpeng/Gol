@extends('front.partial.base')

@section('css')
<style type="text/css">
	.gol_mobile_reg_content{
		padding-top: 150px;
		padding-bottom: 180px;
		
	}
	.gol_mobile_reg_code_button{
		    display: inline-block;
		    border: 1px solid #ccc;
		    color: black;
		    font-size: 16px;
		    text-align: center;
		    width: 154px;
		    padding: 18px;
	}
	.gol_mobile_reg_button{
		font-size: 16px;
		padding: 20px;
		color: white;
		background: #E51C23;
		max-width: 454px;
		margin: 0 auto;
		text-align: center;
	}

	.gol_mobile_reg_input{
		margin-left: 30%;
	}

	.gol_mobile_reg_form_text{
		    width: 120px;
		    position: absolute;
		    left: 18px;
		    top: 18px;
		    font-size: 20px;
	}


</style>
@endsection

@section('seo')
	  <title>{!! getSettingValueByKey('name') !!}|手机号快速注册</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container ">
		<div class="gol_mobile_reg_content ">

			<!--手机号快速注册-->
			<form id="mobile_reg" class="text-center">
				<div class="form-inline ">
					<select name="mobile_type" class="form-control w154 h60">
						<option>中国+86</option>
						<option>中国+0712</option>
					</select>
					<input name="mobile" class="form-control h60" value="" placeholder="建议使用手机号注册" style="min-width: 300px;" />
				</div>

				<div class="form-inline mt30">
					<input name="code" class="form-control h60" value="" placeholder="请输入验证码" style="min-width: 300px;" />
					<div class="gol_mobile_reg_code_button">
						获取验证码
					</div>
				</div>

				<div class="gol_mobile_reg_button mt30 next">
					下一步
				</div>
			</form>

			<!--快速注册完善信息-->
			<form id="info_reg" class="gol_hidden ">
				<div class="form-inline p_relative gol_mobile_reg_input">
					<span class="gol_mobile_reg_form_text">用户名</span>
					<input name="mobile" class="form-control h60 pl120" value="" placeholder="您的账户和登录名" style="min-width: 454px;" />
				</div>

				<div class="form-inline p_relative gol_mobile_reg_input mt30">
					<span class="gol_mobile_reg_form_text">设置密码</span>
					<input name="mobile" class="form-control h60 pl120" value="" placeholder="请设置6-12位密码" style="min-width: 454px;" />
				</div>

				<div class="form-inline p_relative gol_mobile_reg_input mt30">
					<span class="gol_mobile_reg_form_text">确认密码</span>
					<input name="mobile" class="form-control h60 pl120" value="" placeholder="确认密码" style="min-width: 454px;" />
				</div>

				<div class="form-inline p_relative gol_mobile_reg_input mt30">
					<span class="gol_mobile_reg_form_text">邮箱验证</span>
					<input name="mobile" class="form-control h60 pl120" value="" placeholder="请输入合法邮箱" style="min-width: 454px;" />
				</div>

				<div class="form-inline mt30 gol_mobile_reg_input">
					<input name="code" class="form-control h60" value="" placeholder="邮箱验证码" style="min-width: 300px;" />
					<div class="gol_mobile_reg_code_button">
						获取验证码
					</div>
				</div>

				<div class="gol_mobile_reg_button mt30 regCheckNow">
					立即注册
				</div>
			</form>

		</div>
	</div>
@endsection


@section('js')
<script type="text/javascript">
		//第一个下一步
		$('.next').click(function(){
			$(this).parent().hide();
			$('#info_reg').show();
		});

		//第二个立即注册
		$('.regCheckNow').click(function(){

		});
</script>
@endsection