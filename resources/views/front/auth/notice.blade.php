@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|通知中心</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container notice">
		<div class="common-title text-center">
			<div class="text-ch pt30">通知消息</div>
			<h3 class="text-en">MESSAGE</h3>
			<div class="short-line"></div>
		</div>

    <div class="content pb220">
        @if(count($notices))
        	<ul class="notice-list">
            @foreach($notices as $notice)
            <li>
              <div class="col-sm-9 info-name @if(!$notice->read) notice-msg @endif">	
                {!! $notice->content !!} @if($notice->link) <a href="{!! $notice->link !!}">点击查看</a> @endif
              </div>
              <div class="col-sm-3 info-date">{!! $notice->created_at->format('Y-m-d') !!}</div>
              <div class="clearfix"></div>
            </li>
            @endforeach
        	</ul>
        </div>
        @else
     
        <div class="empty-box text-center">
          <img src="{{asset('images/empty_msg.png')}}" alt="">
          <p style="margin-top: 20px;">暂无通知</p>
        </div>
        
        @endif
    </div>

	</div>
@endsection