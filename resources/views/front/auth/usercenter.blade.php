@extends('front.partial.base')

@section('css')
<style type="text/css">
/*  tr>td{
    text-align: center;
  }*/
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
                  <h4 class="text-center gol_color">{!! $user->zichan !!}</h4>
                </div>

                <div class="col-sm-1">
                  <span class="btn btn-default">转入</span>
                </div>

                <div class="col-sm-1">
                  <span class="btn btn-default">转出</span>
                </div>

                <div class="col-sm-2">
                  <a  class="btn btn-default" style="border: none;
    color: #FF5511;">账单明细>>></a>
                </div>

                {{-- <div class="col-sm-3">
                  <h4 class="text-center">我的负债</h4>
                  <h4 class="text-center">{!! $user->fuzhai !!}</h4>
                </div> --}}

            </div>

   {{--          <div class="row mt120 pt30" style="border-top: 1px solid #ccc;">

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

            </div> --}}

            <div class="row mt15 pt30" style="border-top: 1px solid #ccc;">

                  <div class="col-sm-3">
                    <h4 class="text-center">小屋精选</h4>
                  </div>

                  <div class="col-sm-7">
                  </div>

                  <div class="col-sm-2">
                    <a class="text-center f16" href="/manyMan">查看全部></a>
                  </div>

            </div>

            <div class=" mt30">
                <table class="table table-responsive table-bordered table-hover" id="user-table">
                  <thead>
                      <tr class="gol_table_thead">    
                        {{--   <th>预计收益率</th>
                          <th>期限/锁定期</th> --}}
                          <th >项目名称</th>
                          <th>操作</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if(count($joins))
                         @foreach($joins as $join)
                           <?php $house =optional($join->house);?>
                            <tr class="">
                            {{--     <td>--</td>
                                <td>--</td> --}}
                                <td><img src="{!! $house->image !!}"  style="max-width: 120px;height: auto;" />{!! a_link($house->name,'/manyDetail/'.$house->id) !!}</td>
                                <td>{!! a_link('查看','/manyDetail/'.$house->id) !!}</td>
                            </tr>
                          @endforeach
                      @endif
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