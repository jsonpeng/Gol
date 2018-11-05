
<style>
	.navbar-default .navbar-toggle{
		border-color:#fff;
	}
	.navbar-default .navbar-toggle .icon-bar{
		background-color: #fff;
	}
	.navbar-header .users-xs{
		padding:8px 20px 8px 0;
		line-height: 34px; 
		float:right; 
		color:#fff;
		font-size: 14px;
	}
	.navbar-header .users-xs>a{
		display: inline-block;
		line-height: inherit;
	}
	.navbar-header .users-xs .users-menu{
		position:absolute;
		right:0;
		top:50px;
		background-color: #c8effe;
		padding:10px 20px;
	}
	.navbar-header .users-xs .users-menu li{
		position:relative;
	}
	.navbar-header .users-xs .users-menu li:nth-child(1) a{
		padding-left: 25px;
        background:url('/images/msg.png') no-repeat left center; 
        background-size: 15px 15px;
        position: relative;
	}
	.navbar-header .users-xs .users-menu li:nth-child(1) a.msg:after{
		content: '';
		position:absolute;
		right:-5px;
		top:0;
		background-color: #e60012;
		width:5px;
		height:5px;
		border-radius: 50%;
	}
	.navbar-header .users-xs .users-menu li:nth-child(2) a{
		padding-left: 25px;
        background:url('/images/set.png') no-repeat left center; 
        background-size: 15px 15px;
	}
	.navbar-header .users-xs .users-menu li:nth-child(3) a{
		padding-left: 25px;
        background:url('/images/exit.png') no-repeat left center; 
        background-size: 15px 15px;
	}
	.navbar-header .users-xs .users-menu li:nth-child(1) span{
		position:absolute;
		right:0; 
		top:15px;
		padding:0;
		display: block;
		text-align:center;
		line-height:24px;
		width:24px;
		background-color: #e60012;
		border-radius: 50%;
	}
</style>

<header>
<!-- 右侧顶部 -->
<div class="gol_top">
	<div class="container"> 
		<div class="pull-right">
			<?php 
			$user = auth('web')->user();
			?>
			@if(empty($user))
			<a class="gol_top_text" href="/user/login">请登录</a>
			<a class="gol_top_text" href="/user/reg/mobile">注册</a>
			@else
			<a class="gol_top_text" ><span class="gol_color">{!! $user->name !!}</span>,你好</a>
			<a class="gol_top_text" href="/user/center/index">我的个人中心</a>
			<a class="gol_top_text gol_logout" href="javascript:;">安全退出</a>
			@endif
		{{-- 	<a class="gol_top_text">设计</a>
			<a class="gol_top_text">案例</a> --}}
			@if(!empty($user))
			<?php 
			$unreads = count(app('notice')->authNotices($user));
			?>
			<a class="gol_top_text gol_notice_menu" href="/user/center/notice">消息通知@if($unreads > 0)(<span style="color:red;" class="gol_notice_num">{!! $unreads !!}</span>)@endif</a>
			@endif
		</div>
	</div>
</div>

<!-- 网站菜单 -->
<div class="gol_header pt15 @if(!Request::is('/')) border_b @endif">
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
					@if(Request::is('user/login'))
					<li><a href="javascript:;">欢迎登陆</a></li>
					@elseif(Request::is('user/reg*'))
					<li><a href="javascript:;">欢迎注册</a></li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li> </li>
					<li class="pull-right"><span>已有账号?<a href="/user/login" style="color: #E51C23;">请登录></a></span></li>
					@elseif(Request::is('page/protocol'))
					<li><a href="/">首页</a></li>
					<li><a href="tencent://message/?Menu=yes&uin=<?php echo getSettingValueByKeyCache('qq1'); ?>&Site=80fans&Service=300&sigT=45a1e5847943b64c6ff3990f8a9e644d2b31356cb0b4ac6b24663a3c8dd0f8aa12a545b1714f9d45" target="_blank"">在线客服</a></li>
					@else
					@if(count($menus))
						@foreach($menus as $menu)
							<li><a href="{!! $menu->link !!}">{!! $menu->name !!}</a></li>
						@endforeach
					@endif
					<li class="pl80"><form class="form-inline">
						  <div class="form-group">
						    <div class="input-group">
						      <input type="text" class="form-control" name="search_all" placeholder="">
						      <div class="input-group-addon site_search_all"><img src="/images/gol/search_gray.png" /></div>
						    </div>
						  </div>
						</form>
					</li>
					@endif

				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>
</div>

<!-- 很多人导航 -->
@if(Request::is('manyMan*'))
<!-- <div class="container">
<a class="gol_many_top_a @if($type == '小屋') active @endif">很多人小屋</a> <a class="gol_many_top_a">很多人社区</a> 
</div> -->
@endif

<!-- gol系列导航 -->
@if(Request::is('series*'))
<div class="container pt30">
	<a class="gol_many_top_a @if($type=='青旅') active @endif" href="/series/青旅">GOL.青旅</a>
	<a class="gol_many_top_a @if($type=='客栈') active @endif" href="/series/客栈">GOL.客栈</a>
	<a class="gol_many_top_a @if($type=='民宿') active @endif" href="/series/民宿">GOL.民宿</a>
	<a class="gol_many_top_a @if($type=='空间') active @endif" href="/series/空间">GOL.空间</a>
</div>
@endif


<!--滚动banner-->
@if(count($banners) && !Request::is('manyDetail*') && !Request::is('golDetail*') && !Request::is('user*') && !Request::is('protocol') && !Request::is('manySettle*'))
<div id="carousel-example-generic" class="carousel slide banner-slide" data-ride="carousel">
	<div class="carousel-inner" role="listbox" style="max-height: 540px;">
		<?php $num = 0;?>
		@foreach ($banners as $banner)
		<?php $num++; ?>
			@if($num==1)
			<a class="item active " href="{!! !empty($banner->link) ? $banner->link : 'javascript:;' !!}">
				<img src="{{ $banner->image }}" alt="">
			</a>
			@else
			<a class="item " href="{!! !empty($banner->link) ? $banner->link : 'javascript:;' !!}">
				<img src="{{ $banner->image }}" alt="">
			</a>
			@endif
		@endforeach
  	</div>
</div>
@endif
</header>


