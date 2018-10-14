@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main">
			@include('front.partial.bread_nav')
			@if(count($posts))
				<div class="content">
					<div class="row lead-list">
						@foreach ($posts as $item)
								<div class="col-lg-3 col-sm-6 col-xs-12 lead-item">
									<div class="img-box">
										<img src="{{ $item->image }}" alt="" class="img-responsive">
									</div>
									<p class="lead-name  text-center">{!! $item->name !!}</p>
									{!! $item->content !!}
									
								</div>
						@endforeach
					</div>
				</div>
			@endif
		</div>
		@include('front.partial.share')
		<div class="clearfix"></div>
	</div>
@endsection