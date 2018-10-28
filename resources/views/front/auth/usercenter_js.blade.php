
<script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>
<script type="text/javascript">
    //上传头像
    $('.gol_usercenter_headimg').click(function(){
        layer.open({
            type: 1,
            closeBtn: false,
            shift: 7,
            shadeClose: true,
            title:'请把要上传的头像拖动到这',
            content: $('#import_user_image_box').html()
        });
    });
    var head_image;
    var myDropzone = $(document.body).dropzone({
        url:'/ajax/upload_file',
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        addRemoveLinks:false,
        maxFiles:100,
        autoQueue: true, 
        previewsContainer: ".attach", 
        clickable: ".type_files",
        headers: {
         'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        addedfile:function(file){
            console.log(file);
        },
        totaluploadprogress:function(progress){
            progress=Math.round(progress);
            click_dom.find('a').text(progress+"%");

        },
        queuecomplete:function(progress){
            console.log(progress);
            click_dom.find('a').text('上传完毕√');
        },
        success:function(file,data){
            if(data.code == 0){
                console.log('上传成功:'+data.message.src);
                if(data.message.type == 'image'){
                    click_dom.find('input').val(data.message.src);
                    click_dom.find('img').attr('src',data.message.src);
                    head_image = data.message.src;
                }
                else if(data.message.type == 'sound'){
                   
                }
                else if(data.message.type == 'excel'){
                 
                  
                }
            
          
            }
            else{
                click_dom.find('a').text('上传失败╳ ');
                alert('文件格式不支持!');
            }
      },
      error:function(){
        console.log('失败');
      }
    });

    var click_dom;
    $(document).on('click','.type_files',function(){
        click_dom = $(this);
        // $('input[type=file]').trigger('click');
    });


    function enterImport(obj){
        $.zcjyRequest('/ajax/update_user',function(res){
            if(res){
                $.alert('上传更新成功');
                layer.closeAll();
                $('.gol_usercenter_headimg').attr('src',head_image);
            }
        },$($(obj).parent()).serialize(),'POST');
    }
</script>
