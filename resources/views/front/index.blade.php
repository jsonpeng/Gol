@extends('front.partial.base')

@section('css')
<style type="text/css">
		/**
		 * [首页]
		 * @type {[type]}
		 */
		.gol_top_text{padding-top:5px;padding-right: 20px;color:black;font-size:14px;display: inline-block;}
		.gol_search_button{
			position: absolute;
		    right: 20px;
		    padding: 8px;
		    top: 27px;
		    color: white;
		    background: rgb(242, 18, 18);
		}
		.gol_search_img{
			position: absolute;
		    top: 36px;
		    left: 15px;
		}
		.gol_four_img{
			float: left;
			width: 500px;
			height:auto;
			max-height: 330px;
			text-align: center;
		}
		.gol_four_img > img{
			width:100%;
			height:auto;
		}
		.gol_post_img{
		    position: absolute;
		    right: 0;
		    top: 10px;
		}
		.gol_post_bg1{
			background-color: rgb(252, 252, 252);
		}
		.gol_post_bg2{
			background-color: rgb(240, 248, 255);
		}
		.gol_post_bg1 span,.gol_post_bg2 span{
			display: inline-block;
		}
		/**
		 * [全局]
		 * @type {[type]}
		 */
		.p_relative{position: relative;}
		a:hover { color: #FF5511; text-decoration: underline; }
		.h60{height:60px;}
		.mr20{margin-right:20px;}
		.mt15{margin-top:15px;}
		.mb25{margin-bottom: 25px;}
		.pt15{padding-top: 15px;}
		.pt30{padding-top:30px;}
		.pt50{padding-top:50px;}
		.pb50{padding-bottom: 50px;}
		.pb15{padding-bottom: 15px;}
		.pl50{padding-left: 50px;}
		.pl80{padding-left: 80px;}
		.ml20b{margin-left: 20%;}
		.w50{width:50%;}
		.f24{font-size:24px;}
		.h163{height:163px;}
		.img_auto{width:100%;height:auto;}
		.form-control:focus{
			border-color:#FF5511;
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #FF5511;
		}
		/**
		 * [菜单导航]
		 * @type {Number}
		 */
		.gol_logo{
			width: 100px;
    		height: auto;
    	}
    	.gol_footer{
    		background: #ddd;
    	}
    	.gol_footer_menus{
    		padding-top: 8px;
    		border-top: 1.5px solid #666;
    		margin-left: 10%;
    		margin-right:10%;
    		padding-bottom: 40px;
    	}
    	.gol_footer_menus a{
    		font-size:16px;
    		color: black;
    		padding-right: 35px;
    		display: inline-block;
    	}
    	.gol_footer_beian{
    		padding-left: 10%;
    	}
		.nav>li>a{padding-left: 0; padding-right: 0;color:black;font-size:16px;}
		.nav>li{margin: 0 25px;}
		.nav>li>a:focus, .nav>li>a:hover {
		    text-decoration: none;
		    background-color: transparent;
		    color:#FF5511; 
		}

</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

<!-- 右侧顶部 -->
<div class="gol_top">
	<div class="container"> 
		<div class="pull-right">
			<a class="gol_top_text">请登录</a>
			<a class="gol_top_text">注册</a>
			<a class="gol_top_text">设计</a>
			<a class="gol_top_text">案例</a>
			<a class="gol_top_text">消息通知</a>
		</div>
	</div>
</div>

<!-- 网站菜单 -->
<div class="gol_header pt15">
	<nav class="navbar " id="header-nav">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand mr20 " href="/"><img  class="gol_logo" src="/images/gol/logo.jpeg"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pt15 " id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav ">
					<li><a href="http://www.bonsignsoft.com">首页</a></li>
				    <li><a href="http://www.bonsignsoft.com/cat/zhuanye">很多人</a></li>
					<li><a href="http://www.bonsignsoft.com/cat/news">酷旅行</a></li>
					<li><a href="http://www.bonsignsoft.com/page/contact">Freelance</a></li>
					<li><a href="http://www.bonsignsoft.com/page/contact">小屋云区</a></li>
					<li class="pl80"><form class="form-inline">
						  <div class="form-group">
						    <div class="input-group">
						      <input type="text" class="form-control" name="search_all" placeholder="全站搜索">
						      <div class="input-group-addon"><img src="/images/gol/search_gray.png" /></div>
						    </div>
						  </div>
						</form>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</div>

<!--滚动banner-->
@if(count($banners))
<div id="carousel-example-generic" class="carousel slide banner-slide" data-ride="carousel">
  	<!-- Indicators -->
{{--   	<ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" ></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol> --}}
	<div class="carousel-inner" role="listbox" style="max-height: 540px;">
		<?php $num = 0;?>
		@foreach ($banners as $banner)
		<?php $num++; ?>
			@if($num==1)
			<div class="item active">
				<img src="{{ $banner->image }}" alt="">
			</div>
			@else
			<div class="item">
				<img src="{{ $banner->image }}" alt="">
			</div>
			@endif
		@endforeach
  	</div>
</div>
@endif

<!-- 搜索框 -->
<div class="">
	<div class="container">

		<div class="pt15 p_relative" ><img class="gol_search_img" src="/images/gol/search_black.png" /><input class="form-control h60 pl50" name="search_other" placeholder="目的地、开放日、城市、地址" /><span class="gol_search_button">搜索</span></div>

	</div>
</div>

<!-- 小屋推荐 -->
<div class="pt30">
	<div class="container">
		<div class="text-center f24">———&nbsp;&nbsp;小屋推荐&nbsp;&nbsp;———</div>
		<div class="pt30">
			<div class="gol_four_img">
				<img src="/images/gol/青旅.jpeg" />
			</div>
			<div class="gol_four_img">
				<img src="/images/gol/客栈.jpeg" />
			</div>
			<div class="gol_four_img">
				<img src="/images/gol/民宿.jpeg" />
			</div>
			<div class="gol_four_img">
				<img src="/images/gol/空间.jpeg" />
			</div>
		</div>
	</div>
</div>


<!-- 小屋故事  -->
<div class="pt30 container">
	<div class="text-center f24">———&nbsp;&nbsp;小屋故事&nbsp;&nbsp;———</div>
	<div class="pt30 ">

		<div class="gol_four_img p_relative">
			<div class="w50 h163 gol_post_bg1">
				<h4 class="pt30">麦克白和威尼斯商人</h4>
				<span>2018-09-01</span>
				<p>公告/故事简介</p>
				<span class="pt15 pb50">READ MORE</span>
			</div>
			<div class="w50 gol_post_img">
				<img src="/images/gol/post.jpeg" class="img_auto" />
			</div>
		</div>

		<div class="gol_four_img p_relative">
			<div class="w50 h163 gol_post_bg2">
				<h4 class="pt30">麦克白和威尼斯商人</h4>
				<span>2018-09-01</span>
				<p>公告/故事简介</p>
				<span class="pt15 pb50">READ MORE</span>
			</div>
			<div class="w50 gol_post_img">
				<img src="/images/gol/post.jpeg" class="img_auto" />
			</div>
		</div>

	</div>
</div>


<!-- 小屋新主成交记录 最新消息 公告 -->
<div class="pt50 pb50 container">
	<div class="row">

		<div class="col-sm-6">
			<div class="row">

				<div class="col-sm-3">
					<h4 class="pt30">小屋新主</h4>
				</div>

				<div class="col-sm-6">
					<p>坐落于新郑的*****完成交接</p>
					<p>坐落于新郑的*****完成交接</p>
					<p>坐落于新郑的*****完成交接</p>
				</div>

				<div class="col-sm-3">
					<p>2018年9月1日</p>
					<p>2018年9月1日</p>
					<p>2018年9月1日</p>
				</div>

			</div>
		</div>

		<div class="col-sm-6">
			<div class="row pt30">

				<div class="col-sm-6 ">
					<p>消息:</p>
					<p>麦克白和威尼斯商人</p>
				</div>

				<div class="col-sm-6">
					<p>公告:</p>
					<p>麦克白和威尼斯商人</p>
				</div>

			</div>
		</div>

	</div>

</div>


<!--底部菜单-->
<div class="gol_footer  pb15">

	<div class="pt15">
		<div class="gol_footer_menus">
			<a>关于小屋</a>
			<a>合作服务</a>
			<a>小屋APP</a>
			<a>小屋微信</a>
		</div>
	</div>

	<div class="gol_footer_beian">
		<p>公安备案|Copyright 索尔科技(上海)有限公司ICP备案号</p>
	</div>
</div>

@endsection


@section('js')
	<script>

	</script>
@endsection
