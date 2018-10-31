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
	.detail_color{
		color:white;
		background: red;
	}
	.gol_series_title{
		padding: 15px 65px;
		color: black;
		background: #ddd;
		text-align: center;
		font-size: 24px;
	}
	.gol_series_give_discourse{
		border:1px dashed rgba(187,187,187,1);
		border-radius: 10px;
		text-align: center;
	}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

	<div class="container">

		@if(!empty($error))
			<h1 class="text-center mt30">{!! $error !!}</h1>
		@else
		<!-- 标题 -->
		<div class="row ml0 mb10">
			<div class="col-sm-4 gol_series_title">{!! $gol->name !!}+{!! $gol->type !!}</div>
		</div>

		<!--多张图-->
		<div class="row pt15">
			<div class="col-sm-7">
				<img src="{!! $gol->iamge !!}" onerror="javascript:this.src='/images/gol/xiaowu_main.png';" class="img_auto" />
			</div>
			<div class="col-sm-5">
				<p class="pb15">服务/设施</p>

				<div class="row"> 
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
							<div class="col-sm-3">
								<i class="fa fa-edit f16"></i>
							</div>
						</div>
				 	</div>
				</div>

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div>

				<p>租期/证件</p>
				<p>整租{!! $gol->zuqi !!}年可续约 | 无许可证/有许可证</p>
				<p>安全许可</p>

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div>

				<p>小屋描述</p>
				<p>建筑面积:290平方米</p>
				<p>房屋状态:闲置状态</p>
				<p>改造程度:中等/轻微</p> 

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div> 

			</div>
		</div>

		<!--留给小屋新主的话-->
		<div class="row  pb30" style="border-bottom: 1px solid #ddd;">
			<div class="pt30 col-sm-7">
				<div class="row">
					<div class="col-sm-3 f16">留给小屋新主的话</div>
					<div class="col-sm-6 f12 gol_series_give_discourse">想知道是不是TA寻找的有缘人,看看什么时间见面吧</div>
					<div class="col-sm-3 f16" style="color: red;">查看相关费用</div>
				</div>
			</div>
			<div class="col-sm-5">
				<a class="gol_m_detail_button detail_color">加入计划</a>
				<a class="gol_m_detail_button detail_color">立即预定</a>
			</div>
		</div>

		<!--地理周边-->

		<!--很多人喜欢-->
		@endif
		
	</div>

@endsection


@section('js')
	<script>

	</script>
@endsection
