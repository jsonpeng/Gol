@extends('front.partial.base')

@section('css')
<style type="text/css">
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
	.detail_color{
		color:white;
		background: red;
	}
	.gol_series_title{
		padding: 15px 65px;
		color: white;
		background: #FF5511;
		text-align: center;
		font-size: 24px;
		border-radius: 10px;
	}
	.gol_series_give_discourse{
		border:1px dashed rgba(187,187,187,1);
		border-radius: 10px;
		text-align: center;
	}
	.active{
	    background: #FF5511 !important;
	    color: white !important;
    }
    .gol_goto_commit{
    	background: #939393;color: white;font-size: 16px;text-align: center;padding:15px 20px;
    	display: inline-block;
    	margin-top: 35px;
    }
    /*滚动轮播*/
	.picFocus{ margin:0 auto;  padding:5px;  position:relative;  overflow:hidden;  zoom:1;padding-top:12px;border:1px solid #FF5511;}
	.picFocus .hd{ width:100%;padding-top:5px;  overflow:hidden;position: relative;}
	.picFocus .hd ul{ margin-right:-5px;  overflow:hidden; zoom:1;}
	.picFocus .hd ul li{ padding-top:5px; float:left;  text-align:center; list-style: none; }
	.picFocus .hd ul li img{ width:109px; height:65px; border:2px solid #ddd; cursor:pointer; margin-right:5px;   }
	.picFocus .hd ul li.on{ /*background:url("images/icoUp.gif") no-repeat center 0; */}
	.picFocus .hd ul li.on img{ border-color:#f60;  }
	.picFocus .bd li{ vertical-align:middle; list-style: none;padding-left: 2.2%;}
	.picFocus .bd img{ width:467px; height:230px; display:block;  }
</style>
 <link rel="stylesheet" href="{{ asset('dist/css/swiper.min.css') }}">
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

	<div class="container">

		@if(!empty($error))
			<h1 class="text-center mt30">{!! $error !!}</h1>
		@else
		<!-- 标题 -->
		<div class="row ml0 mt30">
			<div class="col-sm-4 gol_series_title">{!! $gol->name !!}+{!! $gol->type !!}</div>
		</div>

		<!--多张图-->
		<div class="row pt15">
			<div class="col-sm-7">
				<!--首个图-->
				{{-- <img src="{!! $gol->image !!}" onerror="javascript:this.src='/images/gol/xiaowu_main.png';" class="img_auto" /> --}}
				<?php $images = get_content_img($gol->content); ?>
				<!--其他图-->
			<div class="picFocus">
				<div class="bd">
					<ul>
						<li><a target="_blank" href="javascript:;"><img src="{!! $gol->image !!}" class="img_auto" /></a></li>
						@if(count($images))
							@foreach($images as $image)
								<li><a target="_blank" href="javascript:;"><img src="{!! $image !!}" class="img_auto" /></a></li>
							@endforeach
						@endif
					</ul>
				</div>

				<div class="hd">
					<ul>
						<li><img src="{!! $gol->image !!}" class="img_auto" /></li>
						@if(count($images))
							@foreach($images as $image)
								<li><img src="{!! $image !!}" class="img_auto" /></li>
							@endforeach
						@endif
					</ul>
					{{-- <a class="prev" href="javascript:void(0)"></a>
					<a class="next" href="javascript:void(0)"></a> --}}
				</div>

			</div>

			</div>
			<div class="col-sm-5">
				<p class="pb15">服务/设施</p>

				@if(count($gol->ServicesArr))
					<div class="row"> 
						<div class="col-sm-12">
							<div class="row">
								@foreach($gol->ServicesArr as $item)
									<div class="col-sm-4 mb10">
										{{-- <i class="fa fa-edit f16"></i> --}}{!! $item !!}
									</div>
								@endforeach
							</div>
					 	</div>
					</div>
				@endif

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div>

				<p>租期/证件</p>
				<p>整租{!! $gol->zuqi !!}年可续约 | @if($gol->xukezheng) 有许可证  @else 无许可证 @endif</p>

				@if($gol->xukezheng)<div class="row"> <div class="col-sm-8"></div> <a class="gol_m_detail_button detail_color col-sm-3 gol-show-xuke" style="display: block;" data-url="{!! $gol->xukezheng !!}">查看</a></div>@endif

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div>

				<p>简介:{!! $gol->brief !!}</p>
				<p>建筑面积:{!! $gol->area !!}平方米</p>
				<p>房屋状态:{!! $gol->hourse_status !!}</p>
				<p>改造程度:{!! $gol->gaizao_status !!}</p> 

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div> 

			</div>
		</div>

		<!--留给小屋新主的话-->
		<div class="row  pb30" style="border-bottom: 1px solid #ddd;">
			<div class="pt30 col-sm-7">
				<div class="row">
					<div class="col-sm-3 f16">留给小屋新主的话</div>

					<div class="col-sm-6 f12 gol_series_give_discourse">
						@if(empty($gol->give_word))
					想知道是不是TA寻找的有缘人,看看什么时间见面吧 
					@else {!! $gol->give_word !!} @endif</div>

					<div class="col-sm-3 f16 gol-yuding" style="color: red;"  data-id="{!! !empty($user) ? $user->id : '' !!}">查看相关费用</div>
				</div>
			</div>
			<div class="col-sm-5 mt15">
				<a class="gol_m_detail_button detail_color gol_attention" data-id="{!! !empty($user) ? $user->id : '' !!}" data-golid='{!! $gol->id !!}'>@if($attention_status) 已 @endif 加入计划 ({!! $attention_num !!})</a>
				<a class="gol_m_detail_button detail_color gol-yuding"  data-id="{!! !empty($user) ? $user->id : '' !!}">立即预定</a>
			</div>
		</div>

		<div class="gol_yuding_dom" style="display: none;">
			<div class="container mt30">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8 text-center">
						<span class="f20">{!! $gol->hourse_type !!}</span>&nbsp;&nbsp;<span class="f20" style="color: red;">￥{!! $gol->price !!}</span> 
						@if($gol->hourse_type == '出租')
						<span class="f16">/{!! $gol->zuqi_type !!}</span>
						<p class="mt15">水费<span class="f20" style="color: red;">￥{!! $gol->water_price!!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
						   电费<span class="f20" style="color: red;">￥{!! $gol->electric_price!!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
						   煤费<span class="f20" style="color: red;">￥{!! $gol->mei_price!!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
						   燃气费<span class="f20" style="color: red;">￥{!! $gol->ranqi_price!!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
						   服务费<span class="f20" style="color: red;">￥{!! $gol->service_price!!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
						   其他费用<span class="f20" style="color: red;">￥{!! $gol->other_price!!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
						</p>
						@endif
						<a class="gol_goto_commit">去联系</a>
					</div>
				</div>
			</div>
		</div>

		<div class="gol_goto_dom" style="display: none;">
				<div class="row mt30 text-center">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<a class="f20" href="tel:{!! $gol_user->mobile !!}" style="color: black;">手机号:{!! $gol_user->mobile !!}</a>
					</div>
					<div class="col-sm-3">
						<a class="f20" href="mailto:{!! $gol_user->email !!}" style="color: black;">邮箱:{!! $gol_user->email !!}</a>
					</div>
					
				</div>
		</div>

		<div class="row mt30 gol_map_near ml25">
			<button class="btn btn-default active col-sm-2" data-data="公交">交通</button>
			<button class="btn btn-default  col-sm-2" data-data="购物">购物</button>
			<button class="btn btn-default  col-sm-2" data-data="餐饮">餐饮</button>
			<button class="btn btn-default  col-sm-2" data-data="景点">景点</button>
			<button class="btn btn-default  col-sm-2" data-data="娱乐">娱乐</button>
		</div>

		<!--地理周边-->
		<div class="container mt30 p_relative">
                    <div id="allmap" style="height: 600px;"></div>
       {{--    			<div class="map-around-list" style="position: absolute;right: 100px;top: 0;">
						  <ul class="gol-types">
						    <li data-index="0" class="active">交通</li>
						    <li data-index="1" class="">餐饮</li>
						    <li data-index="2" class="">景点</li>
						    <li data-index="3" class="">购物</li>
						    <li data-index="4" class="">娱乐</li>
						  </ul>
						  <div id="map-result-container" >
							   <div class="search-result" style="display: block;">
									  
									    <div class="place-list">
									   

									   </div>
						 		</div>
						 </div>
					</div> --}}
	    </div>
	
		<div class="container mt30">
			<p>房东描述详情:{!! $gol->content !!}</p>
		</div>

		<!--很多人喜欢-->
		<div class="container mt30 pt15" style="border-top:2px solid #bbbbbb;">
			<h4>很多人喜欢</h4>
			@if(count($manyman_likes))
			<div class="row swiper-container">
				<div class="swiper-wrapper">
					<?php $i=0;?>
					@foreach($manyman_likes as $item)
		
						<a class="col-sm-3 swiper-slide" style="display: inline-block;" target="_blank" href="/golDetail/{!! $item->id !!}">
							<img class="img_auto" src="{!! $item->image !!}"  onerror="javascript:this.src='/images/gol/many_post.jpg';" style="min-height: 230px;" />
						</a>
					
						<?php $i++;?>
					@endforeach

					    <!-- Add Pagination -->
					    <div class="swiper-pagination"></div>
					    <!-- 左右按钮 -->
					    <div class="swiper-button-prev"></div>
					    <div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
			@endif
		</div>
		@endif
		
	</div>

@endsection

@if(!$error)
@section('js')
<script type="text/javascript" src=" {{ asset('js/jquery.SuperSlide.2.1.3.js') }}"></script>
<script type="text/javascript">jQuery(".picFocus").slide({ mainCell:".bd ul",effect:"left",pnLoop:true});</script>
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=usHzWa4rzd22DLO58GmUHUGTwgFrKyW5&s=1"></script>
<script src="{{ asset('dist/js/swiper.min.js') }}"></script>
<!--根据地址索引地图标点-->
<script type="text/javascript">

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

     //查看许可证
     $('.gol-show-xuke').click(function(){
     	layer.open({
		  type: 1,
		  title: false,
		  closeBtn: 0,
		  area: '516px',
		  skin: 'layui-layer-nobg', //没有背景色
		  shadeClose: true,
		  content: '<img src="'+$(this).data('url')+'" class="text-center img_auto" />',
		});
     	//$.zcjyFrameOpen('<img src="'+$(this).data('url')+'" class="text-center img_auto" />','查看许可证',['50%', '500px']);
     });

     //立即预定
     $('.gol-yuding').click(function(){
     	 if(varifyAuthLogin(this)){
	       		return ;
	     }
     	$.zcjyFrameOpen($('.gol_yuding_dom').html(),'预定查看',['60%', '280px']);
     });

     //去联系
     $(document).on('click','.gol_goto_commit',function(){
     	$(this).parent().parent().parent().html($('.gol_goto_dom').html());
     });

	 //点击关注
     $('.gol_attention').click(function(){
	       if(varifyAuthLogin(this)){
	       		return ;
	       }
	       var that = this;
     	   $.zcjyRequest('/ajax/attention_gol/'+$(this).data('golid'),function(res){
     	   	  $.alert(res);
              if(res == '关注gol成功'){
                $(that).text('已加入计划');
              }
              else{
              	$(that).text('加入计划');
              }
          },{},'POST');
     });

	 controlMap('{!! $gol->address !!}');

    
    function showInfo(e){
        myGeo.getLocation(e.point, function (rs) {
            var addComp = rs.addressComponents;
            var address = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;  
            if (confirm("确定选择地址是" + address + "?")) {
                 call_back_by_map(address,e.point.lng,e.point.lat);
            }
        });
        addMarker(e.point);
    }

    //地图上标注  
    function addMarker(point) {  
        var marker = new BMap.Marker(point);  
        markersArray.push(marker);  
        clearOverlays();  
        map.addOverlay(marker);  
    } 

    //清除标识  
    function clearOverlays() {  
        if (markersArray) {  
            for (i in markersArray) {  
                map.removeOverlay(markersArray[i])  
            }  
        }  
    }
    var myGeo;
    var map;
    // 百度地图API功能
    var markersArray = [];  
    var ResultArray = [];  
    var local1;
    var point1;
    function controlMap(address,nearby='公交'){ 
        map = new BMap.Map("allmap");
        map.setMapStyle({style:'dark'});
        //var point = new BMap.Point(114.329303,30.475501);
        //map.centerAndZoom(point,12);
        // 创建地址解析器实例
        myGeo = new BMap.Geocoder();
        // 将地址解析结果显示在地图上,并调整地图视野
        myGeo.getPoint(address, function(point){
            if (point) {
                $('.map').show(500);
                map.centerAndZoom(point, 16);
                clearOverlays();
                map.addOverlay(new BMap.Marker(point));
                map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
                map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
                map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
                map.enableScrollWheelZoom();  
                myGeo.getLocation(point, function (rs) {  
                var addComp = rs.addressComponents;  
                var address = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;

        		point1 = point;
                 local1 = new BMap.LocalSearch(
            map,
            {
                renderOptions : {
                    map : map,
                    // panel : "content"
                },onMarkersSet:function (array) {
                    console.log(array);
                },
                onInfoHtmlSet:function (LocalResultPoi) {
                    console.log(LocalResultPoi);
                },
                onResultsHtmlSet:function (element) {
                    console.log(element);
                },
                    pageCapacity : 50
                    });
            		local1.searchNearby(nearby,point,1000);
                // javascript:window.parent.call_back_by_map(null,point.lng,point.lat);
                 
            });                            //启用滚轮放大缩小
            }else{
                $('.map').hide(500);
                //alert("您选择地址没有解析到结果!");
            }
        });


// var local = new BMap.LocalSearch(map, {renderOptions: {map: map,panel:"results"}});        
// local.searchInBounds("银行", map.getBounds());
        //map.addEventListener("click", showInfo); 
    }
    $('.gol_map_near > button').click(function(){
    	$('.gol_map_near > button').removeClass('active');
    	$(this).addClass('active');
    	local1.searchNearby($(this).data('data'),point1,1000);
    }); 

    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 4,
      spaceBetween: 25,
      loop : true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
 
</script>
@endsection
@endif
