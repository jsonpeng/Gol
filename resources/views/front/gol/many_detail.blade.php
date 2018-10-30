@extends('front.partial.base')

@section('css')
<style type="text/css">
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
	.nav>li>a {
    	padding: 15px;
	}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
		color: white;
		background: #FF5511;
		border: 1px solid #FF5511;
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
		<h1 class="text-center">{!! $error !!}</h1>
		@else
		<!--小屋新主上传的主图-->
		<div class="row pt30">
			<div class="col-sm-7">
				<img onerror="javascript:this.src='/images/gol/xiaowu_main.png';" src="{!! $hourse->image !!}"  class="img_auto" style="max-height: 300px;" />
			</div>
			<div class="col-sm-5">
				<p class="pb15">{!! $hourse->name !!}+{!! $hourse->type !!}</p>
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
						<a class="col-sm-3 gol_m_detail_button">关注({!! $hourse_attention_num !!})</a>
						<a class="col-sm-3 gol_m_detail_button">加入很多人</a>
						<a class="col-sm-2"></a>
				</div>

			</div>
		</div>

		<!--小屋详情-->
		<div class="row pt30 pb50">
			<div class="col-sm-7">
			{{-- 	<div>
					<a href="" class="gol_top_text f16">小屋介绍</a>
					<a href="" class="gol_top_text f16">小屋计划</a>
					<a href="" class="gol_top_text f16">小屋话题</a>
				</div> --}}
				<ul id="myTab" class="nav nav-tabs mb25">
					<li class="active">
						<a href="#home" data-toggle="tab">
							 小屋介绍
						</a>
					</li>
					<li><a href="#plan" data-toggle="tab">小屋计划</a></li>
					<li><a href="#topic" data-toggle="tab">小屋话题</a></li>
				</ul>

			<div id="myTabContent" class="tab-content">

					<div class="tab-pane fade in active" id="home">
							<!--详情内容-->
							{!! $hourse->content !!}
					</div>

					<div class="tab-pane fade" id="plan">
							<!--小屋计划-->
							<a href="{!! $hourse->plan_address !!}" target="_blank" >小屋计划书附件下载查看</a>
					</div>

					<div class="tab-pane fade" id="topic">
							<!--小屋话题-->
							小屋话题
					</div>

			
			</div>
			</div>

			<div class="col-sm-5">
				<div class="gol_m_detail_user_box">
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
						<a class="col-sm-3 gol_m_detail_button">私信</a>
						<a class="col-sm-3 gol_m_detail_button">咨询</a>
						<a class="col-sm-2"></a>
					</div>

				</div>
			</div>
		</div>
		@endif
	</div>

@endsection


@section('js')
	<script>

	</script>
@endsection
