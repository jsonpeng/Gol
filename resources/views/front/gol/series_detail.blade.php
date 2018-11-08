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
		color: black;
		background: #ddd;
		text-align: center;
		font-size: 24px;
	}
	.gol_series_give_discourse{
		border:1px dashed rgba(187,187,187,1);
		border-radius: 10px;
		text-align: center;
	}
</style>
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
				<img src="{!! $gol->iamge !!}" onerror="javascript:this.src='/images/gol/xiaowu_main.png';" class="img_auto" />
			</div>
			<div class="col-sm-5">
				<p class="pb15">服务/设施</p>

				@if(count($gol->ServicesArr))
					<div class="row"> 
						<div class="col-sm-12">
							<div class="row">
								@foreach($gol->ServicesArr as $item)
									<div class="col-sm-4 mb10">
										<i class="fa fa-edit f16"></i>{!! $item !!}
									</div>
								@endforeach
							</div>
					 	</div>
					</div>
				@endif

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div>

				<p>租期/证件</p>
				<p>整租{!! $gol->zuqi !!}年可续约 | @if($gol->xukezheng)  @else 无许可证 @endif</p>
				<p>安全许可</p>

				<div class="pt15" style="border-bottom: 1px dashed #ddd;">
					
				</div>

				<p>{!! $gol->brief !!}</p>
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

					<div class="col-sm-3 f16" style="color: red;">查看相关费用</div>
				</div>
			</div>
			<div class="col-sm-5">
				<a class="gol_m_detail_button detail_color gol_attention" data-id="{!! !empty($user) ? $user->id : '' !!}" data-golid='{!! $gol->id !!}'>@if($attention_status) 已 @endif 加入计划 ({!! $attention_num !!})</a>
				<a class="gol_m_detail_button detail_color">立即预定</a>
			</div>
		</div>

		<!--地理周边-->
		<div class="container mt30">
			 
                  <div id="allmap" style="height: 600px;"></div>
          
		</div>
	
		<div class="container mt30">
			<p>房东描述详情:{!! $gol->content !!}</p>
		</div>

		<!--很多人喜欢-->

		@endif
		
	</div>

@endsection


@section('js')
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=usHzWa4rzd22DLO58GmUHUGTwgFrKyW5&s=1"></script>
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
    function controlMap(address){ 
        map = new BMap.Map("allmap");
        map.setMapStyle({style:'normal'});
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
                //map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
                //map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
               // map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
                map.enableScrollWheelZoom();  
                myGeo.getLocation(point, function (rs) {  
                var addComp = rs.addressComponents;  
                var address = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;  
               
                // javascript:window.parent.call_back_by_map(null,point.lng,point.lat);
                 
            });                            //启用滚轮放大缩小
            }else{
                $('.map').hide(500);
                //alert("您选择地址没有解析到结果!");
            }
        });
        //map.addEventListener("click", showInfo); 
    }   
</script>
@endsection
