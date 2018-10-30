<table class="table table-responsive" id="houses-table">
    <thead>
        <tr>
        <th>小屋名称</th>
        <th>小屋地址</th>
        <th>浏览量</th>
        <th>档位</th>
        <th>小屋类型</th>
        <th>目标(万)</th>
        <th>状态</th>
        <th>截止时间</th>
        <th>发布时间</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($houses as $house)
        <tr>
            <td>{!! $house->name !!}</td>
            <td>{!! $house->address !!}</td>
            <td>{!! $house->view !!}</td>
            <td>{!! $house->gear !!}</td>
            <td>{!! $house->type !!}</td>
            <td>{!! $house->target !!}</td>
            <td>{!! $house->status !!}</td>
            <td>{!! $house->endtime !!}</td>
            <td>{!! $house->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['houses.destroy', $house->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   <a href="/manyDetail/{!! $house->id !!}"  target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('houses.edit', [$house->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
          {{--           {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!} --}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>