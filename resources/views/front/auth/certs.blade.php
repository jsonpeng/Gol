@extends('front.partial.base')

@section('css')
<style type="text/css">

</style>
@endsection

@section('seo')
    <title>{!! getSettingValueByKey('name') !!}|实名认证</title>
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
        
            <div class="common-title text-center">
                <div class="text-ch pt30">实名认证管理</div>
                <h3 class="text-en">CERTS</h3>
                <div class="short-line"></div>
            </div>

            @if(empty($cert))
               <h4 class="mt30">你当前还未完成实名认证,<a href="/user/center/certs/publish">立即去认证</a></h4>
            @else
              @if($cert->status == '审核中')
               <h4 class="mt30">你当前认证记录审核中,请耐心等待</h4>
              @elseif($cert->status == '未通过')
               <h4 class="mt30">你当前认证记录未通过,<a href="/user/center/certs/publish">重新认证</a></h4>
              @elseif($cert->status == '已通过')
               <h4 class="mt30">你当前认证记录已通过,请放心使用</h4>
              @endif
            @endif

        </div>
     </div>
  </div>
@endsection

@section('js')
  @include('front.auth.usercenter_js')
@endsection