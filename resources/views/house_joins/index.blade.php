@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">小屋支持记录</h1>
    
       {{--  <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('houseJoins.create') !!}">Add New</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-default box-solid mb10-xs {!! !$tools?'collapsed-box':'' !!} " style="margin-top: 15px;">
                        <div class="box-header with-border">
                            <h3 class="box-title">查询</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"> <i class="fa fa-{!! !$tools?'plus':'minus' !!}"></i>
                                </button>
                            </div>
                            <!-- /.box-tools --> </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="order_search">
                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="name">支持小屋名称</label>
                                    <input type="text" class="form-control" name="name" placeholder="请输入支持小屋名称" @if(array_key_exists('name', $input))value="{{$input['name']}}"@endif />
                                </div>

                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="name">支付状态</label>
                                    <select class="form-control" name="pay_status">
                                        <option value="" @if (!array_key_exists('pay_status', $input)) selected="selected" @endif>全部</option>
                                        <option value="未支付" @if (array_key_exists('pay_status', $input) && $input['pay_status']=='未支付') selected="selected" @endif>未支付</option>
                                        <option value="已支付" @if (array_key_exists('pay_status', $input) && $input['pay_status']=='已支付') selected="selected" @endif>已支付</option>
                                        <option value="退款中" @if (array_key_exists('pay_status', $input) && $input['pay_status']=='退款中') selected="selected" @endif>退款中</option>
                                        <option value="已退款" @if (array_key_exists('pay_status', $input) && $input['pay_status']=='已退款') selected="selected" @endif>已退款</option>
                                    </select>
                                </div>


                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="name">是否需要合同</label>
                                    <select class="form-control" name="hetong">
                                        <option value="" @if (!array_key_exists('hetong', $input)) selected="selected" @endif>全部</option>
                                        <option value="需要" @if (array_key_exists('hetong', $input) && $input['hetong']=='需要') selected="selected" @endif>需要</option>
                                        <option value="不需要" @if (array_key_exists('hetong', $input) && $input['hetong']=='不需要') selected="selected" @endif>不需要</option>
                                    </select>
                                </div>



                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="order_delivery">每页显示</label>
                                    <select class="form-control" name="page_list">
                                        <option value="" @if (!array_key_exists('page_list', $input)) selected="selected" @endif>默认(15)</option>
                                        <option value="5" @if (array_key_exists('page_list', $input) && $input['page_list']=='5') selected="selected" @endif>5</option >
                                        <option value="15" @if (array_key_exists('page_list', $input) && $input['page_list']=='15') selected="selected" @endif>15</option >
                                      <option value="25" @if (array_key_exists('page_list', $input) && $input['page_list']=='25') selected="selected" @endif>25</option >
                                    </select>
                                </div>

                                <div class="form-group col-lg-1 col-md-1 hidden-xs hidden-sm" style="padding-top: 25px;">
                                    <button type="submit" class="btn btn-primary pull-right ">查询</button>
                                </div>
                                <div class="form-group col-xs-6 visible-xs visible-sm" >
                                    <button type="submit" class="btn btn-primary pull-left ">查询</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body --> </div>
                    <!-- /.box -->
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('house_joins.table')
            </div>
        </div>
        <div class="text-center">
            {!! $houseJoins->appends($input)->links() !!}
        </div>
    </div>
@endsection

