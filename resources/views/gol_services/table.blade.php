<table class="table table-responsive" id="golServices-table">
    <thead>
        <tr>
        <th>组</th>
        <th>名称</th>
        <th>图标</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($golServices as $golServices)
        <tr>
            <td>{!! $golServices->group !!}</td>
            <td>{!! $golServices->name !!}</td>
            <td>{!! $golServices->image !!}</td>
            <td>
                {!! Form::open(['route' => ['golServices.destroy', $golServices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
             {{--        <a href="{!! route('golServices.show', [$golServices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('golServices.edit', [$golServices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>