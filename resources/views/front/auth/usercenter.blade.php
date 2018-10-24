@extends('front.partial.base')

@section('css')
<style type="text/css">
  .gol_usercenter_headimg{
    max-width: 100px;
  }
  .gol_usercenter_leftnav{
    background-color: #F4F2F2;
    padding-top: 15px;
    padding-bottom: 220px;
    padding-right: 10px;
    text-align: center;
  }
  .gol_usercenter_li{
    padding-top: 50px;
    /*text-align: center;*/
    font-size: 16px;
    list-style:none;
  }
</style>
@endsection

@section('seo')
	  <title>{!! getSettingValueByKey('name') !!}|个人中心</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container pt30 pb120">
     <div class="row">
        <!--左侧导航-->
        <div class="col-sm-2 gol_usercenter_leftnav">
          <img src="/images/add.png" class="img_auto gol_usercenter_headimg" style="" />
          <ul>
            <li class="gol_usercenter_li">资产总览&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li">项目中心&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li">我的交易单&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li">我的关注&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li">消息中心&nbsp;&nbsp;&nbsp;&nbsp;></li>
          </ul>
        </div>

        <div class="col-sm-1">
        </div>
        <!--右侧导航-->
        <div class="col-sm-9">
          
        </div>
     </div>
	</div>
@endsection