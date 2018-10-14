@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main ">
			@include('front.partial.bread_nav')
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
		@include('front.partial.share')
		<div class="clearfix"></div>
	</div>
@endsection