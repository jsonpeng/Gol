@extends('front.partial.base')

@section('css')
<style type="text/css">
.img_auto{
	min-height: 262px;
}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')


<div class="container reveal1">
	@if(count($gol_cities))
		<div class="mt30">
			<div class="pull-left" style="font-size: 24px;font-weight: 600;">@if(array_key_exists('city', $input) && !empty($input['city']))  {!! getCitiesNameById($input['city']) !!} @else 全部 @endif</div>
			<div class="pull-right">
				<select name="city" class="form-control">
						<option value="" @if(!array_key_exists('city', $input) || array_key_exists('city', $input) && empty($input['city']) ) selected="selected" @endif>全部</option>
						@foreach($gol_cities as $city)
								<option value="{!! $city->city !!}" @if(array_key_exists('city', $input) && $input['city'] == $city->city ) selected="selected" @endif>{!! optional($city->cityobj)->name !!}</option>
						@endforeach
				</select>
			</div>
		</div>
	@endif
</div>

<div class="container">
	<div class="pt30 pb50">
		<div class="row">

			@if(count($gols))
				@foreach($gols as $gol)
					<!-- 单个结构 -->
					<a class="col-sm-3 gol_many_post_item reveal2" href="/golDetail/{!! $gol->id !!}">
						<img onerror="javascript:this.src='/images/gol/many_post.jpg';" src="{!! $gol->image !!}" class="img_auto" />
						<h4>{!! $gol->name !!}</h4>
						<p>{!! $gol->brief !!}</p>
					
						<div class="row">
							<div class="col-sm-6">
								<p class="pull-left">{!! $gol->address !!}</p>
								
		 					</div>
							<div class="col-sm-6">
								<p class="pull-right">{!! $gol->hourse_type !!}&nbsp;<span class="fw700">￥{!! $gol->price !!}</span></p>
								
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
		$('select[name=city]').change(function(){
			location.href="?city="+$(this).val();
		});
	</script>
@endsection
