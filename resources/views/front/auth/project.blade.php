@extends('front.partial.base')

@section('css')
<style type="text/css">
    #myTab>li>a {
      padding: 15px;
  }
  .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
    color: white;
    background: #FF5511;
    border: 1px solid #FF5511;
  }
</style>
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

                  <ul id="myTab" class="nav nav-tabs mb25">
                    <li class="active">
                      <a href="#hourse" data-toggle="tab">
                         我要开小屋
                      </a>
                    </li>
                    <li><a href="#gol" data-toggle="tab">我是商户</a></li>
                  </ul>

                  <div id="myTabContent" class="tab-content ">

                    <div class="tab-pane fade in active" id="hourse">
                                 <a class="btn btn-warning pull-left" style="margin-top: -10px;margin-bottom: 15px" href="/user/center/project/hourse_create">添加小屋</a>

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
                                                    <th>操作</th>
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
                                                        <td>@if($house->status == '已发布')
                                                               <a href="javascript:;"  target="_blank" data-id="{!! $house->id !!}" data-action="update_house" class='btn btn-danger btn-xs gol-project-action'>下架小屋</a>
                                                            @elseif($house->status == '已完成')

                                                            @else
                                                              <a href="javascript:;"  target="_blank" data-id="{!! $house->id !!}" data-action="update_house" class='btn btn-success btn-xs gol-project-action'>发布小屋</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                      </table>

                                       <div class="text-center">
                                          {!! $houses->appends('')->links() !!}
                                        </div>

                    </div>

                     <div class="tab-pane fade " id="gol">
                                  <a class="btn btn-warning pull-left" style="margin-top: -10px;margin-bottom: 15px" href="/user/center/project/gol_create">添加Gol</a>

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
                                            <th>操作</th>
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
                                                    <td>@if($gol->publish_status == '1')
                                                               <a href="javascript:;"  target="_blank" data-id="{!! $gol->id !!}" data-action="update_gol" class='btn btn-danger btn-xs gol-project-action'>下架小屋</a>
                                                            @else
                                                              <a href="javascript:;"  target="_blank" data-id="{!! $gol->id !!}" data-action="update_gol" class='btn btn-success btn-xs gol-project-action'>发布小屋</a>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                          {!! $gols->appends('')->links() !!}
                                    </div>



                </div>

                    </div>

                  </div>

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
  $('.gol-project-action').click(function(){
      var action = $(this).data('action');
      var id = $(this).data('id');
      $.zcjyRequest('/ajax/'+action+'/'+id,function(res){
            if(res){
              $.alert(res);
              location.reload();
            }
      },{},'POST');
    });
</script>
@endsection