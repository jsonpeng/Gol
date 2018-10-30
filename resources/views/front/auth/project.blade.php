@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|项目中心</title>
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
          			<div class="text-ch pt30">项目中心</div>
          			<h3 class="text-en">Project Center</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb220">
              
                </div>
                  
               
              
              </div>



          </div>
        </div>
    </div>

    <div class="gol_choose_role" style="display: none;">
        <div class="row mt30">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-4">
            <a class="f16" href="/user/center/project/hourse_index">我要开小屋</a>
          </div>
          <div class="col-sm-4">
            <a class="f16" href="/user/center/project/gol_index">我是商户</a>
          </div>
        </div>
    </div>
@endsection


@section('js')
 @include('front.auth.usercenter_js')
<script type="text/javascript">
  $.zcjyFrameOpen($('.gol_choose_role').html(),'请选择',['60%', '380px']);
</script>
@endsection