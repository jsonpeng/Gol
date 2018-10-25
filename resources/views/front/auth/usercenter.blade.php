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
  #user-table > thead > tr > th{
    text-align: center;
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