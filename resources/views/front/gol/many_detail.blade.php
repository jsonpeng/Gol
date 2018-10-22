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
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

	<div class="container">
		<!--小屋新主上传的主图-->
		<div class="row pt30">
			<div class="col-sm-7">
				<img src="/images/gol/xiaowu_main.png"  class="img_auto" />
			</div>
			<div class="col-sm-5">
				<p class="pb15">小屋名称+类别</p>
				<p class="pb15">这是新主第二件小屋,第一间盈利中,经营经验颇丰,为了结识更多小伙伴,特此发出召集令。</p>
				<p class="f24 fw700">￥50000</p>

				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>

				<div >
					<span class="pull-left">当前进度:60%</span><span class="pull-right">5353名支持者</span> 
				</div>

				<div class="row pt30">
						<a class="col-sm-2"></a>
						<a class="col-sm-3 gol_m_detail_button">关注(535)</a>
						<a class="col-sm-3 gol_m_detail_button">加入很多人</a>
						<a class="col-sm-2"></a>
				</div>

			</div>
		</div>

		<!--小屋详情-->
		<div class="row pt30 pb50">
			<div class="col-sm-7">
				<div>
					<a href="" class="gol_top_text f16">小屋介绍</a>
					<a href="" class="gol_top_text f16">小屋计划</a>
					<a href="" class="gol_top_text f16">小屋话题</a>
				</div>
				<!--详情内容-->
				<img src="/images/gol/xiaowu_main.png"  class="img_auto pt15 pb15" />
				<p>相关介绍内容xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
				<img src="/images/gol/xiaowu_main.png"  class="img_auto pt15" />
			</div>
			<div class="col-sm-5">
				<div class="gol_m_detail_user_box">
					<p class="f24 " > 小屋新主 </p>
					<div style="border-bottom: 1px solid rgba(187,187,187,1);" class="pt15"></div>

					<div class="row pt30">
						<div class="col-sm-3">
							<img src="/images/gol/xiaowu_main.png" class="img_auto">
						</div>
						<div class="col-sm-9">
							<p>frank</p>
							<p>个人简介</p>
							<p>小屋&nbsp;&nbsp;5 &nbsp;&nbsp;&nbsp; 支持 5</p>
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
	</div>

@endsection


@section('js')
	<script>

	</script>
@endsection
