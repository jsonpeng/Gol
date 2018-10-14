@extends('front.partial.base')

@section('css')
	<style type="text/css">
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main ">
			@include('front.partial.bread_nav')
			<div class="content">
				<div class="title">
					<h3>广西南宁裕博林业科技有限公司</h3>
					<p>Guangxi Nanning Yubo forestry technology Co., LTD.</p>
				</div>
				<p class="ad-content">
					<img src="{{asset('images/ad_intro.jpg')}}" alt="" class="img-responsive">
				</p>
				<p class="main-text">
					公司初创于2005年，2016年改制转型后，更名为广西南宁裕博林业科技有限公司。公司总部位于南宁市昆仑大道169号，现有员工18人，其中高工3人，工程师5人，助理工程师9名，注册会计师1人。人员呈老中青阶梯型配置。公司领导层人员具有二十多年从事林业调查规划设计工作的资深经历，为公司提供强有力的技术支撑。公司配备有多台（套）GIS系统软件、平板电脑野外数据采集系统、星站差分RTK系统、全站仪、激光测距仪、激光测高仪、无人机及航拍后处理系统等现代化的技术装备，综合技术手段先进。
				</p>
				<p class="main-text">
					近两年来，公司发展迅速，业务遍布全区，已设立有百色、西林、钦州、北流、来宾、上林、桂平、岑溪等8家分公司。<br>
					“优质高效，客户放心”是我们的服务宗旨。
				</p>
			</div>
		</div>
		@include('front.partial.share')
		<div class="clearfix"></div>
	</div>
@endsection