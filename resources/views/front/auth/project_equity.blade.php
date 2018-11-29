@extends('front.partial.base')

@section('css')
<link rel="stylesheet" href="{{ asset('fullcalendar/dist/fullcalendar.min.css') }}">
<style type="text/css">
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
	<title>{!! getSettingValueByKey('name') !!}|我的权益</title>
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
          			<div class="text-ch pt30"><a class="f16" href="/user/center/project">项目中心</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="f16" href="/user/center/project/equity">我的权益</a></div>
          			<h3 class="text-en">My Equity</h3>
          			<div class="short-line"></div>
          		</div>

                <div class="content pb220">

                  <div id="myTabContent" class="tab-content ">

                      <div class="mt30 pb10 f16" style="border-bottom: 1px solid #ddd;">
                          权益日历
                      </div>
             
                       <div class="mt30" id="calendar"></div>

                  </div>

                  </div>

                </div>
                  
               
              
            </div>



          </div>
        </div>
    </div>

    <div class="gol_choose_role" style="display: none;">
        <div class="row mt30">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-4">
            <a class="f16" href="/user/center/project/hourse_index">我要开小屋</a>
          </div>
          <div class="col-sm-4">
            <a class="f16" href="/user/center/project/gol_index">我是商户</a>
          </div>
        </div>
    </div>

      <div class="layer-hidden-line" id="equity_form">
        <form role="form" class="container m-t-form" >

            <div class="row mt30">
              <div class="col-sm-2"></div>
              <div class="col-sm-6 ">
                <label>请设置权益安排:</label>
                <select class=" form-control" name="type">
                  <option value="权益日">权益日</option>
                  <option value="休息日">休息日</option>
                  <option value="特权日">特权日</option>
                </select>
              </div>
            </div>

            <div class="row mt30">
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
                <label>安排日期:</label>
                <input name="time" value="" class="form-control col-sm-6" />
              </div>
            </div>

            <div class="row mt30">
               <div class="col-sm-2"></div>
               <div class="btn btn-success col-sm-1 equity_action" style="background-color:#FF5511;border: none;">添加</div>
               <div class="btn btn-danger col-sm-1 equity_delete" style="margin-left: 15px;" data-id="">删除</div>
             </div>

        </form>
    </div>
@endsection


@section('js')
 @include('front.auth.usercenter_js')
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
        var theDate = date.format('YYYY-MM-DD');
        console.log(theDate);
        openEditLayer(theDate);
      },
      eventClick:function(event, jsEvent, view){//当点击日历中的某一日程（事件）时，触发此操作
            openEditLayer(event.time,'edit',event.title,event.e_id);
      }
    });
    initEvents();
  })

  var actions;
  var action_id;
  function openEditLayer(date,action='create',type=null,id=null){
    var title = '<i class="fa fa-plus"></i>&nbsp;添加日程';
    var action_text = '添加';
    if(action == 'create'){
      $('#equity_form').find('.equity_delete').hide();
      $('#equity_form').find('.equity_action').data('action',action);
      actions = 'create';
    }
    else{
        title = '<i class="fa fa-edit"></i>&nbsp;编辑日程';
        action_text = '确定修改';
        $('#equity_form').find('select').find('option[value='+type+']').attr('selected',true);
        $('#equity_form').find('.equity_action').data('id',id);
        $('#equity_form').find('.equity_delete').show();
        $('#equity_form').find('.equity_delete').data('id',id);
        action_id = id;
        actions = 'edit';
    }
    $('#equity_form').find('.equity_action').text(action_text).data('action',action);
    $('#equity_form').find('input[name=time]').attr('value',date).attr('readonly','readonly');
    $.zcjyFrameOpen($('#equity_form').html(),title,['60%', '320px']);
  } 

  //初始化事件
  function initEvents(){
    layer.closeAll();
    var events =     [

    ];
    $.zcjyRequest('/ajax/equity/all',function(res){
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

  $(document).on('click','.equity_action',function(){
      var that = this;
    //添加
     if(actions == 'create'){
        $.zcjyRequest('/ajax/equity/add',function(res){
          if(res){
            $.alert(res);
            initEvents();
          }
        },$(that).parent().parent().serialize(),'POST');
     }
     else{
       //更新
       $.zcjyRequest('/ajax/equity/update/'+action_id,function(res){
          if(res){
            $.alert(res);
            initEvents();
          }
        },$(that).parent().parent().serialize(),'POST');
    }
  });


  $(document).on('click','.equity_delete',function(){
     $.zcjyRequest('/ajax/equity/delete/'+action_id,function(res){
          if(res){
            $.alert(res);
            initEvents();
          }
    },{},'POST');
  });

</script>
@endsection