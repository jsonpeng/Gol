@extends('front.partial.base')

@section('css')
<style type="text/css">
.gol_settle_enter{
	padding: 10px 25px;
	background: red;
	font-size: 16px;
	color: white;
	text-align: center;
}
</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!}|确定结算 </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')
<div class="container pb220">
		
			<div class="row mt30 pl30 pr30 pb15" style="border-bottom: 1px solid #ccc;">
				<div class="col-sm-2">
					<img src="{!! $hourse->image !!}" class="img_auto" />
				</div>
				<div class="col-sm-4">
					<h4>{!! $hourse->name !!}+{!! $hourse->type !!}</h4>
					<p>{!! $join_param['body'] !!}</p>
					<p>感谢您的支持!您将获得【{!! $hourse->name !!}】权益</p>
				</div>

				<div class="col-sm-3">
					{!! $hourse->address !!}
				</div>
			</div>

			<div class="mt30 mb30">
				<h4 class="f16"><span style="color:#ff1e1e;margin-right: 5px;">*</span>支付信息</h4>
			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2 f16">
					协议/合同
				</div>

				<div class="col-sm-2 f16">
					<input type="checkbox" class="gol_settle_hetong" checked="checked" />
				    无需合同
				</div>

				<div class="col-sm-2 f16">
					<input type="checkbox" class="gol_settle_hetong" />
					需要合同
				</div>

			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2 f16">
					支持金额
				</div>
				<div class="col-sm-2 f16">
					￥{!! $join_param['price'] !!}
				</div>	
			</div>

			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2 f16">
					优惠金额金额
				</div>
				<div class="col-sm-2 f16">
					￥0
				</div>	
			</div>


			<div class="row mt30">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-2 f16">
					实际付款
				</div>
				<div class="col-sm-2 f16" style="color: red;">
					￥{!! $join_param['price'] !!}
				</div>	
			</div>

			<div class="payWay" style="display: none;">
				<div class="row mt30">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<div class="img-box gol_settle_pay" data-type="支付宝">
							<img src="/images/zhifubao.png" alt="">
						</div>
						<!-- <img src="http://www.yingwenquming.com/images/gou.png" alt="" class="gou"> -->
					</div>
					<div class="col-sm-4">
						<div class="img-box gol_settle_pay" data-type="微信">
							<img src="/images/weixin.png" alt="">
						</div>
					</div>
				</div>
			</div>


			<div class="text-center f16 mt30">
				<input type="checkbox" class="gol_settle_tongyi" />我已阅读并同意小屋家的&nbsp;&nbsp;&nbsp;<a class="f14" target="_blank" href="/page/6"><<自由投资人协议>></a>
			</div>

			<div class="row mt30">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-2">
					<div class="gol_settle_enter">支持确认</div>
				</div>
			</div>

			<div class="row mt30 pt30" style="border-top: 1px solid #ccc;">
				<div class="rich-text"><p style="line-height:0; margin-bottom:5px;"><span class="--mb--rich-text" data-boldtype="0" style="font-family:Arial; font-weight:400; font-size:12px; color:rgba(108, 107, 107, 1); font-style:normal; letter-spacing:0px; line-height:14px; text-decoration:none;">小屋提示</span><span class="--mb--rich-text" data-boldtype="0" style="font-family:Arial; font-weight:400; font-size:12px; color:rgba(108, 107, 107, 1); font-style:normal; letter-spacing:0px; line-height:14px; text-decoration:none;">您  </span></p><p style="line-height:0; margin-bottom:5px;"><span class="--mb--rich-text" data-boldtype="0" style="font-family:Arial; font-weight:400; font-size:12px; color:rgba(108, 107, 107, 1); font-style:normal; letter-spacing:0px; line-height:14px; text-decoration:none;">请务必仔细阅读，并充分理解协议中相关条款内容。</span></p><p style="line-height:0; margin-bottom:5px;"><span class="--mb--rich-text" data-boldtype="0" style="font-family:Arial; font-weight:400; font-size:12px; color:rgba(108, 107, 107, 1); font-style:normal; letter-spacing:0px; line-height:14px; text-decoration:none;">如您不同意相关协议、公告、规则和项目页面承诺，您有权选择不支持；</span><span class="--mb--rich-text" data-boldtype="0" style="font-family:Arial; font-weight:400; font-size:12px; color:rgba(108, 107, 107, 1); font-style:normal; letter-spacing:0px; line-height:14px; text-decoration:none;">一旦选择支持，即视为您已确知并完全同意相关协议。</span></p></div>
			</div>
	

 </div>

@endsection


@section('js')
	<script>
		var pay_param = {price:'{!! $join_param['price'] !!}',gear:'{!! $join_param['gear'] !!}',gear_num:'{!! $join_param['gear_num'] !!}',house_id:'{!! $join_param['house_id'] !!}',body:'{!! $join_param['body'] !!}',hetong:'不需要',pay_platform:'支付宝'};
		$('.gol_settle_hetong').click(function(){
			$('.gol_settle_hetong').prop('checked',0);
			$(this).prop('checked',1);
			pay_param['hetong'] = $(this).index() ? '需要' : '不需要';
		});
		$('.gol_settle_enter').click(function(){
			if(!$('.gol_settle_tongyi').prop('checked')){
				$.alert('请先阅读协议','error');
				return;
			}
			$.zcjyFrameOpen($('.payWay').html(),'请选择支付方式支付',['60%', '280px']);
		});
		$(document).on('click','.gol_settle_pay',function(){
			var type = $(this).data('type');
			pay_param['pay_platform'] = type;
			//支付宝
			if(type == '支付宝'){
				$.zcjyRequest('/ajax/save_house_join/pay',function(res){
					if(res){
						location.href="/alipay/pay";
					}
				},pay_param,'POST');
			}
			else{
				//微信
				$.alert('微信支付暂未开通','error');
			}

		});
	</script>
@endsection
