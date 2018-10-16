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
		.pl50{padding-left: 50px;}
		.pl80{padding-left: 80px;}
		.ml20b{margin-left: 20%;}
		/**
		 * [菜单导航]
		 * @type {Number}
		 */
		.gol_logo{
			width: 100px;
    		height: auto;
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
<div class="container">

	<div class="pt15 p_relative" ><img class="gol_search_img" src="/images/gol/search_black.png" /><input class="form-control h60 pl50" name="search_other" placeholder="目的地、开放日、城市、地址" /><span class="gol_search_button">搜索</span></div>

</div>


@endsection


@section('js')
	<script>

	</script>
@endsection
