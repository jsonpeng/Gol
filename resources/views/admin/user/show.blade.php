@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('fullcalendar/dist/fullcalendar.min.css') }}">
<style type="text/css">
  .fc-day-grid-event .fc-content {
      text-align: center;
  }
</style>
@endsection

@section('content')
    <div class="container-fluid" style="padding: 30px 15px;">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-top: 0;">
          <h1>
            用户信息
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" style="height: 100px;" src="{{ $user->head_image }}">

                  <h3 class="profile-username text-center">{{ $user->name }}</h3>


                  <p class="text-muted text-center">
                
                    
                </p>

                  <ul class="list-group list-group-unbordered">

            
                 
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">其他信息</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">

                        <li class="list-group-item">
                          <b>注册时间</b> <span class="pull-right">{{ $user->created_at->format('Y-m-d') }}</span>
                        </li>
                        <li class="list-group-item">
                          <b>电话</b> <span class="pull-right">{{ $user->mobile }}</span>
                        </li>
                        <li class="list-group-item">
                          <b>最后活跃时间</b> <span class="pull-right">{{ $user->last_login }}</span>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                  <li class="active"><a href="#order_list" data-toggle="tab">订单</a></li>
                  <li ><a href="#hourse_list" data-toggle="tab">小屋</a></li>
                  <li ><a href="#gol_list" data-toggle="tab">GOL</a></li>
                  <li ><a href="#notice_list" data-toggle="tab">通知消息</a></li>
                  <li ><a href="#equiry_list" data-toggle="tab">权益日安排</a></li>
                </ul>
                <div class="tab-content">

                  <div class="active tab-pane" id="order_list">

                     <table class="table table-responsive table-bordered table-hover" id="houseJoins-table">
                        <thead>
                            <tr  class="gol_table_thead">
                     
                            <th>支持小屋</th>
                      
                            <th>购买档位</th>
                            <th>购买数量</th>
                            <th>订单描述</th>

                            <th>合计支持金额</th>
                            <th>支付平台</th>
                            <th>支付状态</th>
                            <th>是否需要合同</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $houseJoin)
                          <?php $house =optional($houseJoin->house);?>
                            <tr class="">
                  
                                <td><img src="{!! $house->image !!}"  style="max-width: 120px;height: auto;" /><br />{!! a_link($house->name,'/manyDetail/'.$house->id) !!}</td>
                      

                                <td>{!! $houseJoin->gear !!}</td>
                                <td>{!! $houseJoin->gear_num !!}</td>
                                <td>{!! $houseJoin->body !!}</td>

                                <td>{!! $houseJoin->price !!}</td>
                                <td>{!! $houseJoin->pay_platform !!}</td>
                                <td>{!! $houseJoin->pay_status !!}</td>
                                <td>{!! $houseJoin->hetong !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                      {!! $orders->appends('')->links() !!}
                    </div>

                  </div>

               
                      <div class="tab-pane" id="hourse_list">
                                  <table class="table table-responsive table-bordered table-hover" id="houses-table">
                                                <thead>
                                                    <tr  class="gol_table_thead">
                                                    <th>小屋名称</th>
                                                    <th>小屋地址</th>
                                                    <th>浏览量</th>
                                                    <th>档位</th>
                                                    <th>小屋类型</th>
                                                    <th>目标(万)</th>
                                                    <th>状态</th>
                                                    <th>截止时间</th>
                                                    <th>发布时间</th>
                                                  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($houses as $house)
                                                    <tr>
                                                        <td>{!! $house->name !!}</td>
                                                        <td>{!! $house->address !!}</td>
                                                        <td>{!! $house->view !!}</td>
                                                        <td>{!! $house->gear !!}</td>
                                                        <td>{!! $house->type !!}</td>
                                                        <td>{!! $house->target !!}</td>
                                                        <td>{!! $house->status !!}</td>
                                                        <td>{!! $house->endtime !!}</td>
                                                        <td>{!! $house->created_at !!}</td>
                                                
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                      </table>

                                       <div class="text-center">
                                          {!! $houses->appends('')->links() !!}
                                        </div>

                      </div>


                      <div class="tab-pane" id="gol_list">
                              <table class="table table-responsive table-bordered table-hover" id="gols-table">
                                        <thead>
                                            <tr  class="gol_table_thead">
                                            <th>名称</th>
                                            <th>主图</th>
                                      <!--       <th>Brief</th>
                                            <th>Content</th> -->
                                            <th>有无许可证</th>
                                            <th>租期</th>
                                            <th>面积</th>
                                            <th>地址</th>
                                            <th>小屋状态</th>
                                            <th>改造状态</th>
                                            <th>发布状态</th>
                                            <th>价格</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($gols as $gol)
                                                <tr>
                                                    <td>{!! $gol->name !!}</td>
                                                    <td><img src="{!! $gol->image !!}" style="max-width: 80px;height: auto;" /></td>
                                                    <td>{!! $gol->xukezheng ? '<img style="max-width: 100px;height: auto;" src='. $gol->xukezheng .' />': '无' !!}</td>
                                                    <td>{!! $gol->zuqi !!}</td>
                                                    <td>{!! $gol->area !!}</td>
                                                    <td>{!! $gol->address !!}</td>
                                                    <td>{!! $gol->hourse_status !!}</td>
                                                    <td>{!! $gol->gaizao_status !!}</td>
                                                    <td>{!! $gol->fabuStatus !!}</td>
                                                    <td>{!! $gol->price !!}</td>
                                            
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                          {!! $gols->appends('')->links() !!}
                                    </div>

                      </div>


                      <div class="tab-pane" id="notice_list">
                            <table class="table table-responsive table-bordered table-hover" id="gols-table">
                                        <thead>
                                            <tr  class="gol_table_thead">
                                            <th>消息内容</th>
                                            <th>阅读状态</th>
                                            <th>消息创建时间</th>
                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                                  @foreach($notices as $notice)
                                                    <tr> 
                                                      <td>{!! $notice->content!!}</td>
                                                      <td>@if($notice->read) <span class="btn btn-success">已读</span> @else   <span class="btn btn-danger">未读</span> @endif</td>
                                                      <td>{!! $notice->created_at !!}</td>
                                                    </tr>
                                                  @endforeach
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                          {!! $notices->appends('')->links() !!}
                                    </div>

                      </div>


                      <div class="tab-pane" id="equiry_list">
                          <div class="mt30" id="calendar"></div>
                      </div>
   
                  <!-- /.tab-pane -->

             
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section>
    </div>
@endsection


@include('admin.user.js')
