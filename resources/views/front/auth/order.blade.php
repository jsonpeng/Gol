@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|我的交易单</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')


  <div class="container pt30 pb120">
     <div class="row">
        <!--左侧导航-->
        @include('front.auth.left_nav')

        <div class="col-sm-1">
        </div>
        <!--右侧导航-->
        <div class="col-sm-9">

          	<div class="notice">
          		<div class="common-title text-center">
          			<div class="text-ch pt30">我的交易单</div>
          			<h3 class="text-en">My Order</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb220">
              
                </div>
                  
               
              
              </div>



          </div>
        </div>
    </div>
@endsection

@section('js')
 @include('front.auth.usercenter_js')
@endsection