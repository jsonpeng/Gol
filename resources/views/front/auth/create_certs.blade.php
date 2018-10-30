@extends('front.partial.base')

@section('css')
<style type="text/css">

</style>
@endsection

@section('seo')
    <title>{!! getSettingValueByKey('name') !!}-发起认证</title>
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
        
            <div class="common-title text-center">
                <div class="text-ch pt30">发起实名认证</div>
                <h3 class="text-en">Create CERTS</h3>
                <div class="short-line"></div>
            </div>

            <form class="cert-form">
           
                <div class="form-group col-sm-9">
                                  {!! Form::label('name', '请填写真实姓名:') !!}
                                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                
                <div class="form-group col-sm-9">
                                  {!! Form::label('id_card', '请输入身份证号码:') !!}
                                  {!! Form::text('id_card', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-9 phoneNum">
                                  {!! Form::label('mobile', '请输入手机号:') !!}
                                  {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                                  <div class="weui-cell__ft getCode" data-abled="1">获取验证码</div>
                </div>
                
                <div class="verificationCode form-group col-sm-9">
                                  {!! Form::label('code', '请输入验证码:') !!}
                                  {!! Form::text('code', null, ['class' => 'form-control']) !!}
                </div>
           
          
                <div class="form-group col-sm-12 postImg ">
                      {!! Form::label('code', '上传身份证照片:') !!}
                      <div class="row idCardImg">

                          <div class="cardImgItem col-sm-4">
                             <input type="hidden" class="current_src form-control" name="current_image_src[]" value="" />
                            <div class="type_files attach">
                              <input type="hidden" name="face_image" value="" />
                              <img src="{{ asset('images/trade/front.jpg') }}"  class="img_auto" style="max-height: 200px;"  alt="">
                            </div>
                          </div>

                          <div class="cardImgItem col-sm-4">
                            <input type="hidden" class="current_src form-control" name="current_image_src[]" value="" />
                          <div class=" type_files ">
                            <input type="hidden" name="back_image" value="" />
                            <img src="{{ asset('images/trade/back.jpg') }}"  class="img_auto" style="max-height: 200px;" alt="">
                          </div>
                          </div>

                            <div class="row idCardImg">
                                <input type="hidden" class="current_src" name="current_image_src[]" value="" />
                                <div class="col-sm-4 cardImgItem handImage type_files">
                                  <input type="hidden" name="hand_image" value="" />
                                  <img src="{{ asset('images/trade/hold.jpg') }}"  class="img_auto" style="max-height: 200px;" alt="">
                                </div>
                              {{--   <div class="col-sm-6 cardImgItem tackphoto type_files">
                                  <img src="{{ asset('images/trade/camare.jpg') }}" alt="">
                                </div> --}}
                            </div>

                      </div>
              
                </div>

    

                <div class=" form-group col-sm-12 imgRequire">
                      {!! Form::label('code', '拍摄要求:') !!}
              
                      <div class="row wrongImg">
                          <div class="col-sm-3 wrongImgItem">
                              <img src="{{ asset('images/trade/require1.jpg') }}" alt="">
                          </div>
                          <div class="col-sm-3 wrongImgItem">
                              <img src="{{ asset('images/trade/require2.jpg') }}" alt="">
                          </div>
                          <div class="col-sm-3 wrongImgItem">
                              <img src="{{ asset('images/trade/require3.jpg') }}" alt="">
                          </div>
                          <div class="col-sm-3 wrongImgItem">
                              <img src="{{ asset('images/trade/require4.jpg') }}" alt="">
                          </div>
                      </div>
                
                </div>

                   <div class="form-group col-sm-12">
                                  {!! Form::button('提交审核', ['class' => 'btn btn-primary btn_bottom']) !!}
                                  <a href="/user/center/certs" class="btn btn-default">返回</a>
                    </div>

              </form>

        </div>
     </div>
  </div>
@endsection

@section('js')
  @include('front.auth.usercenter_js')
  <script type="text/javascript">
        //表单提交验证
    function formVarified(){
      $('.btn_bottom').removeClass('disabled').removeAttr('disabled');
      $.inputAttr('name,id_card,mobile,code,face_image,back_image,hand_image').each(function(){
          if($.empty($(this).val())){
            //console.log($(this));
            $('.btn_bottom').addClass('disabled').attr('disabled','true');
          }
      });
    }
    formVarified();
    //输入姓名身份证号
    $.inputAttr('name,id_card,mobile,code').keyup(function(){
          formVarified();

    });
    //获取验证码
    $('.getCode').click(function(){
        var mobile = $('input[name=mobile]').val(); 
        if($.empty(mobile)){
          alert('请先输入手机号');
          return false;
        }
        if($(this).data('abled')){
          $.zcjyRequest('/ajax/send_mobile_code',function(res){
              if(res){
                  time();
              }
          },{mobile:mobile},'POST');
        }
    });

    var wait=60;
    function time() {
            var o = $('.getCode');
            if (wait == 0) {
                o.removeClass('disable');
                o.data("abled",1);   
                o.text("获取验证码");
                wait = 60;
            } 
            else { 
                o.addClass('disable');
                o.data("abled",0); 
                o.text("重新发送(" + wait + ")");
                wait--;
                setTimeout(function() {
                    time()
                }, 1000)
            }
    }

    //点击提交审核
    $('.btn_bottom').click(function(){
      $.zcjyRequest('/ajax/certs/publish',function(res){
          if(res){
            $.alert(res);
            location.href="/user/center/certs";
          }
      },$('.cert-form').serialize(),'POST');
    });
  </script>
@endsection