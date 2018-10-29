@extends('front.partial.base')

@section('css')
	<style type="text/css">
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

@include('front.cat.seo')

@section('content')
	<div class="container main-box">
		<div class="main ">
			<div class="content">
				@if(count($posts))
					<ul class="info-list">
						@foreach ($posts as $post)
							<li>
			                	<a href="/post/{!! $post->id !!}">
				                  	<div class="col-sm-9 info-name">	
				                  		{!! $post->name !!}
				                  	</div>
				                  	<div class="col-sm-3 info-date">{!! time_parse($post->created_at)->format('Y-m-d') !!}</div>
				                  	<div class="clearfix"></div>
				                </a>
			              	</li>
		        		@endforeach
					</ul>
				@endif
				<div style="text-align:center;">{!! $posts->appends('')->links() !!}</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection