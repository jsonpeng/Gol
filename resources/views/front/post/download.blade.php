@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

{{-- @include('front.page.seo') --}}

@section('content')
<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main ">
			@include('front.partial.bread_nav')
			<div class="content">
				<div class="detail-title text-center">
					<h5>{!! $post->name !!}</h5>
					<p>
						<span>发布者 : admin</span>
						<span class="news-date">{!! time_parse($post->created_at)->format('y/m/d') !!}</span>
					</p>
				</div>
				<div class="detail-content">
					{!! $post->content !!}
					<?php $attach = get_post_custom_value_by_key($post,'attach_file');?>
					@if($attach)
					<div class="more">
						<a href="javascript:;" class="download-now" data-url="{!! $attach !!}" >立即下载</a>
					</div>
					@endif
				</div>
			</div>
			@include('front.comment.tem')
		</div>
		@include('front.partial.share')
		<div class="clearfix"></div>
	</div>
@endsection

@include('front.comment.js')