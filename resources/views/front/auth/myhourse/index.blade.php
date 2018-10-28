@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|项目中心|我的小屋主页</title>
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
          			<div class="text-ch pt30">我的小屋主页</div>
          			<h3 class="text-en">Hourse Center</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb220">

                  <a class="btn btn-primary pull-left" style="margin-top: -10px;margin-bottom: 15px" href="/user/center/project/hourse_create">添加小屋</a>

                  <table class="table table-responsive" id="houses-table">
                              <thead>
                                  <tr>
                                  <th>小屋名称</th>
                                  <th>小屋地址</th>
                                  <th>浏览量</th>
                                  <th>档位</th>
                                  <th>小屋类型</th>
                                  <th>目标</th>
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


                </div>
                  
    


              
              </div>



          </div>
        </div>
    </div>


@endsection


@section('js')
<script type="text/javascript">

</script>
@endsection