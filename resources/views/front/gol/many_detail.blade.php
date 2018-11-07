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
	/*档位选择按钮*/
	.gol_many_gears{
		font-size: 14px;
		border:1px solid #ccc;
		padding:10px 20px 10px 20px;
		color: red;
		text-align: center;
	    margin-right: 20px;
	}
	.gol_many_gears.active{
		border:1px solid #FF5511;
		background: #FF5511;
		color:white;
	}
	.gol_many_action{
			position: absolute;
		    border: 1px solid #ccc;
		    padding: 2px 10px;
		    /* margin-top: 0px; */
		    display: inline-block;
		    font-weight: 900;
		    font-size: 20px;
	}
	/*去支持*/
	.gol_many_zhichi{
			padding: 15px 30px 15px 30px;
		    color: rgb(255, 255, 255);
		    background-color: rgb(14, 191, 175);
		    border-color: rgb(255, 255, 255);
		    border-radius: 6px;
		    font-size: 16px;
		    border-width: 1px;
		    border-style: solid;
		    text-align: center;
		    font-weight: normal;
		    font-style: normal;
		    opacity: 1;
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
						<a class="col-sm-3 gol_m_detail_button gol_join_many" data-id="{!! !empty($user) ? $user->id : '' !!}">加入小屋家</a>
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
							{{-- <a href="{!! $hourse->plan_address !!}" target="_blank" >小屋计划书附件下载查看</a> --}}
							<iframe src="https://view.officeapps.live.com/op/view.aspx?src={!! $hourse->plan_address !!}" style="width: 100%;min-height: 1000px;"></iframe>
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
					{{-- 	<a class="col-sm-3 gol_m_detail_button gol_sixin" data-id="{!! !empty($user) ? $user->id : '' !!}" data-name="{!! !empty($user) ? $user->name : '' !!}">私信</a> --}}
						<a class="col-sm-3 gol_m_detail_button">咨询</a>
						<a class="col-sm-2"></a>
					</div>

				</div>
			</div>
		</div>

		<!--加入很多人-->
		<div class="container joinMany" style="display: none;">
			<div class="row pt15" >
				<div class="pl30 pr30 h120" style="border-bottom: 1px solid #ccc;">
					<div class="col-sm-2">
						<img src="{!! $hourse->image !!}" class="img_auto" />
					</div>
					<div class="col-sm-6">
						<h4>{!! $hourse->name !!}+{!! $hourse->type !!}</h4>
						<p>感谢您的支持!您将获得【{!! $hourse->name !!}】权益</p>
					</div>

					<div class="col-sm-3">
						{!! $hourse->address !!}
					</div>
				</div>
			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-1">
					档位
				</div>
				@if(count($hourse->all_gears))
					<?php $g=0;?>
					@foreach($hourse->all_gears as $item)
						<a class="col-sm-2 gol_many_gears @if($g==0) active @endif" data-gear="{!! $item !!}">￥{!! $item !!}</a>
						<?php $g++;?>
					@endforeach
				@endif
			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-1">
					数量
				</div>
				<div class="form-inline col-sm-6 p_relative">
					<span class="gol_many_action" onclick="golAction(this,'del')">-</span><input class="form-control golNum" style="max-width: 120px;text-align: center"  value="1" /><span class="gol_many_action" onclick="golAction(this,'add')">+</span>
				</div>
			</div>

			<div class="row mt30">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<a class="gol_many_zhichi">去支持</a>
				</div>
				<div class="col-sm-4">
				</div>
			</div>

		</div>

		@endif
	</div>


@endsection

@if(!$error)
@section('js')
	<script>
	var request_data = {price:'{!! $hourse->min_gears !!}',gear:'{!! $hourse->min_gears !!}',gear_num:1,house_id:'{!! $hourse->id !!}'};
	var gear = '{!! $hourse->min_gears !!}';
	var gear_num = 1;

	//购买描述
	function houseBody(gears=null,gear_nums=1){
		if($.empty(gears)){
			gears = '{!! tag('$hourse->min_gears') !!}';
		}
		return '购买小屋'+'{!! tag($hourse->name) !!}'+'{!! tag($hourse->type) !!}'+'档位'+gears+'数量'+gear_nums+',合计'+request_data['price'];
	}

	/**
      * [检查登录状态]
      * @param  {[type]} obj [description]
      * @return {[type]}     [description]
      */
     function varifyAuthLogin(obj)
     {
     	   if($.empty($(obj).data('id'))){
		       	$.alert('请先登录后使用','error');
		       	return true;
	       }
	       else{
	       	return false;
	       }
     }

	//发送私信
	$('.gol_sixin').click(function(){
		       var userid=$(this).data('id');
		       var username = $(this).data('name');
		       if(varifyAuthLogin(this)){
		       		return ;
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
                  $.alert(res);
              }
          },{content:$('.message-textarea').val()},'POST');
     }

     //点击关注
     $('.gol_attention').click(function(){
	       if(varifyAuthLogin(this)){
	       		return ;
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

     //加入很多人
     $('.gol_join_many').click(function(){
	    if(varifyAuthLogin(this)){
	       		return ;
        }
     	$.zcjyFrameOpen($('.joinMany').html(),'请选择档位',['60%', '480px']);
     });

     //档位选择
     $(document).on('click','.gol_many_gears',function(){
     	$('.gol_many_gears').removeClass('active');
     	$(this).addClass('active');
     	gear = $(this).data('gear');
     });

     //数量 增加/减少
     function golAction(obj,action)
     {
     	var num = $(obj).parent().find('input').val();
     	//增加
     	if(action == 'add'){
     		++num;
     	}
     	else{
     		if(num > 1){
     			--num;
     		}
     	}
     	$(obj).parent().find('input').val(num);
     	gear_num = num;
     }

     //绑定keyup
     $(document).on('keyup','.golNum',function(){
     	if($(this).val() == 0 || $.empty($(this).val())){
     		$(this).val(1);
     	}
     	gear_num = $(this).val();
     });

     //去支持
      $(document).on('click','.gol_many_zhichi',function(){
     	request_data['gear'] = gear;
     	request_data['gear_num'] = gear_num;
     	request_data['price'] = parseFloat(gear)*parseInt(gear_num);
     	request_data['body'] = houseBody(gear,gear_num);
     	$.zcjyRequest('/ajax/save_house_join',function(res){
     		if(res){
     			location.href='/manySettle';
     		}
     	},request_data,'POST');
     });


	</script>
@endsection
@endif
