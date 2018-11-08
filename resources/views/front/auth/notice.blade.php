@extends('front.partial.base')

@section('css')
<style type="text/css">
  .notice .content .notice-list {
  padding: 10px 0;
}
.notice .content .notice-list li {
  border-bottom: 1px dotted #e5e5e5;
  padding: 20px 0;
  color: #4d4c4c;
  list-style: none;
}
.notice .content .notice-list li .info-name {
  font-size: 18px;
  padding-left: 24px;
}
.notice .content .notice-list li .info-name a {
  margin-left: 15px;
  font-size: 15px;
  color: #004796;
}
.notice .content .notice-list li .info-name span {
  color: #004796;
  margin-left: 10px;
}
.notice .content .notice-list li .info-name.notice-msg {
  background: url('/images/disc_red.png') no-repeat left center;
}
.notice .content .notice-list li .info-date {
  text-align: right;
}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|通知中心</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')

  <div class="container pt30 pb120">
     <div class="row">
        <!--左侧导航-->
        @include('front.auth.left_nav')

        <div class="col-sm-1">
        </div>
        <!--右侧导航-->
        <div class="col-sm-9">

          	<div class="notice">
          		<div class="common-title text-center">
          			<div class="text-ch pt30">通知消息</div>
          			<h3 class="text-en">MESSAGE</h3>
          			<div class="short-line"></div>
          		</div>

              <div class="content pb220">
                  @if(count($notices))
                  	<ul class="notice-list">
                      @foreach($notices as $notice)
                      <li @if(!$notice->read) class="gol_notice_unread" @endif data-id="{!! $notice->id !!}">
                        <div class="col-sm-9 info-name @if(!$notice->read) notice-msg @endif">	
                          {!! $notice->content !!} @if($notice->link) <a href="javascript:;">点击查看</a> @endif
                        </div>
                        <div class="col-sm-3 info-date">{!! $notice->created_at !!}</div>
                        <div class="clearfix"></div>
                      </li>
                      @endforeach
                  	</ul>
                    <div class="text-center">{!! $notices->appends('')->links() !!}</div>
                  </div>
                  @else
               
                  <div class="empty-box text-center">
                    <img src="{{asset('images/empty_msg.png')}}" alt="">
                    <p style="margin-top: 20px;">暂无通知</p>
                  </div>
                  
                  @endif
              </div>


            </div>
          </div>
        </div>
    </div>
@endsection


@section('js')
 @include('front.auth.usercenter_js')
<script type="text/javascript">
  $('.gol_notice_unread').click(function(){
    var that = this;
    var notice_num = parseInt($('.gol_notice_num').text());
    $.zcjyFrameOpen($(this).html(),'查看消息详情',['60%', '180px']);
    $.zcjyRequest('/ajax/set_notice_readed/'+$(this).data('id'),function(res){
      if(res){
        $(that).children('.notice-msg').removeClass('notice-msg');
        --notice_num;
        if(notice_num <= 0){
          $('.gol_notice_menu').text('消息通知');
        }
        else{
          $('.gol_notice_num').text(notice_num);
        }
      }
    });
  });
</script>
@endsection