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
          			<div class="text-ch pt30">添加小屋</div>
          			<h3 class="text-en">Create Hourse</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb120">
                    <div class="row">
                            <form >
                              <!-- Name Field -->
                              <div class="form-group col-sm-9">
                                  {!! Form::label('name', '小屋名称:') !!}
                                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
                              </div>

                              <!-- Type Field -->
                              <div class="form-group col-sm-9">
                                  {!! Form::label('type', '小屋类型:') !!}
                                  <select class="form-control" id="type" name="type">
                                    <option value="青旅">青旅</option>
                                    <option value="客栈">客栈</option>
                                    <option value="民宿">民宿</option>
                                    <option value="空间">空间</option>
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
                                  {!! Form::label('address', '小屋地址:') !!}
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


                              <div class="form-group col-sm-8">
                                    {!! Form::label('plan_address', '小屋计划书:') !!}

                                    <div class="input-append type_files">
                                        {!! Form::text('plan_address', null, ['class' => 'form-control', 'id' => 'plan_address']) !!}
                                        <a  href="javascript:;" class="btn  upload_file" type="button">选择文件</a>
                                    </div>
                              </div>


                              <!-- Content Field -->
                              <div class="form-group col-sm-12 col-lg-12">
                                  {!! Form::label('content', '小屋详情:') !!}
                                  {!! Form::textarea('content', null, ['class' => 'form-control intro']) !!}
                              </div>

                              <!-- Gear Field -->
                              <div class="form-group col-sm-6">
                                  {!! Form::label('gear', '档位:(多个用空格分隔)') !!}
                                  {!! Form::textarea('gear', null, ['class' => 'form-control']) !!}
                              </div>

                              <!-- Target Field -->
                              <div class="form-group col-sm-6">
                                  {!! Form::label('target', '目标金额:(万)') !!}
                                  {!! Form::number('target', null, ['class' => 'form-control']) !!}
                              </div>

                              <div class="form-group col-sm-8" >
                                      {!! Form::label('endtime', '结束时间:') !!}
                                      <div class='input-group date' id='time_end'>
                                          {!! Form::text('endtime', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                      </div>
                                </div>

                              <!-- Submit Field -->
                              <div class="form-group col-sm-12">
                                  {!! Form::button('保存', ['class' => 'btn btn-primary gol_house_save_btn']) !!}
                                  <a href="/user/center/project/hourse_index" class="btn btn-default">返回</a>
                              </div>
                            </form>
                    </div>
                  
                </div>
                  
               
              
              </div>



          </div>
        </div>
    </div>

 @include('admin.partial.imagemodel')

@endsection


@section('js')
  @include('front.auth.usercenter_js')
  @include('front.auth.tinymce_js')
  <script type="text/javascript">
  $('#time_end').datepicker({
        format: "yyyy-mm-dd",
        language: "zh-CN",
        todayHighlight: true
    });
  $('.gol_house_save_btn').click(function(){
      tinyMCE.triggerSave();
      if($.varifyInput('name,target,address,endtime')){
          return ;
      }
      $.zcjyRequest('/ajax/auth_house_publish',function(res){
          if(res){
            $.alert(res);
            location.href="/user/center/project/hourse_index";
          }
      },$('form').serialize(),'POST');
  });
  </script>
@endsection