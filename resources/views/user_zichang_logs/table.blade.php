<table class="table table-responsive" id="userZichangLogs-table">
    <thead>
        <tr>
        <th>订单号</th>
        <th>发起人</th>
        <th>变化</th>
        <th>状态</th>
        <th>类型</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($userZichangLogs as $userZichangLog)
        <tr>
            <td>{!! $userZichangLog->number !!}</td>
            <td>{!! $userZichangLog->user_id !!}</td>
            <td>{!! $userZichangLog->change !!}</td>
            <td>{!! $userZichangLog->status !!}</td>
            <td>{!! $userZichangLog->type !!}</td>
            <td>
                {!! Form::open(['route' => ['userZichangLogs.destroy', $userZichangLog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
             <!--        <a href="{!! route('userZichangLogs.show', [$userZichangLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('userZichangLogs.edit', [$userZichangLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>