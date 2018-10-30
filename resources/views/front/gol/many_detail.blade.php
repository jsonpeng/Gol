@extends('front.partial.base')

@section('css')
<style type="text/css">
	.message {
	      border: none;
	      display: inline-block;
	      background: #ddd;
	      margin-left: 15px;
	}

	button[disabled] {
	    color: #fff;
	  
	}

	.message-active {
	    background: #FF5511;
	    border: none;
	    display: inline-block;
	    margin-left: 15px;
	    color:#fff;
	}
	.gol_m_detail_button{
		display: inline-block;
		border: 1px solid rgba(187,187,187,1);
		padding: 10px 20px;
		color: black;
		margin-left: 30px;
		text-align: center;
		font-size: 14px;
		border-radius: 5px;
	}
	.gol_m_detail_user_box{
		padding-left:22px;
		padding-right:22px;
		padding-top:20px;
		padding-bottom: 35px;
		width: 360px;
		height: 270px;
		line-height: 20px;
		border: 1px solid rgba(187, 187, 187, 1);
	}

	#myTab>li>a {
    	padding: 15px;
	}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
		color: white;
		background: #FF5511;
		border: 1px solid #FF5511;
	}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

	<div class="container">
		@if($error)
		<h1 class="text-center mt30 pb220">{!! $error !!}</h1>
		@else
		<!--小屋新主上传的主图-->
		<div class="row pt30 reveal1">
			<div class="col-sm-7">
				<img onerror="javascript:this.src='/images/gol/xiaowu_main.png';" src="{!! $hourse->image !!}"  class="img_auto" style="max-height: 300px;" />
			</div>
			<div class="col-sm-5">
				<p class="pb15">{!! $hourse->name !!}+{!! $hourse->type !!}</p>
				<p class="pb15">{!! des($hourse->content,20) !!}</p>
				<p class="f24 fw700">￥{!! $hourse->target !!}万</p>

				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: {!! $hourse->progress !!}%;">
					</div>
				</div>

				<div >
					<span class="pull-left">当前进度:{!! $hourse->progress !!}%</span><span class="pull-right">{!! $hourse->support_people !!}名支持者</span> 
				</div>

				<div class="row pt30">
						<a class="col-sm-2"></a>
						<a class="col-sm-3 gol_m_detail_button gol_attention" data-id="{!! !empty($user) ? $user->id : '' !!}" data-houseid="{!! $id !!}">@if($attention_status)已@endif关注({!! $hourse_attention_num !!})</a>
						<a class="col-sm-3 gol_m_detail_button">加入很多人</a>
						<a class="col-sm-2"></a>
				</div>

			</div>
		</div>

		<!--小屋详情-->
		<div class="row pt30 pb50 ">
			<div class="col-sm-7 ">
			{{-- 	<div>
					<a href="" class="gol_top_text f16">小屋介绍</a>
					<a href="" class="gol_top_text f16">小屋计划</a>
					<a href="" class="gol_top_text f16">小屋话题</a>
				</div> --}}
				<ul id="myTab" class="nav nav-tabs mb25">
					<li class="active">
						<a href="#home" data-toggle="tab">
							 小屋介绍
						</a>
					</li>
					<li><a href="#plan" data-toggle="tab">小屋计划</a></li>
					<li><a href="#topic" data-toggle="tab">小屋话题</a></li>
				</ul>

			<div id="myTabContent" class="tab-content ">

					<div class="tab-pane fade in active " id="home">
							<!--详情内容-->
							{!! $hourse->content !!}
					</div>

					<div class="tab-pane fade" id="plan">
							<!--小屋计划-->
							<a href="{!! $hourse->plan_address !!}" target="_blank" >小屋计划书附件下载查看</a>
					</div>

					<div class="tab-pane fade" id="topic">
							<!--小屋话题-->
							小屋话题
					</div>

			
			</div>
			</div>

			<div class="col-sm-5 reveal2">
				<div class="gol_m_detail_user_box">
					<p class="f24 " > 小屋新主 </p>
					<div style="border-bottom: 1px solid rgba(187,187,187,1);" class="pt15"></div>

					<div class="row pt30">
						<div class="col-sm-3">
							<img onerror="javascript:this.src='/images/gol/xiaowu_main.png';" src="{!! $hourse_user->head_image !!}" class="img_auto">
						</div>
						<div class="col-sm-9">
							<p>{!! $hourse_user->name !!}</p>
							<p>{!! $hourse_user->brief !!}</p>
							<p>小屋&nbsp;&nbsp;{!! $hourse_user_has_num !!} &nbsp;&nbsp;&nbsp; 支持 {!! $hourse_user_support_num !!}</p>
						</div>
					</div>

					<div class="row pt15">
						<a class="col-sm-2"></a>
						<a class="col-sm-3 gol_m_detail_button gol_sixin" data-id="{!! !empty($user) ? $user->id : '' !!}" data-name="{!! !empty($user) ? $user->name : '' !!}">私信</a>
						<a class="col-sm-3 gol_m_detail_button">咨询</a>
						<a class="col-sm-2"></a>
					</div>

				</div>
			</div>
		</div>
		@endif
	</div>

@endsection


@section('js')
	<script>
		//发送私信
		$('.gol_sixin').click(function(){
			       var userid=$(this).data('id');
			       var username = $(this).data('name');
			       if($.empty(userid) || $.empty(username)){
				       	$.alert('请先登录后使用','error');
				       	return false;
			       }
			        layer.open({
			        type: 1,
			        closeBtn: false,
			        shift: 7,
			        shadeClose: true,
			        shade: 0.8,
			        area: ['30%', '280px'],
			        title:'发送私信给'+username,
			        content: "<div style='padding: 0 15px;'><div class='content' style='min-width: 100%;min-height: 200px;'><div class='ui message hide'></div><div class='field'><textarea class='form-control message-textarea' rows='6' maxlength='255' onkeyup='messageInput(this)' placeholder='请在这里输入内容'></textarea></div></div><div class='actions pull-right' style='    margin-bottom: 15px;'><div onclick='cancleMessage()' style='    display: inline-block;'>取消</div><button disabled='true'  class='message' onclick='sendMessage("+userid+")'>发送</button></div></div>"
			         });
		});

     //取消
     function cancleMessage(){
      console.log('取消');
      layer.closeAll();
     }

     //输入框监听事件
     function messageInput(obj){
      var value = $(obj).val();
      if(value.length > 0){
        $('.message').addClass('message-active');
        $('.message').removeAttr('disabled');
      }
      else{
        $('.message').removeClass('message-active');
        $('.message').attr('disabled','true');
      }
     }

     //发送消息给用户
     function sendMessage(userid){
          $.zcjyRequest('/ajax/send_sixin/'+userid,function(res){
              if(res){
                  layer.closeAll();
                  layer.msg(res, {
                    icon: 1,
                    skin: 'layer-ext-moon' 
                    });
              }
          },{content:$('.message-textarea').val()},'POST');
     }

     //点击关注
     $('.gol_attention').click(function(){
 		   var userid=$(this).data('id');
	       if($.empty(userid)){
		       	$.alert('请先登录后使用','error');
		       	return false;
	       }
	       var that = this;
     	   $.zcjyRequest('/ajax/attention_house/'+$(this).data('houseid'),function(res){
     	   	  $.alert(res);
              if(res == '关注小屋成功'){
                $(that).text('已关注');
              }
              else{
              	$(that).text('关注');
              }
          },{},'POST');
     });

	</script>
@endsection
