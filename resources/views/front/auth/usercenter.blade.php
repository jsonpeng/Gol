@extends('front.partial.base')

@section('css')
<style type="text/css">

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
        @include('front.auth.left_nav')

        <div class="col-sm-1">
        </div>
        <!--右侧导航-->
        <div class="col-sm-9">
            <div class="row">

                <div class="col-sm-3">
                  <h4 class="text-center">我的资产</h4>
                  <h4 class="text-center">---</h4>
                </div>

                <div class="col-sm-4">
                </div>

                <div class="col-sm-3">
                  <h4 class="text-center">我的负债</h4>
                  <h4 class="text-center">---</h4>
                </div>

            </div>

            <div class="row mt120 pt30" style="border-top: 1px solid #ccc;">

                <div class="col-sm-3">
                  <h4 class="text-center">今日预计收益</h4>
                  <h4 class="text-center">---</h4>
                </div>

                <div class="col-sm-4">
                </div>

                <div class="col-sm-3">
                  <h4 class="text-center">累计收益</h4>
                  <h4 class="text-center">---</h4>
                </div>

            </div>

            <div class="row mt15 pt30" style="border-top: 1px solid #ccc;">

                  <div class="col-sm-3">
                    <h4 class="text-center">小屋精选</h4>
                  </div>

                  <div class="col-sm-7">
                  </div>

                  <div class="col-sm-2">
                    <h4 class="text-center">查看全部></h4>
                  </div>

            </div>

            <div class="row mt30">
                <table class="table table-responsive" id="user-table">
                  <thead>
                      <tr style="background-color: rgb(244, 242, 242);">    
                          <th>预计收益率</th>
                          <th>期限/锁定期</th>
                          <th colspan="3">项目名称</th>
                          <th>操作</th>
                      </tr>
                  </thead>
                  <tbody>
               
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
               
                  </tbody>
              </table>
            </div>



        </div>
     </div>
  </div>
@endsection

@section('js')
  @include('front.auth.usercenter_js')
@endsection