@extends('front.partial.base')

@section('css')
<style type="text/css">
		/**
		 * [首页]
		 * @type {[type]}
		 */
		.gol_four_img{
			float: left;
			width: 500px;
			height:auto;
			max-height: 330px;
			text-align: center;
		}
		.gol_four_img > img{
			width:100%;
			height:auto;
		}
		.gol_post_img{
		    position: absolute;
		    right: 0;
		    top: 10px;
		}
		.gol_post_bg1{
			background-color: rgb(252, 252, 252);
		}
		.gol_post_bg2{
			background-color: rgb(240, 248, 255);
		}
		.gol_post_bg1 span,.gol_post_bg2 span{
			display: inline-block;
		}
		.gol_corver{
			transition: height 0.6s;
		    position: absolute;
		    bottom: 0;
		    width: 100%;
		    /*background: rgba(53, 47, 40, .7);*/
		}
		.gol_corver_text{
			position: absolute;
		    bottom: 0;
		    width: 100%;
		    background: rgba(53, 47, 40, .7);
		    color:white;
		    opacity: 0;
		}
		.gol_corver_text a{
			color: black;
		}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

@if(count($houses))
	<!-- 小屋家 -->
	<div class="pt30">
		<div class="container">
			<div class="text-center  f24">———&nbsp;&nbsp;小屋家&nbsp;&nbsp;———</div>
			<div class="gol_house_show mt30">
				<div id="carousel-example-generic-hourse" class="carousel-hourse slide banner-slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox" >
						<?php $num = 0;?>
						@foreach ($houses as $house)

						<?php $num++;$house=optional($house); ?>
							@if($num==1)
							<a class="item active " href="/manyDetail/{!! $house->id !!}" style="width:100%;height:356px;">
								<div style="float:left; width:50%;height:100%;">
									<img src="{{ $house->image }}"  alt="" style="width:100%;height:100%;">
								</div>
								<div style="float:right;width:50%;height:100%;">
									<img src="{{ $house->image1 }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="display:block;width:100%;height:50%;">
									<div style="height:50%;">
										<img src="{{ $house->image2 }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="display:block;width:50%;height:100%;float:left;">
										<img src="{{ $house->image3 }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="display:block;width:50%;height:100%;float:right;">
									</div>
								</div>
							</a>
							@else
							<a class="item" href="/manyDetail/{!! $house->id !!}" style="width:100%;height:356px;">
								<div style="float:left; width:50%;height:100%;">
									<img src="{{ $house->image }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="width:100%;height:100%;">
								</div>
								<div style="float:right;width:50%;height:100%;">
									<img src="{{ $house->image1 }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="display:block;width:100%;height:50%;">
									<div style="height:50%;">
										<img src="{{ $house->image2 }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="display:block;width:50%;height:100%;float:left;">
										<img src="{{ $house->image3 }}" onerror="javascript:this.src='{{ $house->image }}';" alt="" style="display:block;width:50%;height:100%;float:right;">
									</div>
								</div>
							</a>
							@endif
						@endforeach
				  	</div>
				</div>
			</div>
		</div>
	</div>
@endif


<!-- 小屋推荐 -->
<div class="pt30">
	<div class="container">
		<div class="text-center f24">———&nbsp;&nbsp;GOL+&nbsp;&nbsp;———</div>
		<div class="pt30">
			<a class="gol_four_img p_relative gol_xilie reveal1" href="/series/青旅">
				 <div class="gol_corver hidden-sm hidden-xs" style="height: 100%;"></div>
				 <div class="gol_corver_text">
				 	<p>GOL.青旅</p>
				 	<p>自由 青春 活力</p>
				 	<p>旅游爱好者的圣地</p>
				 	<span>READ MORE</span>
				 </div>
				<img src="/images/gol/青旅.jpeg" />
			</a>
			<a class="gol_four_img p_relative gol_xilie reveal1" href="/series/客栈">
				 <div class="gol_corver hidden-sm hidden-xs" style="height: 100%;"></div>
				 <div class="gol_corver_text">
				 	<p>GOL.客栈</p>
				 	<p>自由 青春 活力</p>
				 	<p>旅游爱好者的圣地</p>
				 	<span>READ MORE</span>
				 </div>
				<img src="/images/gol/客栈.jpeg" />
			</a>
			<a class="gol_four_img p_relative gol_xilie reveal1" href="/series/民宿">
				 <div class="gol_corver hidden-sm hidden-xs" style="height: 100%;"></div>
				 <div class="gol_corver_text">
				 	<p>GOL.民宿</p>
				 	<p>自由 青春 活力</p>
				 	<p>旅游爱好者的圣地</p>
				 	<span>READ MORE</span>
				 </div>
				<img src="/images/gol/民宿.jpeg" />
			</a>
			<a class="gol_four_img p_relative gol_xilie reveal1" href="/series/空间">
				 <div class="gol_corver hidden-sm hidden-xs" style="height: 100%;"></div>
				 <div class="gol_corver_text">
				 	<p>GOL.空间</p>
				 	<p>自由 青春 活力</p>
				 	<p>旅游爱好者的圣地</p>
				 	<span>READ MORE</span>
				 </div>
				<img src="/images/gol/空间.jpeg" />
			</a>
		</div>
	</div>
