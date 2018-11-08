@extends('front.partial.base')

@section('css')
<style type="text/css">
  .active{
    background: #FF5511 !important;
    color: white !important;
  }
</style>
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
          			<div class="text-ch pt30">添加小屋</div>
          			<h3 class="text-en">Create Gol</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb120">
                    <form>
                     <div class="row">

                        <!-- Name Field -->
                        <div class="form-group col-sm-9">
                            {!! Form::label('name', '名称:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-9">
                                  {!! Form::label('type', 'gol类型:') !!}
                                  <select class="form-control" id="type" name="type">
                                    <option value="青旅">青旅</option>
                                    <option value="客栈">客栈</option>
                                    <option value="民宿">民宿</option>
                                    <option value="空间">空间</option>
                                  </select>
                        </div>

                        <div class="form-group col-sm-9">
                                  {!! Form::label('hourse_type', 'gol房屋类型:') !!}
                                  <select class="form-control"  name="hourse_type">
                                    <option value="出租">我要出租</option>
                                    <option value="转让">我要转让</option>
                                    <option value="出售">我要出售</option>
                                  </select>
                        </div>


                        <div class="form-group col-sm-9">
                           {!! Form::label('type', '设置地区:') !!}
                        </div>

                        <div class="form-group group col-sm-4">
                            <select name="province" id="province" class="form-control">
                                <option value="0" @if(empty($project)) selected="selected" @endif>请选择省份</option>
                                @foreach($cities_level1 as $item)
                                    <option value="{!! $item->id !!}" @if(!empty($project)) @if($project->province==$item->id) selected="selected" @endif @endif>{!! $item->name !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group group col-sm-4">
                            <select  name="city" id="city" class="form-control">
                                    <option value="0" @if(empty($project)) selected="selected" @endif>请选择城市</option>
                                    @foreach ($cities_level2 as $item)
                                        <option value="{!! $item->id !!}" @if(!empty($project)) @if($project->city==$item->id) selected="selected" @endif @endif>{!! $item->name !!}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group group col-sm-4">
                            <select  name="district"  id="district"  data-type="project" class="form-control">
                                    <option value="0" @if(empty($project)) selected="selected" @endif>请选择区域</option>
                                    @foreach ($cities_level3 as $item)
                                        <option value="{!! $item->id !!}" @if(!empty($project)) @if($project->district==$item->id) selected="selected" @endif @endif>{!! $item->name !!}</option>
                                    @endforeach
                            </select>
                        </div>

                        <!-- Address Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('address', '地址:') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12 map" style="margin: 0 auto;display: none;">
                                <div id="allmap" style="height: 300px;"></div>
                        </div>

                        <div class="form-group col-sm-8">
                                    {!! Form::label('image', '项目主图:') !!}

                                    <div class="input-append type_files">
                                        {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
                                        <a  href="javascript:;" class="btn  upload_file" type="button">选择图片</a>
                                        <img src="" style="max-width: 100%; max-height: 150px; display: block;">
                                    </div>
                        </div>

                        <!-- Brief Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('brief', '简介:') !!}
                            {!! Form::textarea('brief', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Content Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('content', '详情:') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control intro']) !!}
                        </div>

                        <div class="form-group col-sm-9">
                            {!! Form::label('services', '请选择服务设施添加:') !!}
                            <div class="row">
                              @if(count($services))
                                @foreach ($services as $item)
                                  <button type="button" class="col-sm-3 btn
                                    btn-default gol_services">
                                    {!! $item->name !!}
                                </button>
                                @endforeach
                              @endif
                              <input name="services" type="hidden" value="" />
                            </div>
                        </div>

                        <!-- Xukezheng Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('xukezheng', '有无许可证（没有的话不填）:') !!}
                              <div class="input-append type_files">
                                        {!! Form::text('xukezheng', null, ['class' => 'form-control', 'id' => 'xukezheng']) !!}
                                        <a  href="javascript:;" class="btn  upload_file" type="button">上传许可证</a>
                                        <img src="" style="max-width: 100%; max-height: 150px; display: block;">
                                    </div>
                            <!-- {!! Form::text('xukezheng', null, ['class' => 'form-control']) !!} -->
                        </div>

                        <!-- Zuqi Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('zuqi', '租期:(年)') !!}
                            {!! Form::number('zuqi', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Area Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('area', '房屋面积:(m2)') !!}
                            {!! Form::text('area', null, ['class' => 'form-control']) !!}
                        </div>


                        <!-- Hourse Status Field -->
                     <!--    <div class="form-group col-sm-8">
                            {!! Form::label('hourse_status', '房屋状态:') !!}
                            {!! Form::text('hourse_status', null, ['class' => 'form-control']) !!}
                        </div> -->

                        <div class="form-group col-sm-8">
                                  {!! Form::label('gaizao_status', '房屋状态:') !!}
                                  <select class="form-control" id="gaizao_status" name="gaizao_status">
                                    <option value="轻微">轻微</option>
                                    <option value="中等">中等</option>
                                  </select>
                        </div>


                        <!-- Price Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('price', '价格:(元)') !!}
                            {!! Form::text('price', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Give Word Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('give_word', '给小屋新主留下来的话:') !!}
                            {!! Form::textarea('give_word', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::button('保存', ['class' => 'btn btn-primary gol_publish_btn']) !!}
                            <a href="/user/center/project" class="btn btn-default">返回</a>
                        </div>

                     </div>
                    </form>
                </div>
                  
              </div>

          </div>
        </div>
    </div>


@endsection


@section('js')
  @include('front.auth.usercenter_js')
  @include('front.auth.tinymce_js')
<script type="text/javascript">
  $('.gol_publish_btn').click(function(){
      tinyMCE.triggerSave();
      if($.varifyInput('name,address,zuqi,area,price')){
          return ;
      }
      dealWithActiveServices();
      $.zcjyRequest('/ajax/auth_gol_publish',function(res){
            if(res){
                $.alert(res);
                location.href="/user/center/project/gol_index";
            }
      },$('form').serialize(),'POST');
  });
  $('.gol_services').click(function(){
    $(this).toggleClass('active');
  });
  //处理选中的设施
  function dealWithActiveServices(){
    var services = [];
    $('.gol_services').each(function(){
       if($(this).hasClass('active')){
        services.push($(this).text());
      }
    });
    $('input[name=services]').val(services);
  }
</script>
@endsection