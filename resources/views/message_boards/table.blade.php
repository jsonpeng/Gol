<table class="table table-responsive" id="messageBoards-table">
    <thead>
        <tr>
        <th>留言内容</th>
        <th>赞</th>
        <th>留言人</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($messageBoards as $messageBoard)
        <tr>
            <td>{!! $messageBoard->content !!}</td>
            <td>{!! $messageBoard->zan !!}</td>
            <td>{!! optional($messageBoard->user()->first())->name !!}</td>
            <td>
                {!! Form::open(['route' => ['messageBoards.destroy', $messageBoard->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
               {{--      <a href="{!! route('messageBoards.show', [$messageBoard->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                  {{--   <a href="{!! route('messageBoards.edit', [$messageBoard->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>