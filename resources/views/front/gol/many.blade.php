@extends('front.partial.base')

@section('css')
<style type="text/css">

.gol_many_des{
	padding: 45px;
	position: relative;
	width: 24%;
    display: inline-block;
}
.gol_many_des > p{
	font-size: 34px;
	font-weight: 600;
}
.gol_many_des > p > span{
	display: inline-block;
	font-size: 26px;
	font-weight: 300;
	color: black;
}

.gol_many_xiexian{
	position: absolute;
    right: 0;
    top: 85px;
    width: 102px;
    height: 20px;
    border-bottom: 2px solid #ddd;
    -webkit-transform: rotate(108deg);
    -moz-transform: rotate(45deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=0.45);
}

.bb_none{
	border-bottom: none;
}

</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

<!-- 数据显示 -->
<div class="text-center">
	<div class="gol_many_des"><p>1000<span>万</span></p><p style="color: red;">￥<span>累计支持金额</span></p><div class="gol_many_xiexian"> </div></div>
	<div class="gol_many_des"><p>200<span>万</span></p><p style="color: red;">￥<span>单项最高支持金额</span></p><div class="gol_many_xiexian"> </div></div>
	<div class="gol_many_des"><p>30<span>万</span></p><p style="color: red;">￥<span>累计支持人数</span></p><div class="gol_many_xiexian"> </div></div>
	<div class="gol_many_des"><p>0.4<span>万</span></p><p style="color: red;">￥<span>单项最高支持人数</span></p></div>
</div>



<div class="container ">
	@if(array_key_exists('word',$input) && !empty($input['word']))
	<!-- 搜索小屋 -->

	@else

	@if(count($hourses_now_join))
		<!-- 正在参与 -->
		<div class="text-center f24">———&nbsp;&nbsp;正在参与&nbsp;&nbsp;———</div>

		<div class="pt30 pb50">
			<div class="row">
				@foreach ($hourses_now_join as $item)
					<?php $item=optional($item);?>
					<!-- 单个结构 -->
					<a class="col-sm-3 gol_many_post_item" href="/manyDetail/{!! $item->id !!}">
						<img src="/images/gol/many_post.jpg" class="img_auto" />
						<h4>{!! $item->name !!}</h4>
						<h5>{!! $item->type !!}+{!! $item->address !!}</h5>
						<p>{!! des($item->content,30)!!}</p>
						<div class="progress">
							<div class="progress-bar backgroud_red" role="progressbar"  style="width: {!! $item->progress !!}%;">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->gear !!}</p>
								<p class="text-center">档位</p>
		 					</div>
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->target !!}万</p>
								<p class="text-center">目标</p>
							</div>
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->all_price !!}</p>
								<p class="text-center">已筹</p>
							</div>
						</div>
					</a>
				@endforeach

			</div>
		</div>

	@endif

	@if(count($hourses_near_end))
		<!-- 即将结束 -->
		<div class="text-center f24">———&nbsp;&nbsp;即将结束&nbsp;&nbsp;———</div>

		<div class="pt30 pb50">
			<div class="row">
				@foreach ($hourses_near_end as $item)
					<?php $item=optional($item);?>
					<!-- 单个结构 -->
					<a class="col-sm-3 gol_many_post_item" href="/manyDetail/{!! $item->id !!}">
						<img src="/images/gol/many_post.jpg" class="img_auto" />
						<h4>{!! $item->name !!}</h4>
						<h5>{!! $item->type !!}+{!! $item->address !!}</h5>
						<p>{!! des($item->content,30)!!}</p>
						<div class="progress">
							<div class="progress-bar backgroud_red" role="progressbar"  style="width: {!! $item->progress !!}%;">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->gear !!}</p>
								<p class="text-center">档位</p>
		 					</div>
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->target !!}万</p>
								<p class="text-center">目标</p>
							</div>
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->all_price !!}</p>
								<p class="text-center">已筹</p>
							</div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	@endif

	@if(count($hourses_for_sale))
		<!-- 即将上架 -->
		<div class="text-center f24">———&nbsp;&nbsp;即将上架&nbsp;&nbsp;———</div>
		
		<div class="pt30 pb50">
			<div class="row">
				@foreach ($hourses_for_sale as $item)
					<?php $item=optional($item);?>
					<!-- 单个结构 -->
					<a class="col-sm-3 gol_many_post_item" href="/manyDetail/{!! $item->id !!}">
						<img src="/images/gol/many_post.jpg" class="img_auto" />
						<h4>{!! $item->name !!}</h4>
						<h5>{!! $item->type !!}+{!! $item->address !!}</h5>
						<p>{!! des($item->content,30)!!}</p>
						<div class="progress">
							<div class="progress-bar backgroud_red" role="progressbar"  style="width: {!! $item->progress !!}%;">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->gear !!}</p>
								<p class="text-center">档位</p>
		 					</div>
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->target !!}万</p>
								<p class="text-center">目标</p>
							</div>
							<div class="col-sm-4">
								<p class="text-center">￥{!! $item->all_price !!}</p>
								<p class="text-center">已筹</p>
							</div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	@endif
	

	@endif

 </div>

@endsection


@section('js')
	<script>

	</script>
@endsection
