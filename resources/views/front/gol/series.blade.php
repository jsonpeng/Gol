@extends('front.partial.base')

@section('css')
<style type="text/css">

</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')


<div class="container reveal1">
	<div class="mt30">
		<div class="pull-left" style="font-size: 24px;font-weight: 600;">北京</div>
		<div class="pull-right">
			<select name="country" class="form-control ">
					<option >北京</option>
					<option >上海</option>
					<option >云南</option>
			</select>
		</div>
	</div>
</div>

<div class="container">
	<div class="pt30 pb50">
		<div class="row">

			@if(count($gols))
				@foreach($gols as $gol)
					<!-- 单个结构 -->
					<a class="col-sm-3 gol_many_post_item reveal2" href="/golDetail/{!! $gol->id !!}">
						<img src="/images/gol/many_post.jpg" class="img_auto" />
						<h4>{!! $gol->name !!}</h4>
						<p>{!! $gol->brief !!}</p>
					
						<div class="row">
							<div class="col-sm-6">
								<p class="pull-left">{!! $gol->address !!}</p>
								
		 					</div>
							<div class="col-sm-6">
								<p class="pull-right">租金&nbsp;￥{!! $gol->price !!}</p>
								
							</div>
							
						</div>
					</a>
				@endforeach

			@else
				<h1 class="text-center">这里空空如也</h1>
			@endif
			

		</div>
	</div>
 </div>

@endsection


@section('js')
	<script>

	</script>
@endsection
