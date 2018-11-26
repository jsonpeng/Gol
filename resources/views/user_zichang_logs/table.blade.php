<table class="table table-responsive" id="userZichangLogs-table">
    <thead>
        <tr>
        <th>订单号</th>
        <th>类型</th>
        <th>发起人</th>
        <th>核对发起人姓名</th>
        <th>核对发起人账号</th>
        <th>发起平台</th>
        <th>变化</th>
        <th>状态</th>
   
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($userZichangLogs as $userZichangLog)
        <tr>
            <td>{!! $userZichangLog->number !!}</td>
            <td>{!! $userZichangLog->type !!}</td>
            <td>{!! optional($userZichangLog->user)->name !!}</td>
            <td>{!! $userZichangLog->name !!}</td>
            <td>{!! $userZichangLog->account !!}</td>
            <td>{!! $userZichangLog->pay_type !!}</td>
            <td>{!! $userZichangLog->change !!}</td>
            <td>{!! $userZichangLog->status !!}</td>
            <td>
              
                <div class='btn-group'>
             <!--        <a href="{!! route('userZichangLogs.show', [$userZichangLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    @if($userZichangLog->type=='转出' && $userZichangLog->status =='处理中')
                        {!! Form::model($userZichangLog, ['route' => ['userZichangLogs.update', $userZichangLog->id], 'method' => 'patch']) !!}
                            <a href="javascript:;" onclick="$(this).parent().submit();" class='btn btn-default btn-xs'>手工核对打款</a>
                            <input type="hidden" name="status" value="处理完成" />
                        {!! Form::close() !!}
                    @endif
                    {!! Form::open(['route' => ['userZichangLogs.destroy', $userZichangLog->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗,删除后用户个人中心将无法查看对应记录?')"]) !!}
                      {!! Form::close() !!}

                </div>
              
            </td>
        </tr>
    @endforeach
    </tbody>
</table>