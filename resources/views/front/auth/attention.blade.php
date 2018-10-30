@extends('front.partial.base')

@section('css')
<style type="text/css">
    /**
  *tab
  */
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
	<title>{!! getSettingValueByKey('name') !!}|我的关注</title>
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
          			<div class="text-ch pt30">我的关注</div>
          			<h3 class="text-en">My Attention</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb220">

                  <ul id="myTab" class="nav nav-tabs mb25">
                    <li class="active">
                      <a href="#home" data-toggle="tab">
                         我关注的小屋
                      </a>
                    </li>
                    <li><a href="#gol" data-toggle="tab">我关注的Gol</a></li>
                  </ul>

                  <div id="myTabContent" class="tab-content ">

                      <div class="tab-pane fade in active " id="home">
                              <table class="table table-responsive" id="houses-table">
                                  <thead>
                                      <tr>
                                      <th>小屋主图</th>
                                      <th>小屋名称</th>
                                      <th>小屋地址</th>
                                      <th>浏览量</th>
                                      <th>小屋类型</th>
                                      <th>目标(万)</th>
                                      <th>状态</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($houses as $house)
                                      <tr>
                                          <td><img src="{!! $house->image !!}" style="max-width: 120px;height: auto;"></td>
                                          <td>{!! a_link($house->name,'/manyDetail/'.$house->id) !!}</td>
                                          <td>{!! $house->address !!}</td>
                                          <td>{!! $house->view !!}</td>
                                          <td>{!! $house->type !!}</td>
                                          <td>{!! $house->target !!}</td>
                                          <td>{!! $house->status !!}</td>
                                      </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              {!! $houses->appends('')->links() !!}
                      </div>

                      <div class="tab-pane fade" id="gol">
                          
                      </div>

                    
                
                    </div>



                </div>
                  
               
              
              </div>



          </div>
        </div>
    </div>
@endsection

@section('js')
 @include('front.auth.usercenter_js')
@endsection