@extends('front.partial.base')

@section('css')
<style type="text/css">

.gol_many_des{
	padding: 45px;
	position: relative;
	width: 24%;
    display: inline-block;
}
.gol_many_des > p{
	font-size: 34px;
	font-weight: 600;
}
.gol_many_des > p > span{
	display: inline-block;
	font-size: 26px;
	font-weight: 300;
	color: black;
}

.gol_many_xiexian{
	position: absolute;
    right: 0;
    top: 85px;
    width: 102px;
    height: 20px;
    border-bottom: 2px solid #ddd;
    -webkit-transform: rotate(108deg);
    -moz-transform: rotate(45deg);
	filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=0.45);
}

.bb_none{
	border-bottom: none;
}

</style>
@endsection

@section('seo')
	<title>{!! getSettingValueByKeyCache('name') !!} </title>
    <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
@endsection

@section('content')

<!-- 数据显示 -->
<div class="text-center">
	<div class="gol_many_des"><p>1000<span>万</span></p><p style="color: red;">￥<span>累计支持金额</span></p><div class="gol_many_xiexian"> </div></div>
	<div class="gol_many_des"><p>200<span>万</span></p><p style="color: red;">￥<span>单项最高支持金额</span></p><div class="gol_many_xiexian"> </div></div>
	<div class="gol_many_des"><p>30<span>万</span></p><p style="color: red;">￥<span>累计支持人数</span></p><div class="gol_many_xiexian"> </div></div>
	<div class="gol_many_des"><p>0.4<span>万</span></p><p style="color: red;">￥<span>单项最高支持人数</span></p></div>
</div>



<div class="container ">
	<!-- 正在参与 -->
	<div class="text-center f24">———&nbsp;&nbsp;正在参与&nbsp;&nbsp;———</div>
	<div class="pt30 pb50">
		<div class="row">
			<!-- 单个结构 -->
			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>



			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>


			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- 即将结束 -->
	<div class="text-center f24">———&nbsp;&nbsp;即将结束&nbsp;&nbsp;———</div>
	<div class="pt30 pb50">
		<div class="row">
			<!-- 单个结构 -->
			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>



			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>


			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- 即将上架 -->
	<div class="text-center f24">———&nbsp;&nbsp;即将上架&nbsp;&nbsp;———</div>
	<div class="pt30 pb50">
		<div class="row">
			<!-- 单个结构 -->
			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>



			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>


			<div class="col-sm-3 gol_many_post_item">
				<img src="/images/gol/many_post.jpg" class="img_auto" />
				<h4>项目名称</h4>
				<h5>类别+地点</h5>
				<p>内容简介xxxxxxxxxxxxxxx</p>
				<div class="progress">
					<div class="progress-bar backgroud_red" role="progressbar"  style="width: 60%;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<p class="text-center">￥500</p>
						<p class="text-center">档位</p>
 					</div>
					<div class="col-sm-4">
						<p class="text-center">￥10万</p>
						<p class="text-center">目标</p>
					</div>
					<div class="col-sm-4">
						<p class="text-center">￥15000</p>
						<p class="text-center">已筹</p>
					</div>
				</div>
			</div>

		</div>
	</div>

 </div>

@endsection


@section('js')
	<script>

	</script>
@endsection
