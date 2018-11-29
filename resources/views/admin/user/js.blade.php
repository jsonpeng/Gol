@section('scripts')
    <script type="text/javascript">
        //发送消息
     $('.authMessage').click(function(){
       var userid=$(this).data('id');
       var username = $(this).data('name');
        layer.open({
        type: 1,
        closeBtn: false,
        shift: 7,
        shadeClose: true,
        shade: 0.8,
        area: ['30%', '280px'],
        title:'发送消息给'+username,
        content: "<div style='padding: 0 15px;'><div class='content' style='min-width: 100%;min-height: 200px;'><div class='ui message hide'></div><div class='field'><textarea class='form-control message-textarea' rows='6' maxlength='255' onkeyup='messageInput(this)' placeholder='请在这里输入内容'></textarea></div></div><div class='actions pull-right' style='    margin-bottom: 15px;'><div onclick='cancleMessage()' style='    display: inline-block;'>取消</div><button disabled='true'  class='message' onclick='sendMessage("+userid+")'>发送</button></div></div>"
         });
     });



     //取消
     function cancleMessage(){
      console.log('取消');
      layer.closeAll();
     }

     //输入框监听事件
     function messageInput(obj){
      var value = $(obj).val();
      if(value.length > 0){
        $('.message').addClass('message-active');
        $('.message').removeAttr('disabled');
      }
      else{
        $('.message').removeClass('message-active');
        $('.message').attr('disabled','true');
      }
     }

     //发送消息给用户
     function sendMessage(userid){
          $.zcjyRequest('/ajax/send_notice/'+userid,function(res){
              if(res){
                  layer.closeAll();
                  layer.msg(res, {
                    icon: 1,
                    skin: 'layer-ext-moon' 
                    });
              }
          },{content:$('.message-textarea').val()},'POST');
     }

     //发送群组消息
     $('.group-notices').click(function(){
       layer.open({
        type: 1,
        closeBtn: false,
        shift: 7,
        shadeClose: true,
        shade: 0.8,
        area: ['30%', '280px'],
        title:'发送消息给当前所有用户',
        content: "<div style='padding: 0 15px;'><div class='content' style='min-width: 100%;min-height: 200px;'><div class='ui message hide'></div><div class='field'><textarea class='form-control message-textarea' rows='6' maxlength='255' onkeyup='messageInput(this)' placeholder='请在这里输入内容'></textarea></div></div><div class='actions pull-right' style='    margin-bottom: 15px;'><div onclick='cancleMessage()' style='    display: inline-block;'>取消</div><button disabled='true'  class='message' onclick='sendGroupMessage()'>发送</button></div></div>"
         });
     });

     //发送群组消息
     function sendGroupMessage(){
        $.zcjyRequest('/ajax/send_group_notice',function(res){
              if(res){
                  layer.closeAll();
                  layer.msg(res, {
                    icon: 1,
                    skin: 'layer-ext-moon' 
                    });
              }
          },{content:$('.message-textarea').val()},'POST');
     }
    </script>

  @if(isset($user))
    <script src="{{ asset('moment/moment.js') }}"></script>
    <script src="{{ asset('fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script>
      $(function () {
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
        $('#calendar').fullCalendar({
          header    : {
            left  : 'prev,next today',
            center: 'title',
            right:'下个月'
            // right : 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: '返回今天',
            month: '月',
            week : '周',
            day  : '日'
          },
          monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
          monthNamesShort:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
          dayNamesShort:['周日','周一','周二','周三','周四','周五','周六'],
          //Random default events
          events    : [
          ],
          editable  : false,
          droppable : false, // this allows things to be dropped onto the calendar !!!
          dayClick: function(date, allDay, jsEvent, view) {//当单击日历中的某一天时，触发callback
      
          },
          eventClick:function(event, jsEvent, view){//当点击日历中的某一日程（事件）时，触发此操作
              
          }
        });
        initEvents();
      })

      //初始化事件
      function initEvents(){
        layer.closeAll();
        var events =     [

        ];
        $.zcjyRequest('/ajax/equity/all/{{ $user->id }}',function(res){
          if(res){
            if(res.length){
              for (var i = res.length -1; i >= 0; i--) {
                  events.push({
                    e_id           : res[i]['id'],
                    time           : res[i]['time'],
                    title          : res[i]['type'],
                    //月份要减去1
                    start          : new Date(res[i]['Y'], res[i]['m'], res[i]['d']),
                    allDay         : true,
                    backgroundColor: res[i]['color'],
                    borderColor    : res[i]['color']
                  });
              }
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', events);
            $('#calendar').fullCalendar('refetchEvents');
            }
          }
        },{},'POST');
      }

    </script>
  @endif
  
@endsection