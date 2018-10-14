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
					<h3>业务范围</h3>
					<p>Scope of business</p>
				</div>
				<ul class="business-list">
					<li>公司业务涉及多个领域 </li>
					<li>工程勘察：森林资源调查、林木采伐作业调查设计、营造林作业调查设计、公益林调查、天然林调查、林（土）地变更调查、野生动植物和自然保护区调查、森林病虫害调查、森林土壤调查、林业碳汇调查监测、森林生态环境监测等。</li>
					<li>工程咨询：农林投资项目可行性研究、林地征占用可行性研究、林业发展中长短期规划、农林种植业专项发展规划、森林经营方案编制、林木及森林资源资产评估、林业碳汇PDD编制、林业碳汇项目开发。</li>
					<li>园林绿化：城乡绿化规划设计、园林工程施工、营林工程施工。</li>
				</ul>
				<div class="row business-show">
					<div class="col-sm-4 col-xs-6" style="margin-bottom: 20px;">
						<div class="img-box">
							<img src="{{asset('images/business-show.jpg')}}" alt="" class="img-responsive">
						</div>
					</div>
					<div class="col-sm-4 col-xs-6" style="margin-bottom: 30px;">
						<div class="img-box">
							<img src="{{asset('images/business-show.jpg')}}" alt="" class="img-responsive">
						</div>
					</div>
					<div class="col-sm-4 col-xs-6" style="margin-bottom: 20px;">
						<div class="img-box">
							<img src="{{asset('images/business-show.jpg')}}" alt="" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('front.partial.share')
		<div class="clearfix"></div>
	</div>
@endsection