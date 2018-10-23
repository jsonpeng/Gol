@extends('front.partial.base')

@section('css')
<style type="text/css">
  .gol_user_login_content{
    padding-top: 50px;
    padding-bottom: 300px;
  }
  .gol_user_login_box{
    border: 1px solid rgba(187,187,187,1);
    border-radius: 10px;
    width: 380px;
    height: 100%;
    padding-top: 35px;
    padding-left: 30px;
    padding-right: 30px;
    padding-bottom: 45px;
  }
</style>
@endsection

@section('seo')
	  <title>{!! getSettingValueByKey('name') !!}|用户登录</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container ">

      <div class="row gol_user_login_content">
        <div class="col-sm-7">
        </div>

        <div class="col-sm-5">
            <div class="gol_user_login_box">
              <p class="f24" style="border-bottom: 1px solid #ddd;"> 
                密码登录
              </p>
              <form action="" method="post" class="pt30">
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <input type="email" name="email" value="" class="form-control" placeholder="邮箱/用户名/已验证手机号">
                   
                </div>
                <div class="form-group has-feedback">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input type="password" name="password" class="form-control" placeholder="密码">
                 
                </div>

                <div class="row pt15">
                    
                    <div class="col-sm-12">
                        <button type="submit" class="btn  btn-block" style="background: #FF1E11;color: white;">登录</button>
                    </div>
                    
                </div>

                <div class="row pt30">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-3">
                      <a href="" style="color: black;">忘记密码</a>
                    </div>
                    <div class="col-sm-3">
                      <a href="" style="color: black;">其他登录</a>
                    </div>
                    <div class="col-sm-3">
                      <a style="color: #E51C23;">立即注册</a>
                    </div>
                </div>

            </form>
             </div>
        </div>
      </div>

	</div>
@endsection