</div>



@if(count($travels))
<!-- 小屋故事  -->
<div class="pt30 container pb120">
	<div class="text-center f24">———&nbsp;&nbsp;爱旅行&nbsp;&nbsp;———</div>
	<div class="pt30 " style="margin-left: 6%;">
		<?php $i=0; ?>
		@foreach($travels as $post)
		<?php $i++;?>

			<a class="gol_four_img p_relative mb25 reveal2" href="/post/{!! $post->id !!}" style="color: black;@if($i==(count($travels)) && $i % 2 ==1 ) display: none; @endif">
				<div class="w50 @if($i%2==0) gol_post_bg2 @else gol_post_bg1 @endif" style="min-height: 255px;">
					<h4 class="pt30 fw700">{!! $post->name !!}</h4>
				<!-- 	<span>{!! $post->created_at->format('Y-m-d') !!}</span> -->
					<p class="mt15">{!! des($post->brief,35) !!}</p>
					<span class="pt15 pb50">READ MORE</span>
				</div>
				<div class="w50 gol_post_img">
					<img src="{!! $post->image !!}" onerror="javascript:this.src='/images/gol/post.jpeg';" class="img_auto"  />
				</div>
			</a>
		@endforeach
	</div>
</div>
@endif


<!-- 小屋新主成交记录 最新消息 公告 -->
@if(false)
 <div class="pt50 pb50 container reveal3">
	<div class="row">

		<div class="col-sm-6">
			<div class="row">

				<div class="col-sm-3">
					<h4 class="pt30">Gol消息</h4>
				</div>

				<div class="col-sm-9 txtMarquee-top bd">
					<div class="bd">
						<ul>
        	     			
		                    <li class="ii h60" style="list-style: none;">
		                    	坐落于新郑的*****完成交接&nbsp;&nbsp;&nbsp;&nbsp;2018年10月28日
		                    </li>
		                     <li class="ii h60" style="list-style: none;">
		                    	坐落于上海的*****完成交接&nbsp;&nbsp;&nbsp;&nbsp;2018年9月1日
		                    </li>  
		                    <li class="ii h60" style="list-style: none;">
		                    	坐落于北京的*****完成交接&nbsp;&nbsp;&nbsp;&nbsp;2018年10月10日
		                    </li>
		                    <li class="ii h60" style="list-style: none;">
		                    	坐落于武汉的*****完成交接&nbsp;&nbsp;&nbsp;&nbsp;2018年10月1日
		                    </li>
		                    <li class="ii h60" style="list-style: none;">
		                    	坐落于云南的*****完成交接&nbsp;&nbsp;&nbsp;&nbsp;2018年10月1日
		                    </li>
		                    <li class="ii h60" style="list-style: none;">
		                    	坐落于大理的*****完成交接&nbsp;&nbsp;&nbsp;&nbsp;2018年10月1日
		                    </li>
							
						</ul>
					</div>
				</div>

				<div class="col-sm-3">
					
				</div>

			</div>
		</div>

		<div class="col-sm-6">
			<div class="row pt30">

				@if(auth('web')->check())
					<?php $notice = app('notice')->lastNotice(auth('web')->user()->id);?>
					@if($notice)
						<div class="col-sm-6 gol_location_notice">
							<p>消息:</p>
							<p>{!! $notice->content !!}</p>
						</div>
					@endif
				@endif

			
				@if(count($notifies))
					<div class="col-sm-6 txtMarquee-top">
							<div class="bd">
							<ul>
	        	     			@foreach($notifies as $notify)
				                    <li class="ii h60" style="list-style: none;">
				                    	系统公告:{!! $notify->info !!}
				                    </li> 
			                   	@endforeach
							</ul>
						</div>
					</div>
				@endif


			</div>
		</div>

	</div>

</div>
@endif



@endsection


@section('js')
	<script type="text/javascript" src="{{  asset('js/jquery.SuperSlide.2.1.1.js') }}"></script>
	<script>
		$(function(){

			$('.gol_xilie').mouseover(function(){
				$(this).find('.gol_corver').css('height',0);
				$(this).find('.gol_corver_text').css('opacity',1);
			});
			
			$('.gol_xilie').mouseout(function(){
				$(this).find('.gol_corver').css('height','100%');
				$(this).find('.gol_corver_text').css('opacity',0);
			});

			//消息滚动
			jQuery(".txtMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",interTime:50,trigger:"click"});

			//通知消息跳转
			$('.gol_location_notice').click(function(){
				location.href="/user/center/notice";
			});

		
			
		});	
	</script>
@endsection
