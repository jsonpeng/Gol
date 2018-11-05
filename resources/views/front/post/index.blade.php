@extends('front.partial.base')

@section('css')
	<style type="text/css">
		.reply-box{
			margin-top: 30px;
		}
		.reply-box .more{
	        padding-top:30px;
	        text-align:right;
	    }
        .reply-box .more a{
          color:#fff;
          background-color: #008837;
          padding:8px 34px;
          border-radius: 15px;
          border: 1px solid #008837;
        }
        .reply-box .more a:first-child{
        	background-color: transparent;
        	color:#008837;
        	margin-right: 20px;
        }
	</style>
@endsection



@section('content')
	<div class="container main-box mt30">
		<div class="main ">
			<div class="content">
				<div class="detail-title text-center reveal1">
					<h4>{!! $post->name !!}</h4>
					<p class="mt15 mb25">
				{{-- 		<span>发布者 : Gol</span> --}}
						<span class="news-date">{!! time_parse($post->created_at)->format('Y/m/d') !!}</span>
					</p>
				</div>
				<div class="detail-content">
					<p>{!! $post->content !!}</p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection

