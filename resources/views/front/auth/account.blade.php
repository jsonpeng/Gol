@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container setting">
		<div class="common-title text-center">
			<div class="text-ch">账号设置</div>
			<h3 class="text-en">SET UP</h3>
			<div class="short-line"></div>
		</div>
		<div class="content">
			<div class="user-name">
				<div class="part">
					<div class="col-lg-1 col-md-2 col-sm-3 col-xs-3">
						用户名 :
					</div>
					<div class="col-lg-11 col-md-10 col-sm-9 col-xs-9">
						{!! $user->name !!}
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-box">
					<form class="form-inline form-username">
						<div class="col-lg-1 col-md-2 col-sm-3 "></div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
							<div class="form-group">
						    	<label for="">更换用户名 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control" id="exampleInputAmount" name="userName" placeholder="请输入用户名" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5]/g,'')">
							    </div>
							</div>
						  	<button type="button" class="btn btn-primary" id="changeName">保存</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
			<div class="user-name">
				<div class="part" style="padding:10px 0;">
					<div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" style="height:60px;line-height: 60px;">
						头像 :
					</div>
					<div class="col-lg-11 col-md-10 col-sm-9 col-xs-9">
						<img src="{{ $user->head_image }}" class="userHeadImage" alt="" width="60" height="60">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="amend-box">
					<div class="col-lg-1 col-md-2 col-sm-3"></div>
					<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 media">
						<form class="headImage">
						<div class="media-left dp_upload">
							<span class="uploadImg  "></span>
							<img src="{{asset('images/add.png')}}" alt="" class="media-object uploadImg">
							<input type="hidden" name="head_image" style="display: none;">

						</div>
						<div class="media-body media-middle" style="width:100%">
							<!-- <button type="submit" class="btn btn-primary" style="background-color: transparent;color:#008837;">上传头像</button> -->

							<button type="button" class="btn btn-primary imageSub" >保存</button>
						</div>
					</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="user-name">
				<div class="part">
					<div class="col-lg-1 col-md-2 col-sm-3 col-xs-3">
						登录邮箱 :
					</div>
					<div class="col-lg-11 col-md-10 col-sm-9 col-xs-9">
						{!! $user->email !!}
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-box">
					<form class="form-inline form-changeEmail">
						<div class="col-lg-1 col-md-2 col-sm-3 margin-bottom"></div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 margin-bottom">
						  	<div class="form-group">
						    	<label for="">新邮箱 :</label>
							    <input type="text" class="form-control" name="email" placeholder="请输入新邮箱">
							    <input type="button" class="btn btn-primary send-code" data-type="resetEmail" style="background-color: transparent;color:#008837;" value="发送验证码"/>
							</div>
						</div>
						<div class="col-lg-1 col-md-2 col-sm-3"></div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
						  	<div class="form-group">
						    	<label for="">邮箱验证码 :</label>
							    <input type="text" class="form-control" name="code" placeholder="请输入验证码">
							    <button type="button" class="btn btn-primary changeEmail">保存</button>
							</div>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
			<div class="user-name">
				<div class="part">
					<div class="col-lg-1 col-md-2 col-sm-3 col-xs-3">
						登录密码 :
					</div>
					<div class="col-lg-11 col-md-10 col-sm-9 col-xs-9">
						*******
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-box">
					<form class="form-inline form-changePassword">
						<div class="col-lg-1 col-md-2 col-sm-3 margin-bottom"></div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 margin-bottom">
						  	<div class="form-group">
						    	<label for="">当前密码 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control" name="password" placeholder="请输入原密码">
							    </div>
							</div>
						</div>
						<div class="col-lg-1 col-md-2 col-sm-3"></div>
						<div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
						  	<div class="form-group">
						    	<label for="">新密码 :</label>
							    <div class="input-group">	
							      	<input type="text" class="form-control" name="newpassword" placeholder="请输入新密码">
							    </div>
							</div>
							<button type="button" class="btn btn-primary amend-password">保存</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
  	<script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>
  	<script type="text/javascript">
	 	var myDropzone = $(document.body).dropzone({
	        url:'/ajax/upload_file',
	        thumbnailWidth: 80,
	        thumbnailHeight: 80,
	        parallelUploads: 20,
	        addRemoveLinks:false,
	        maxFiles:100,
	        autoQueue: true, 
	        previewsContainer: ".dp_upload", 
	        clickable: ".dp_upload",
	        headers: {
	         'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	        },
	        addedfile:function(file){
	            console.log(file);
	        },
	        totaluploadprogress:function(progress){
				progress=Math.round(progress);
				$('.dp_upload').find('span').text(progress+"%");

	        },
	        queuecomplete:function(progress){
	        	//console.log(progress);
	        	// $('.dp_upload').find('span').text('上传完毕√');
	        },
	        success:function(file,data){
	        	if(data.code == 0){
	            	// $('.dp_upload').find('span').text(data.message.src+',点击可替换附件文件');
	            	if(data.message.type == 'image'){
	            		$('.dp_upload').find('img').attr('src',data.message.src);
	            		$('.userHeadImage').attr('src',data.message.src);
	            	}
	            	else if(data.message.type == 'sound'){
	            		$('.dp_upload').find('audio').show().attr('src',data.message.src);
	            	}
	                else if(data.message.type == 'excel'){
	                  //  console.log($('#import_form').find('input[name=excel_path]'));
	                    // $('#import_form').find('input[name=excel_path]').val(data.message.current_src);
	                    // $('.import_class').find('button').show();
	                    //return;
	                }
	                else{
	                	$('.dp_upload').find('img').attr('src','');
	                }
	                $('.dp_upload').find('span').text('');
	            	$('.dp_upload').find('input').val(data.message.src);
	        	}
	        	else{
	        		$('.dp_upload').find('span').text('上传失败╳ ');
	        		alert('文件格式不支持!');
	        	}
	      },
	      error:function(){
	      	console.log('失败');
	      }
	  	});
  	</script>
	<script>
		$(function(){
			$('#changeName').click(function(){
				var name=$('input[name=userName]').val();
				if($.empty(name)){
					alert('请输入用户名');
					return false;
				}
				if(sumByte($('input[name=userName]'))>14||sumByte($('input[name=userName]'))<2){
					alert('账号字符数在2-14之间');
					return false;
				}
				$.zcjyRequest('/ajax/change_account',function(res){
					if(res){
						layer.msg('更改成功')
						location.reload();
					}
				},{name:name})
			});
			//替换头像
			$('.imageSub').click(function(){
				if($.empty($('input[name=head_image]').val())){
					alert('请先上传图片');
					return false;
				}
				$.zcjyRequest('/ajax/change_account',function(res){
					if(res){
						layer.msg('替换成功')
						location.reload();
					}
				},$('.headImage').serialize());
			});
			$('.changeEmail').click(function(){
				if($(this).prev().val()==''){
					alert('请输入验证码');
					return false;
				}
				$.zcjyRequest('/ajax/change_account',function(res){

				},$('.form-changeEmail').serialize())
			})
			$('.amend-password').click(function(){
				if($.empty($('input[name=password]'))||$.empty($('input[name=newpassword]'))){
					alert('请填写密码');
					return false;
				}
				if(sumByte($('input[name=newpassword]'))<6||sumByte($('input[name=newpassword]'))>20){
					alert('密码字符数在6-20之间');
					return false;
				}
				$.zcjyRequest('/ajax/change_account',function(res){
					if(res){
						layer.msg('更改成功')
						$('input[name=password]').val('');
						$('input[name=newpassword]').val('');
					}	
				},$('.form-changePassword').serialize())
			})
		});
	</script>
@endsection