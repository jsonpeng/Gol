@extends('layouts.app')

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
                  
                </ul>
                <div class="tab-content">

                  <div class="active tab-pane" id="order_list">
                    <table class="table table-responsive" id="refundLogs-table">
                        <thead>
                            <tr>
                                <th>订单编号</th>
                                <th>订单金额</th>
                                <th>订单状态</th>
                                <th>支付状态</th>
                                <th>下单时间</th>
                            </tr>
                        </thead>
                        <tbody>
              
                        </tbody>
                    </table>
                    <div class="text-center">
                       
                    </div>
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
