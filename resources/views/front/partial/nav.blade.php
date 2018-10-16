
@if(count($menus))
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" href="#">
						<img src="{{asset('images/logo.png')}}" alt="">
				    </a>
				    @if(auth('web')->check())
				    <span class="users-xs visible-xs" >
		    			<?php $user= auth('web')->user();$image = empty($user->head_image) ? url('/images/head.png') : $user->head_image;?>
						<a href="javascript:void(0);" id="toUsercenter">
							<img src="{{ $image  }}" alt="" width="30" height="30">
						</a>
		    			<ul class="users-menu" style="display: none;">
		    				<?php $unreads = count(app('notice')->authNotices(auth('web')->user())); ?>
		    				<li><a href="/auth/notices" class="{{empty($unreads) ? '' :'msg'}}">通知消息</a></li>
			        		<li><a href="/auth/setting">账号设置</a></li>
			        		<li><a href="javascript:void(0);" id="logout">退出登录</a></li>
		    			</ul>
			    	</span>
			    	@else
				    <span class="users-xs visible-xs">
		    			<a href="javascript:void(0);" class="toLogin" style="color:#fff;">登录</a>
		    			<span>/</span>
		    			<a href="javascript:void(0);" class="toRegist" style="color:#fff;">注册</a>
				    </span>
				    @endif
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    	<ul class="nav navbar-nav navbar-right">
			    		@foreach($menus as $menu)
				    		<li class="dropdown ">
				    			<a href="{!! $menu->link !!}" class="@if(count($menu['children'])) dropdown-toggle @endif">
				    				<span>{!! $menu->name !!}</span>
				    				<span class="visible-lg">{!! word_en($menu->name) !!}</span>
				    			</a>
				    			@if(count($menu['children']))
				    				<ul class="dropdown-menu hidden-xs">
				    					@foreach ($menu['children'] as $child)
								        	<li><a href="{!! $child->link !!}">{!! $child->name !!}</a></li>
								      	@endforeach
						        	</ul>
				    			@endif
				    		</li>
	   			 		@endforeach


						@if(auth('web')->check())
			    		<li class="special users hidden-xs" style="background-color: #4597d0; padding:0;">
			    			<?php $user= auth('web')->user();$image = empty($user->head_image) ? url('/images/head.png') : $user->head_image;?>
							<a href="javascript:void(0);" id="toUsercenter" class="nowrap" style="background:url('{{ $image  }}') no-repeat left center;background-size: 44px 44px; padding-left: 60px;padding-right: 20px;">{!! auth('web')->user()->name !!}</a>
			    			<ul class="user-menu" style="display: none">
			    				<?php $unreads = count(app('notice')->authNotices(auth('web')->user())); ?>
			    				<li><a href="/auth/notices">通知消息</a>@if($unreads)<span>{!! $unreads !!}</span>@endif</li>
				        		<li><a href="/auth/setting">账号设置</a></li>
				        		<li><a href="javascript:void(0);" id="logout">退出登录</a></li>
			    			</ul>
				    	</li>
				    	@else
				    	<li class="special hidden-xs">
			    			<a href="javascript:void(0);" class="toLogin">登录</a>
			    			<span>/</span>
			    			<a href="javascript:void(0);" class="toRegist">注册</a>
			    		</li>
			    		@endif
						
			    	</ul>
			    </div>
		    </div>
		</nav>
	</header>
@endif


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
</header>


