@extends('front.partial.base')

@section('css')
<style type="text/css">
	.message {
	      border: none;
	      display: inline-block;
	      background: #ddd;
	      margin-left: 15px;
	}

	button[disabled] {
	    color: #fff;
	  
	}

	.message-active {
	    background: #FF5511;
	    border: none;
	    display: inline-block;
	    margin-left: 15px;
	    color:#fff;
	}
	.gol_m_detail_button{
		display: inline-block;
		border: 1px solid rgba(187,187,187,1);
		padding: 10px 20px;
		color: black;
		margin-left: 30px;
		text-align: center;
		font-size: 14px;
		border-radius: 5px;
	}
	.gol_m_detail_user_box{
		padding-left:22px;
		padding-right:22px;
		padding-top:20px;
		padding-bottom: 35px;
		width: 360px;
		height: 270px;
		line-height: 20px;
		border: 1px solid rgba(187, 187, 187, 1);
	}
	/*档位选择按钮*/
	.gol_many_gears{
		font-size: 14px;
		border:1px solid #ccc;
		padding:10px 20px 10px 20px;
		color: red;
		text-align: center;
	    margin-right: 20px;
	}
	.gol_many_gears.active{
		border:1px solid #FF5511;
		background: #FF5511;
		color:white;
	}
	.gol_many_action{
			position: absolute;
		    border: 1px solid #ccc;
		    padding: 2px 10px;
		    /* margin-top: 0px; */
		    display: inline-block;
		    font-weight: 900;
		    font-size: 20px;
	}
	/*去支持*/
	.gol_many_zhichi{
			padding: 15px 30px 15px 30px;
		    color: rgb(255, 255, 255);
		    background-color: rgb(14, 191, 175);
		    border-color: rgb(255, 255, 255);
		    border-radius: 6px;
		    font-size: 16px;
		    border-width: 1px;
		    border-style: solid;
		    text-align: center;
		    font-weight: normal;
		    font-style: normal;
		    opacity: 1;
	}
	/*tab*/
	#myTab>li>a {
    	padding: 15px;
	}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
		color: white;
		background: #FF5511;
		border: 1px solid #FF5511;
	}
	/*评论*/
	.reply-box{
			margin-top: 30px;
		}
		.reply-box .more{
	        padding-top:30px;
	       
	    }
        .reply-box .more a{
          color:#fff;
          background-color: #FF5511;
          padding:8px 34px;
          border-radius: 15px;
          border: 1px solid #FF5511;
        }
        .reply-box .more a:first-child{
        	background-color: transparent;
        	color:black;
        	margin-right: 20px;
        }
        @keyframes mypraise{
			0% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
			25% {
			    top: -22.5px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			50% {
			    top: -25px;
			    opacity: 1;
			    filter: Alpha(opacity=100);
			    -moz-opacity: 1;
			}
			75% {
			    top: -27.5px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			100% {
			    top: -30px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
		}
		@-webkit-keyframes mypraise{
			0% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
			25% {
			    top: -25px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			50% {
			    top: -30px;
			    opacity: 1;
			    filter: Alpha(opacity=100);
			    -moz-opacity: 1;
			}
			75% {
			    top: -25px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			100% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
		}
		@-moz-keyframes mypraise{
			0% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
			25% {
			    top: -25px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			50% {
			    top: -30px;
			    opacity: 1;
			    filter: Alpha(opacity=100);
			    -moz-opacity: 1;
			}
			75% {
			    top: -25px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			100% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
		}
		@-o-keyframes mypraise{
			0% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
			25% {
			    top: -25px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			50% {
			    top: -30px;
			    opacity: 1;
			    filter: Alpha(opacity=100);
			    -moz-opacity: 1;
			}
			75% {
			    top: -25px;
			    opacity: 0.5;
			    filter: Alpha(opacity=50);
			    -moz-opacity: 0.5;
			}
			100% {
			    top: -20px;
			    opacity: 0;
			    filter: Alpha(opacity=0);
			    -moz-opacity: 0;
			}
		}
		@keyframes myfirst{
			0% {
			    background-size: 15px 15px;
			}
			50% {
			    background-size: 20px 20px;
			}
			100% {
			    background-size: 15px 15px;
			}
		}
		@-webkit-keyframes myfirst{
			0% {
			    background-size: 15px 15px;
			}
			50% {
			    background-size: 20px 20px;
			}
			100% {
			    background-size: 15px 15px;
			}
		}
		@-moz-keyframes myfirst{
			0% {
			    background-size: 15px 15px;
			}
			50% {
			    background-size: 20px 20px;
			}
			100% {
			    background-size: 15px 15px;
			}
		}
		@-o-keyframes myfirst{
			0% {
			    background-size: 15px 15px;
			}
			50% {
			    background-size: 20px 20px;
			}
			100% {
			    background-size: 15px 15px;
			}
		}
		.animation{
			animation: myfirst 0.5s;
			-webkit-animation: myfirst 0.5s;
			-moz-animation: myfirst 0.5s;
			-o-animation: myfirst 0.5s;
		}
		.add-animation{
		    animation: mypraise 0.5s ;
		    -moz-animation: mypraise 0.5s ;	/* Firefox */
		    -webkit-animation: mypraise 0.5s ;	/* Safari 和 Chrome */
		    -o-animation: mypraise 0.5s ;	/* Opera */
		}
		 .commits {
		  /*border-top: 1px dotted #dcdcdc;*/
		}
		 .commits .commit-myself .comm-content {
		  padding-top: 24px;
		}
		 .commits .commit-myself .comm-content .user-head {
		  padding-right: 20px;
		}
		 .commits .commit-myself .more {
		  padding-top: 30px;
		  padding-bottom: 40px;
		}
		 .commits .commit-myself .more a {
		  color: #fff;
		  background-color: #FF5511;
		  padding: 8px 35px;
		  border-radius: 15px;
		}
		 .commits .commit-myself .more span {
		  display: inline-block;
		  width: 190px;
		  margin-left: 30px;
		  position: relative;
		}
		 .commits .commit-myself .more span .form-control {
		  border-radius: 17px;
		}
		 .commits .commit-myself .more span canvas {
		  position: absolute;
		  right: 0;
		  top: 0;
		}
		 .commits .new-commit .title {
		  margin-bottom: 25px;
		}
		 .commits .new-commit .comm-item {
		  position: relative;
		  padding-bottom: 60px;
		  border-bottom: 1px dashed #dcdcdc;
		  overflow: visible;
		}
		 .commits .new-commit .comm-item .media-left {
		  padding-right: 20px;
		}
		 .commits .new-commit .comm-item .media-body h5 {
		  padding: 5px 0;
		}
		 .commits .new-commit .comm-item .media-body .pub-date {
		  padding-bottom: 15px;
		}
		 .commits .new-commit .comm-item .media-body .comm-text {
		  line-height: 30px;
		}
		 .commits .new-commit .comm-item .media-body .reply-num {
		  margin-top: 20px;
		  display: inline-block;
		  padding: 12px 25px;
		  background-color: #efefef;
		  color: #333;
		}
		 .commits .new-commit .comm-item .media-body .reply-num span {
		  color: #004796;
		}
		 .commits .new-commit .comm-item .media-body .reply-num .open-comm {
		  margin-left: 5px;
		}
		 .commits .new-commit .comm-item .media-body .comm-reply .comm-item {
		  padding-top: 20px;
		  padding-bottom: 0;
		}
		 .commits .new-commit .comm-item .media-body .comm-reply .comm-item .operate {
		  top: 20px;
		}
		 .commits .new-commit .comm-item .media-body .comm-reply .comm-item .reply-box {
		  padding-bottom: 10px;
		}
		 .commits .new-commit .comm-item .media-body .comm-reply .shou {
		  text-align: center;
		  color: #004796;
		  margin-top: 30px;
		}
		 .commits .new-commit .comm-item .media-body .comm-reply .shou span {
		  padding-left: 16px;
		  background: url('/images/arrow-top.png') no-repeat left center;
		}
		 .commits .new-commit .comm-item .operate {
		  position: absolute;
		  right: 0;
		  top: 15px;
		}
		 .commits .new-commit .comm-item .operate .praise {
		  display: inline-block;
		  position: relative;
		}
		 .commits .new-commit .comm-item .operate .praise span.dianzan {
		  display: inline-block;
		  padding-left: 22px;
		  line-height: 20px;
		  height: 16px;
		  background: url('/images/zan.png') no-repeat left center;
		}
		 .commits .new-commit .comm-item .operate .praise span.dianzans {
		  background: url('/images/zan_light.png') no-repeat left center;
		}
		 .commits .new-commit .comm-item .operate .praise .add-num {
		  position: absolute;
		  top: -20px;
		  left: 0;
		  opacity: 0;
		  filter: alpha(opacity=0);
		  -moz-opacity: 0;
		  color: #000;
		}
		 .commits .new-commit .comm-item .operate .praise .add-num.hover {
		  color: #008837;
		}
		 .commits .new-commit .comm-item .operate a {
		  margin-left: 35px;
		  color: #333;
		}
		 .commits .new-commit .same-item {
		  padding: 60px 0;
		}
		 .commits .new-commit .same-item .operate {
		  top: 60px;
		}
		 .commits .more-comm {
		  margin-top: 60px;
		  text-align: center;
		}
		 .commits .more-comm span {
		  display: inline-block;
		  padding-bottom: 25px;
		  background: url('/images/arrow-bottom.png') no-repeat bottom center;
		}
		#home img{
			width: 100%;
		}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

	<div class="container">
		@if($error)
		<h1 class="text-center mt30 pb220">{!! $error !!}</h1>
		@else
		<!--小屋新主上传的主图-->
		<div class="row pt30 reveal1">
			<div class="col-sm-7">
				<img onerror="javascript:this.src='/images/gol/xiaowu_main.png';" src="{!! $hourse->image !!}"  class="img_auto" style="max-height: 300px;" />
			</div>
			<div class="col-sm-5">
				<p class="pb15">{!! $hourse->name !!}</p>
				<p class="pb15">{!! des($hourse->content,20) !!}</p>
				<p class="f24 fw700">￥{!! $hourse->target !!}万</p>

				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: {!! $hourse->progress !!}%;">
					</div>
				</div>

				<div >
					<span class="pull-left">当前进度:{!! $hourse->progress !!}%</span><span class="pull-right">{!! $hourse->support_people !!}名支持者</span> 
				</div>

				<div class="row pt30">
						<a class="col-sm-2"></a>
						<a class="col-sm-3 gol_m_detail_button gol_attention" data-id="{!! !empty($user) ? $user->id : '' !!}" data-houseid="{!! $id !!}">@if($attention_status)已@endif关注({!! $hourse_attention_num !!})</a>
						@if(count($hourse->all_gears) > 0 && !empty(optional($hourse->all_gears)[0]))
						<a class="col-sm-3 gol_m_detail_button gol_join_many" data-id="{!! !empty($user) ? $user->id : '' !!}" data-status="{!! $hourse->status !!}">加入小屋家</a>
						@endif
						<a class="col-sm-2"></a>
				</div>

			</div>
		</div>

		<!--小屋详情-->
		<div class="row pt30 pb50 ">
			<div class="col-sm-7 ">
			{{-- 	<div>
					<a href="" class="gol_top_text f16">小屋介绍</a>
					<a href="" class="gol_top_text f16">小屋计划</a>
					<a href="" class="gol_top_text f16">小屋话题</a>
				</div> --}}
				<ul id="myTab" class="nav nav-tabs mb25">
					<li @if(!array_key_exists('page', $input)) class="active" @endif>
						<a href="#home" data-toggle="tab">
							 小屋介绍
						</a>
					</li>
					<li><a href="#plan" data-toggle="tab">小屋计划</a></li>
					<li><a href="#topic" data-toggle="tab">小屋话题</a></li>
				</ul>

			<div id="myTabContent" class="tab-content ">

					<div class="tab-pane fade @if(!array_key_exists('page', $input)) in active @endif" id="home">
							<!--详情内容-->
							{!! $hourse->content !!}
					</div>

					<div class="tab-pane fade" id="plan">
							<!--小屋计划-->
							{{-- <a href="{!! $hourse->plan_address !!}" target="_blank" >小屋计划书附件下载查看</a> --}}
							<iframe src="https://view.officeapps.live.com/op/view.aspx?src={!! $hourse->plan_address !!}" style="width: 100%;min-height: 1000px;"></iframe>
					</div>

					<div class="tab-pane fade @if(array_key_exists('page', $input)) in active @endif" id="topic">

						<div class="commits">
								<div class="commit-myself">
									<div class="comm-limits">
										<p>合计<span style="color:#008837;">{!! $count !!}</span>条话题  想和大家交流什么? </p>
										@if(!auth('web')->check())
											<a href="/user/login" class="toLogin" style="margin-left: 12px;">登录</a>
											<span>/</span>
											<a href="/user/reg/mobile" class="toRegist">注册</a>
										@endif
									</div>
									<div class="comm-content">
										<div class="media">
											<div class="media-left user-head">
												<img src="{{ isset($user->head_image) ? $user->head_image : '/images/head.png' }}" width="51" height="51" alt="">
											</div>
											<div class="media-body">
												<textarea class="form-control my-content" maxlength="150" placeholder="输入你想了解的内容" rows="4"></textarea>
											</div>
										</div>
									</div>
									<div class="more pull-right">
										<a href="javacript:void(0);" class="fabu hidden-xs">立即发布</a>
										<span>
											<input type="text" class="form-control input-code" placeholder="输入验证码">
											<canvas id="canvas" width="100" height="34">您的浏览器不支持canvas，请换个浏览器试试~</canvas>
										</span>	
										<div class="visible-xs" style="padding:15px 0;">
											<a href="javacript:void(0);" class="fabu ">立即发布</a>
										</div>	
									</div>
								</div>
								@if(count($messages))
									<div class="new-commit mt50">
										<p class="title">最新话题</p>
										@foreach ($messages as $message)
											<div class="media comm-item items" @if(isset($message['active'])) id="scroll_item" @endif> 
												<div class="media-left">
													<img src="{{  $message['user']->head_image }}" onerror="javascript:this.src='/images/head.png';" alt="" width="51" height="51">
												</div> 
												<div class="media-body">
													<h5>{!! $message['user']->name !!} @if($hourse_user->id == $message['user']->id) {!! tag('[小屋发布者]') !!} @endif</h5>
													<p class="pub-date">{!! $message->created_at !!}</p>
													<p class="comm-text">{!! $message->content !!}</p>
													@if(count($message['attach']) > 0)
														<a class="reply-num" href="javascript:void(0);">
															<span>{!! $message['user_names_arr'] !!}</span>等人 <span class="open-comm">共{!! count($message['attach']) !!}条回复></span>
														</a>
													@endif
													<div class="comm-reply" style="display: none">
														@if(count($message['attach']) >0)
															@foreach($message['attach'] as $item)
																<div class="media comm-item" @if(isset($item['active'])) id="scroll_item" @endif>
																	<div class="media-left">
																		<img  src="{!! $item['user']->head_image !!}" onerror="this.src='/images/head.png';" alt="" width="51" height="51">
																	</div>
																	<div class="media-body">
																		<h5>{!! $item['user']->name !!}@if($hourse_user->id == $item['user']->id) {!! tag('[小屋发布者]') !!} @endif</h5>
																		<p class="pub-date">{!! $item->created_at !!}</p>
																		<p class="comm-text">回复<span style="color:#004796;">@ {!! $item['replyuser']->name !!}</span> ： {!! $item->content !!}</p>
																	</div>
																	<div class="operate">
																		<span class="praise" data-id="{!! $item->id !!}" data-more="has">
																		</span>
																		<a href="javascript:void(0);" data-reply="{{ $item['user']->id }}" data-id="{{ $message->id }}" class="toReply">回复</a>
																	</div>
																</div>
															@endforeach
														@endif
														<p class="shou"><span>收起</span></p>
													</div>
												</div>
												<div class="operate">
													<span class="praise" data-id="{!! $message->id !!}" data-more="nothas">
														<span class="add-num"><em>+1</em></span>
													</span>
													<a href="javascript:void(0);" data-reply="{{ $message['user']->id }}" data-id="{{ $message->id }}" class="toReply">回复</a>
												</div>
											</div>
									   @endforeach
									   {!! $messages->appends('')->links() !!}
									</div>
							
								@endif
						</div>
						
					</div>

			
			</div>
			</div>

			<div class="col-sm-5 reveal2">
				<div class="gol_m_detail_user_box" style="margin:0 auto;">
					<p class="f24 " > 小屋新主 </p>
					<div style="border-bottom: 1px solid rgba(187,187,187,1);" class="pt15"></div>

					<div class="row pt30">
						<div class="col-sm-3">
							<img onerror="javascript:this.src='/images/gol/xiaowu_main.png';" src="{!! $hourse_user->head_image !!}" class="img_auto">
						</div>
						<div class="col-sm-9">
							<p>{!! $hourse_user->name !!}</p>
							<p>{!! $hourse_user->brief !!}</p>
							<p>小屋&nbsp;&nbsp;{!! $hourse_user_has_num !!} &nbsp;&nbsp;&nbsp; 支持 {!! $hourse_user_support_num !!}</p>
						</div>
					</div>

					<div class="row pt15">
						<a class="col-sm-2"></a>
					{{-- 	<a class="col-sm-3 gol_m_detail_button gol_sixin" data-id="{!! !empty($user) ? $user->id : '' !!}" data-name="{!! !empty($user) ? $user->name : '' !!}">私信</a> --}}
						<a class="col-sm-3 gol_m_detail_button gol_zixun" data-id="{!! !empty($user) ? $user->id : '' !!}">咨询</a>
						<a class="col-sm-2"></a>
					</div>

				</div>
			</div>
		</div>


		<div class="gol_zixun_dom" style="display: none;">
				<div class="row mt30 text-center">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<a class="f20" href="tel:{!! $hourse_user->mobile !!}" style="color: black;">手机号:{!! $hourse_user->mobile !!}</a>
					</div>
					<div class="col-sm-3">
						<a class="f20" href="mailto:{!! $hourse_user->email !!}" style="color: black;">邮箱:{!! $hourse_user->email !!}</a>
					</div>
					
				</div>
		</div>

		<!--加入很多人-->
		<div class="container joinMany" style="display: none;">
			<div class="row pt15" >
				<div class="pl30 pr30 h120" style="border-bottom: 1px solid #ccc;">
					<div class="col-sm-2">
						<img src="{!! $hourse->image !!}" class="img_auto" />
					</div>
					<div class="col-sm-6">
						<h4>{!! $hourse->name !!}+{!! $hourse->type !!}</h4>
						<p>感谢您的支持!您将获得【{!! $hourse->name !!}】权益</p>
					</div>

					<div class="col-sm-3">
						{!! $hourse->address !!}
					</div>
				</div>
			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-1">
					档位
				</div>
				@if(count($hourse->all_gears))
					<?php $g=0;?>
					@foreach($hourse->all_gears as $item)
						<a class="col-sm-2 gol_many_gears @if($g==0) active @endif" data-gear="{!! $item !!}">￥{!! $item !!}</a>
						<?php $g++;?>
					@endforeach
				@endif
			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-1">
					数量
				</div>
				<div class="form-inline col-sm-6 p_relative">
					<span class="gol_many_action" onclick="golAction(this,'del')">-</span><input class="form-control golNum" style="max-width: 120px;text-align: center"  value="1" /><span class="gol_many_action" onclick="golAction(this,'add')">+</span>
				</div>
			</div>

			<div class="row mt30">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<a class="gol_many_zhichi">去支持</a>
				</div>
				<div class="col-sm-4">
				</div>
			</div>

		</div>

		@endif
	</div>


@endsection

@if(!$error)
@section('js')
	<script>
	var request_data_zhichi = {price:'{!! $hourse->min_gears !!}',gear:'{!! $hourse->min_gears !!}',gear_num:1,house_id:'{!! $hourse->id !!}'};
	var gear = '{!! $hourse->min_gears !!}';
	var gear_num = 1;

	//购买描述
	function houseBody(gears=null,gear_nums=1){
		if($.empty(gears)){
			gears = '{!! tag('$hourse->min_gears') !!}';
		}
		return '购买小屋'+'{!! tag($hourse->name) !!}'+'{!! tag($hourse->type) !!}'+'档位'+gears+'数量'+gear_nums+',合计'+request_data_zhichi['price'];
	}

	/**
      * [检查登录状态]
      * @param  {[type]} obj [description]
      * @return {[type]}     [description]
      */
     function varifyAuthLogin(obj)
     {
     	   if($.empty($(obj).data('id'))){
		       	$.alert('请先登录后使用','error');
		       	return true;
	       }
	       else{
	       	return false;
	       }
     }

	//发送私信
	$('.gol_sixin').click(function(){
		       var userid=$(this).data('id');
		       var username = $(this).data('name');
		       if(varifyAuthLogin(this)){
		       		return ;
		       }
		        layer.open({
		        type: 1,
		        closeBtn: false,
		        shift: 7,
		        shadeClose: true,
		        shade: 0.8,
		        area: ['30%', '280px'],
		        title:'发送私信给'+username,
		        content: "<div style='padding: 0 15px;'><div class='content' style='min-width: 100%;min-height: 200px;'><div class='ui message hide'></div><div class='field'><textarea class='form-control message-textarea' rows='6' maxlength='255' onkeyup='messageInput(this)' placeholder='请在这里输入内容'></textarea></div></div><div class='actions pull-right' style='    margin-bottom: 15px;'><div onclick='cancleMessage()' style='    display: inline-block;'>取消</div><button disabled='true'  class='message' onclick='sendMessage("+userid+")'>发送</button></div></div>"
		         });
	});

     //取消
     function cancleMessage(){
      console.log('取消');
      layer.closeAll();
     }

     //咨询
     $('.gol_zixun').click(function(){
 	    if(varifyAuthLogin(this)){
		    return;
        }
     	$.zcjyFrameOpen($('.gol_zixun_dom').html(),'立即咨询',['60%', '280px']);
     });

     //输入框监听事件
     function messageInput(obj){
      var value = $(obj).val();
      if(value.length > 0){
        $('.message').addClass('message-active');
        $('.message').removeAttr('disabled');
      }
      else{
        $('.message').removeClass('message-active');
        $('.message').attr('disabled','true');
      }
     }

     //发送消息给用户
     function sendMessage(userid){
          $.zcjyRequest('/ajax/send_sixin/'+userid,function(res){
              if(res){
                  layer.closeAll();
                  $.alert(res);
              }
          },{content:$('.message-textarea').val()},'POST');
     }

     //点击关注
     $('.gol_attention').click(function(){
	       if(varifyAuthLogin(this)){
	       		return ;
	       }
	       var that = this;
     	   $.zcjyRequest('/ajax/attention_house/'+$(this).data('houseid'),function(res){
     	   	  $.alert(res);
              if(res == '关注小屋成功'){
                $(that).text('已关注');
              }
              else{
              	$(that).text('关注');
              }
          },{},'POST');
     });

     //加入很多人
     $('.gol_join_many').click(function(){
	    if(varifyAuthLogin(this)){
	       		return ;
        }
        if($(this).data('status') == '已过期' || $(this).data('status') == '已完成'){
        	$.alert('该小屋'+$(this).data('status'),'error');
        	return;
        }
     	$.zcjyFrameOpen($('.joinMany').html(),'请选择档位',['60%', '480px']);
     });

     //档位选择
     $(document).on('click','.gol_many_gears',function(){
     	$('.gol_many_gears').removeClass('active');
     	$(this).addClass('active');
     	gear = $(this).data('gear');
     });

     //数量 增加/减少
     function golAction(obj,action)
     {
     	var num = $(obj).parent().find('input').val();
     	//增加
     	if(action == 'add'){
     		++num;
     	}
     	else{
     		if(num > 1){
     			--num;
     		}
     	}
     	$(obj).parent().find('input').val(num);
     	gear_num = num;
     }

     //绑定keyup
     $(document).on('keyup','.golNum',function(){
     	if($(this).val() == 0 || $.empty($(this).val())){
     		$(this).val(1);
     	}
     	gear_num = $(this).val();
     });

     //去支持
      $(document).on('click','.gol_many_zhichi',function(){
     	request_data_zhichi['gear'] = gear;
     	request_data_zhichi['gear_num'] = gear_num;
     	request_data_zhichi['price'] = parseFloat(gear)*parseInt(gear_num);
     	request_data_zhichi['body'] = houseBody(gear,gear_num);
     	$.zcjyRequest('/ajax/save_house_join',function(res){
     		if(res){
     			location.href='/manySettle';
     		}
     	},request_data_zhichi,'POST');
     });


	</script>

	<script type="text/javascript">
		var request_data={user_id:'{!! isset($user->id) ? $user->id : '' !!}',house_id:'{!! $id !!}',type:'全部'};
		var pub_num=0;
		var request_zan_data = {};
		function publish(data,callback=null,reply='',message=''){
			if(!$.empty(reply)){
				data['reply_user_id'] = reply;
			}
			if(!$.empty(message)){
				data['message_id'] = message;
			}
			$.zcjyRequest('/ajax/publish_house_comment',function(res){	
				if(res){
					if(typeof callback === 'function'){
						callback(res);
					}
				}
			},data,'POST');
		}
	    $(function(){
	        var show_num = [];
	        draw(show_num);

	        $("#canvas").on('click',function(){
	            draw(show_num);
	        });

	        setTimeout(function(){
	        	$('#canvas').width('100').height('34').click();
	        },1500);
	        
	        var user_image=$('.user-head img')[0].src;
	        var user_name='';
	        var now='';
	        var content='';
	        //发布话题
	        $(".fabu").on('click',function(){
	        	if($.empty($('.my-content').val())){
	        		$.alert('请输入评论内容','error');
	        		return;
	        	}else if($(".input-code").length==0){
	        		console.log(1);
	        		request_data['content'] = $('.my-content').val();
		        	var that=this;
		        	publish(request_data,function(res){
		        		$.alert('发布成功！');
		        		$(that).next().remove();
		                $(".my-content").val('');
		        	});
	        	}else{
	        		var val = $(".input-code").val().toLowerCase();
		            var num = show_num.join("");
		            if(val==''){
		                $.alert('请输入验证码！','error');
		            }else if(val == num){
			        	request_data['content'] = $('.my-content').val();
			        	var that=this;
			        	publish(request_data,function(res){
			        		location.href='?page=1';
			        	});
		            }else{
		                $.alert('验证码错误！请重新输入！','error');
		                $(".input-val").val('');
		                draw(show_num);
		            }
	        	}
	        })
	        //回复留言
	        $(document).on('click','.toReply',function(){
	        	var that = this;
	        	$('.reply-box').remove();
	    		if($(this).parent().siblings('.reply-box').length==0){
	    			$(this).parent().after('<div class="reply-box"><textarea class="form-control" rows="4"></textarea><div class="more"><a href="javacript:void(0);" class="shut">关闭</a><a href="javacript:void(0);" class="immediately-reply" data-reply="'+$(that).data('reply')+'" data-id="'+$(that).data('id')+'">立即回复</a></div></div>')
	    		}
	    	})
	    	$(document).on('click','.shut',function(){
	    		$(this).parent().parent().remove();
	    	})
	       	$(document).on('click','.immediately-reply',function(){
	       		request_data['content']=$(this).parent().prev().val();
	       		console.log(request_data);
	       		console.log($(this).data('reply'));
	       		publish(request_data,function(res){
	       			location.href='?page=1';
	       		},$(this).data('reply'),$(this).data('id'));
	       	});

		});
	    function draw(show_num) {
	        var canvas_width=$('#canvas').width();
	        var canvas_height=$('#canvas').height();
	        var canvas = document.getElementById("canvas");//获取到canvas的对象，演员
	        var context = canvas.getContext("2d");//获取到canvas画图的环境，演员表演的舞台
	        canvas.width = canvas_width;
	        canvas.height = canvas_height;
	        var sCode = "A,B,C,E,F,G,H,J,K,L,M,N,P,Q,R,S,T,W,X,Y,Z,1,2,3,4,5,6,7,8,9,0";
	        var aCode = sCode.split(",");
	        var aLength = aCode.length;//获取到数组的长度
	        
	        for (var i = 0; i <= 3; i++) {
	            var j = Math.floor(Math.random() * aLength);//获取到随机的索引值
	            var deg = Math.random() * 30 * Math.PI / 180;//产生0~30之间的随机弧度
	            var txt = aCode[j];//得到随机的一个内容
	            show_num[i] = txt.toLowerCase();
	            var x = 10 + i * 20;//文字在canvas上的x坐标
	            var y = 20 + Math.random() * 8;//文字在canvas上的y坐标
	            context.font = "bold 23px 微软雅黑";

	            context.translate(x, y);
	            context.rotate(deg);

	            context.fillStyle = randomColor();
	            context.fillText(txt, 0, 0);

	            context.rotate(-deg);
	            context.translate(-x, -y);
	        }
	        for (var i = 0; i <= 5; i++) { //验证码上显示线条
	            context.strokeStyle = randomColor();
	            context.beginPath();
	            context.moveTo(Math.random() * canvas_width, Math.random() * canvas_height);
	            context.lineTo(Math.random() * canvas_width, Math.random() * canvas_height);
	            context.stroke();
	        }
	        for (var i = 0; i <= 30; i++) { //验证码上显示小点
	            context.strokeStyle = randomColor();
	            context.beginPath();
	            var x = Math.random() * canvas_width;
	            var y = Math.random() * canvas_height;
	            context.moveTo(x, y);
	            context.lineTo(x + 1, y + 1);
	            context.stroke();
	        }
	    }
	    function randomColor() {//得到随机的颜色值
	        var r = Math.floor(Math.random() * 256);
	        var g = Math.floor(Math.random() * 256);
	        var b = Math.floor(Math.random() * 256);
	        return "rgb(" + r + "," + g + "," + b + ")";
	    }
    	$(document).on('click','.reply-num',function(){
			$(this).hide();
			$(this).next().fadeToggle();
		});
		$(document).on('click','.shou',function(){
			$(this).parent().hide();
			$(this).parent().prev().show();
		});
	</script>
	<script type="text/javascript">
		$('.download-now').click(function(){
			  var url = $(this).data('url');
              var save_link = document.createElementNS("http://www.w3.org/1999/xhtml", "a");
             //地址
              save_link.href = url;
              save_link.download = name;
              var ev = document.createEvent("MouseEvents");
              ev.initMouseEvent(
                  "click", true, false, window, 0, 0, 0, 0, 0
                  , false, false, false, false, 0, null
             );
             save_link.dispatchEvent(ev);
   		});
	</script>

@endsection
@endif
