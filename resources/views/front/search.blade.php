@extends('front.partial.base')

@section('css')
	<style>
		.nav-path{

		}
	</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main ">
			
			<div class="nav-path">
				关键词搜索结果: 当前<span style="color:#ff0000;">{!! $count !!}</span>个结果
			</div>

			@if(count($messages))
				<div class="content">
					<ul class="info-list">
						@foreach ($messages as $item)
							<li>
			                	<a href="/post/{!! $item->id !!}">
				                  	<div class="col-sm-9 info-name">	
				                  		{!! $item->name !!}
				                  	</div>
				                  	<div class="col-sm-3 info-date">{!! time_parse($item->created_at)->format('Y/m/d') !!}</div>
				                  	<div class="clearfix"></div>
				                </a>
			              	</li>
	           			@endforeach
					</ul>
					<div style="text-align: center;">
						{!! $messages->appends($input)->links() !!}
					</div>
				{{-- 	<div class="num-list">
						<ul>
							<li class="active"><a href="javascript:;">1</a></li>
							<li><a href="javascript:;">2</a></li>
							<li><a href="javascript:;">3</a></li>
							<li><a href="javascript:;">4</a></li>
							<li><a href="javascript:;">>></a></li>
						</ul>
					</div> --}}
				</div>
			@endif

		</div>
		@include('front.partial.share')
		<div class="clearfix"></div>

	</div>
@endsection
	

@section('js')

@endsection
