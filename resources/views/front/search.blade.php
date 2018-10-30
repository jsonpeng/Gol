@extends('front.partial.base')

@section('css')
	<style>
	.main-box {
	  padding-bottom: 30px;
	}
	.main {
	  width: 81.6%;
	  float: left;
	  padding-left: 40px;
	}
	.main .content .info-list {
	  padding: 10px 0;
	}
	.main .content .info-list li {
	  border-bottom: 1px dotted #e5e5e5;
	  list-style: none;
	}
	.main .content .info-list li a {
	  color: #4d4c4c;
	  display: block;
	  padding: 20px 0;
	}
	.main .content .info-list li a .info-name {
	  font-size: 18px;
	  padding-left: 24px;
	  background: url('/images/disc.png') no-repeat left center;
	  text-overflow: ellipsis;
	  white-space: nowrap;
	  overflow: hidden;
	}
	.main .content .info-list li a .info-date {
	  text-align: right;
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

		<div class="main ">
			
				<div class="text-center f24 reveal2 mt30">搜索关键字{!! tag($input['word']) !!},为你搜索到以下{!! tag($count) !!}条信息</div>

			
				<div class="content">
					<ul class="info-list">
						@foreach ($messages as $item)
							<li>
			                	<a href="/post/{!! $item->id !!}">
				                  	<div class="col-sm-9 info-name">	
				                  		{!! tag('[旅行故事]').$item->name !!}
				                  	</div>
				                  	<div class="col-sm-3 info-date">{!! time_parse($item->created_at)->format('Y/m/d') !!}</div>
				                  	<div class="clearfix"></div>
				                </a>
			              	</li>
	           			@endforeach

	           			@foreach ($houses as $item)
							<li>
			                	<a href="/manyDetail/{!! $item->id !!}">
				                  	<div class="col-sm-9 info-name">	
				                  		{!! tag('[小屋]').$item->name !!}
				                  	</div>
				                  	<div class="col-sm-3 info-date">{!! time_parse($item->created_at)->format('Y/m/d') !!}</div>
				                  	<div class="clearfix"></div>
				                </a>
			              	</li>
	           			@endforeach
					</ul>
				</div>
			

		</div>
	
		<div class="clearfix"></div>

	</div>
@endsection
	

@section('js')

@endsection
