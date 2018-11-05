<?php $user=auth('web')->user();?>
<div class="col-sm-2 gol_usercenter_leftnav">
          <img @if(empty($user->head_image)) src="/images/add.png @else src="{!! $user->head_image !!}" @endif" class="img_auto gol_usercenter_headimg" style="" />
          @if(Request::is('user/center/index'))
            <div class="gol_usercenter_headimg_edit mt15">编辑</div>
          @endif
          <ul>
            <li class="gol_usercenter_li @if(Request::is('user/center/index')) active @endif"><a href="/user/center/index">资产总览</a>&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li @if(Request::is('user/center/project*')) active @endif"><a href="/user/center/project">项目中心</a>&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li @if(Request::is('user/center/order')) active @endif"><a href="/user/center/order">我的交易单</a>&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li @if(Request::is('user/center/attention')) active @endif"><a href="/user/center/attention">我的关注</a>&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li @if(Request::is('user/center/notice')) active @endif"><a href="/user/center/notice">消息中心</a>&nbsp;&nbsp;&nbsp;&nbsp;></li>
            <li class="gol_usercenter_li @if(Request::is('user/center/certs*')) active @endif"><a href="/user/center/certs">实名认证</a>&nbsp;&nbsp;&nbsp;&nbsp;></li>
        
          </ul>
</div>


<div id="import_user_image_box" style="display: none;">
    <div style='width:350px; padding: 0 15px;height: 100%;'>
        <form id="import_form" class="import_class">

            <div style='width:320px;padding: 0px 0px 0px 0px;' class='form-group has-feedback' style="">
                 <label>个人简介:</label>
                 <div class="input-append " style="">
                    
                    <textarea class="form-control brief" rows="3" name="brief">{!! $user->brief !!}</textarea>

                 </div>

            </div>

            <div style='width:320px;padding: 0px 0px 0px 0px;' class='form-group has-feedback attach' style="">
                 <label>个人头像:</label>
                 <div class="input-append type_files" style="border: 1px solid #ccc; padding: 15px;">
                      @if(empty($user->head_image))
                      <a href="javascript:;"  class="btn upload_file" type="button" >请把要上传的头像拖动到这</a>
                      @else
                      <a href="javascript:;"  class="btn upload_file" type="button" >把图片拖动到这可更换头像</a>
                      @endif
                      <input type="hidden" name="head_image" value="{!! $user->head_image !!}" />
                      <img src="{!! $user->head_image !!}" style="max-width: 100px;height: auto;">
                 </div>

            </div>
          
            <button style='margin-top:5%;width:80%;margin:0 auto;margin-bottom:5%;' type='button' class='btn btn-block btn-primary ' onclick='enterImport(this)'>确定</button>
        </form>
    </div>
</div>

