@extends('front.partial.base')

@section('css')
<style type="text/css">
		.gol_top_text{padding-top:5px;padding-right: 20px;color:black;font-size:14px;display: inline-block;}
		.mr20{margin-right:20px;}
		.pt15{padding-top: 15px;}
		.ml20b{margin-left: 20%;}
		.nav>li>a{padding-left: 0; padding-right: 0;color:black;font-size:16px;}
		.nav>li{margin: 0 25px;}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

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
				<a class="navbar-brand mr20" href="/"><img src="/images/gol/logo.jpg"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pt15 " id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav ">
					<li><a href="http://www.bonsignsoft.com">首页</a></li>
				    <li><a href="http://www.bonsignsoft.com/cat/zhuanye">很多人</a></li>
					<li><a href="http://www.bonsignsoft.com/cat/news">酷旅行</a></li>
					<li><a href="http://www.bonsignsoft.com/page/contact">Freelance</a></li>
					<li><a href="http://www.bonsignsoft.com/page/contact">小屋云区</a></li>
					<li><form class="form-inline">
						  <div class="form-group">
						    <div class="input-group">
						      <input type="text" class="form-control" name="search_all" placeholder="全站搜索">
						      <div class="input-group-addon"><img src="/images/gol/search.png" /></div>
						    </div>
						  </div>
						</form>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</div>



@if(count($banners))
<div id="carousel-example-generic" class="carousel slide banner-slide" data-ride="carousel">
  	<!-- Indicators -->
  	<ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" ></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>
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





@endsection


@section('js')
	<script>

	</script>
@endsection
