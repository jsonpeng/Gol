@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">小屋列表</h1>
   {{--      <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('houses.create') !!}">添加</a>
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
                                    <label for="name">小屋名称</label>
                                    <input type="text" class="form-control" name="name" placeholder="请输入小屋名称" @if(array_key_exists('name', $input))value="{{$input['name']}}"@endif />
                                </div>

                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="name">小屋地址</label>
                                    <input type="text" class="form-control" name="address" placeholder="请输入小屋地址" @if(array_key_exists('address', $input))value="{{$input['address']}}"@endif />
                                </div>

                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="name">小屋类型</label>
                                    <select class="form-control" name="type">
                                        <option value="" @if (!array_key_exists('type', $input)) selected="selected" @endif>全部</option>
                                        <option value="青旅" @if (array_key_exists('type', $input) && $input['type']=='青旅') selected="selected" @endif>青旅</option >
                                        <option value="客栈" @if (array_key_exists('type', $input) && $input['type']=='客栈') selected="selected" @endif>客栈</option >
                                        <option value="民宿" @if (array_key_exists('type', $input) && $input['type']=='民宿') selected="selected" @endif>民宿</option >
                                        <option value="空间" @if (array_key_exists('type', $input) && $input['type']=='空间') selected="selected" @endif>空间</option >
                                    </select>
                                </div>

                                <div class="form-group col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                    <label for="name">状态</label>
                                    <select class="form-control" name="status">
                                        <option value="" @if (!array_key_exists('status', $input)) selected="selected" @endif>全部</option>
                                        <option value="审核中" @if (array_key_exists('status', $input) && $input['status']=='审核中') selected="selected" @endif>审核中</option>
                                        <option value="已发布" @if (array_key_exists('status', $input) && $input['status']=='已发布') selected="selected" @endif>已发布</option>
                                        <option value="已完成" @if (array_key_exists('status', $input) && $input['status']=='已完成') selected="selected" @endif>已完成</option>
                                        <option value="已下架" @if (array_key_exists('status', $input) && $input['status']=='已下架') selected="selected" @endif>已下架</option>
                                        <option value="已过期" @if (array_key_exists('status', $input) && $input['status']=='已过期') selected="selected" @endif>已过期</option>
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
                    @include('houses.table')
            </div>
        </div>
        <div class="text-center">
            {!!  $houses->appends($input)->links() !!}
        </div>
    </div>
@endsection

