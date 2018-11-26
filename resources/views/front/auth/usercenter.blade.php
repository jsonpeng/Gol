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
                  <span class="btn btn-default gol_user_topup">转入</span>
                </div>

                <div class="col-sm-1">
                  <span class="btn btn-default gol_user_rollout">转出</span>
                </div>

             

                {{-- <div class="col-sm-3">
                  <h4 class="text-center">我的负债</h4>
                  <h4 class="text-center">{!! $user->fuzhai !!}</h4>
                </div> --}}

            </div>


            <div class="row mt15" style="border-top: 1px solid #ccc;">

                <div class="col-sm-2 pt30 pb30">
                  <a  class="btn btn-default" style="border: none;
    color: #FF5511;">账单明细>>></a>
                </div>

                <table class="table table-responsive table-bordered table-hover" >
                  <thead>
                      <tr class="gol_table_thead">    
                          <th>类型</th>
                          <th>变化</th>
                          <th>状态</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if(count($logs))
                         @foreach($logs as $log)
                            <tr class="">
                                <td>{!! $log->type !!}</td>
                                <td>@if($log->type == '转入'){!! tag('+','black') !!}@else{!! tag('-','black') !!}@endif{!! $log->change !!}</td>
                                <td>{!! $log->status !!}</td>
                            </tr>
                          @endforeach
                      @endif
                  </tbody>

                  <div class="text-center">
                    {!! $logs->appends('')->links() !!}
                  </div>
              </table>
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

            <div class="row mt15 " style="border-top: 1px solid #ccc;">

                <div class="col-sm-2 pt30 pb30">
                  <a  class="btn btn-default" style="border: none;
    color: #FF5511;">小屋精选</a>
                </div>


                  <div class="col-sm-7">
                  </div>

                  <div class="col-sm-2 pt30">
                    <a class="text-center f16" href="/manyMan">查看全部></a>
                  </div>

            </div>

            <div class="">
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

    <div class="gol_topup_box" style="display: none;">
      <div class="container" >
          <div class="row mt30">
            <div class="col-sm-1"></div>
             <div class="col-sm-2">请输入充值金额</div>
             <input type="text" name="topup_price" class="col-sm-2 form-inline" />
          </div>


          <div class="row mt30">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">请选择支付方式</div>
            <div class="col-sm-2">
              <div class="img-box gol_topup_pay" data-type="支付宝">
                <img src="/images/zhifubao.png" alt="">
              </div>
              <!-- <img src="http://www.yingwenquming.com/images/gou.png" alt="" class="gou"> -->
            </div>
            <div class="col-sm-2">
              <div class="img-box gol_topup_pay" data-type="微信">
                <img src="/images/weixin.png" alt="">
              </div>
            </div>
          </div>
      </div>
    </div>


     <div class="gol_withdraw_box" style="display: none;">
      <div class="container" >
          <div class="row mt30">
            <div class="col-sm-1"></div>
             <div class="col-sm-2">请输入转出金额</div>
             <input type="text" name="withdraw_price" class="col-sm-2 form-inline" />
          </div>


          <div class="row mt30">
            <div class="col-sm-1"></div>
             <div class="col-sm-2">请确定收款人姓名</div>
             <input type="text" name="withdraw_name" class="col-sm-2 form-inline" />
          </div>

          <div class="row mt30">
            <div class="col-sm-1"></div>
             <div class="col-sm-2">请确定收款人账号</div>
             <input type="text" name="withdraw_account" class="col-sm-2 form-inline" />
          </div>


          <div class="row mt30">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">请选择收款方式</div>
            <div class="col-sm-2">
              <div class="img-box gol_withdraw" data-type="支付宝">
                <img src="/images/zhifubao.png" alt="">
              </div>
              <!-- <img src="http://www.yingwenquming.com/images/gou.png" alt="" class="gou"> -->
            </div>
            <div class="col-sm-2">
              <div class="img-box gol_withdraw" data-type="微信">
                <img src="/images/weixin.png" alt="">
              </div>
            </div>
          </div>
      </div>
    </div>



@endsection

@section('js')
  @include('front.auth.usercenter_js')
  <script type="text/javascript">
    //最大可转出余额
    var max_count =parseFloat('{!! $user->zichan !!}'); 
    //账户转入
    $('.gol_user_topup').click(function(){
          $.zcjyFrameOpen($('.gol_topup_box').html(),'转入到资产余额',['60%', '280px']);
    });
    $(document).on('click','.gol_topup_pay',function(){
            var price = $('input[name=topup_price]:eq(1)').val();
            if($.empty(price)){
              $.alert('请输入充值金额','error');
              return;
            }
            var type = $(this).data('type');
            if(type == '支付宝'){
                location.href = "/alipay/pay_user_topup?price="+price;
            }
            else{
              $.alert('微信支付暂未开通','error');
            }
    });
    //账户转出
    $('.gol_user_rollout').click(function(){
         $.zcjyFrameOpen($('.gol_withdraw_box').html(),'转出资产余额',['60%', '360px']);
    });
    $(document).on('click','.gol_withdraw',function(){
            var price = $('input[name=withdraw_price]:eq(1)').val();
            var name = $('input[name=withdraw_name]:eq(1)').val();
            var account = $('input[name=withdraw_account]:eq(1)').val();

             if($.empty(price)){
              $.alert('请输入转出金额','error');
              return;
             }

             if($.empty(name)){
              $.alert('请输入收款人姓名','error');
              return;
             }

             if($.empty(account)){
              $.alert('请输入收款人姓名','error');
              return;
             }
             
            var type = $(this).data('type');
            if(type == '支付宝'){
                $.zcjyRequest('/alipay/withdraw_user/',function(res){
                  if(res){
                    $.alert(res);
                    location.reload();
                  }
                },{name:name,price:price,account:account});
            }
            else{
              $.alert('微信收款暂未开通','error');
            }
    });
  </script>
@endsection