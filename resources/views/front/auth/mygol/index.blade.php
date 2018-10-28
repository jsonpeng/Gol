@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}|项目中心|我的gol主页</title>
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
          			<div class="text-ch pt30">我的Gol主页</div>
          			<h3 class="text-en">Gol Center</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb220">

                  <a class="btn btn-primary pull-left" style="margin-top: -10px;margin-bottom: 15px" href="/user/center/project/gol_create">添加Gol</a>

                  <table class="table table-responsive" id="gols-table">
                        <thead>
                            <tr>
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
                                    <td>{!! $gol->xukezheng ? $gol->xukezheng : '无' !!}</td>
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