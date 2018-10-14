@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container notice">
		<div class="common-title text-center">
			<div class="text-ch">通知消息</div>
			<h3 class="text-en">MESSAGE</h3>
			<div class="short-line"></div>
		</div>
		<div class="content">
			<ul class="notice-list">
				<li>
                  	<div class="col-sm-10 info-name">	
                  		用户:<span>用户名888</span>在评论中提到了您 <a href="">点击查看</a>
                  	</div>
                  	<div class="col-sm-2 info-date">2018-08-28</div>
                  	<div class="clearfix"></div>
				</li>
				<li>
                  	<div class="col-sm-10 info-name">	
                  		消息消息消息消息消息消息消息消息消息
                  	</div>
                  	<div class="col-sm-2 info-date">2018-08-28</div>
                  	<div class="clearfix"></div>
				</li>
				<li>
                  	<div class="col-sm-10 info-name">	
                  		消息消息消息消息消息消息消息消息消息
                  	</div>
                  	<div class="col-sm-2 info-date">2018-08-28</div>
                  	<div class="clearfix"></div>
				</li>
				<li>
                  	<div class="col-sm-10 info-name">	
                  		消息消息消息消息消息消息消息消息消息
                  	</div>
                  	<div class="col-sm-2 info-date">2018-08-28</div>
                  	<div class="clearfix"></div>
				</li>
				<li>
                  	<div class="col-sm-10 info-name">	
                  		消息消息消息消息消息消息消息消息消息
                  	</div>
                  	<div class="col-sm-2 info-date">2018-08-28</div>
                  	<div class="clearfix"></div>
				</li>
			</ul>
		</div>
	</div>
@endsection