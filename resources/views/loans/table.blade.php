<table class="table table-responsive" id="loans-table">
    <thead>
        <tr>
        <th>名称</th>
        <th>链接地址</th>
        <th>最高额度</th>
        <th>最长期限</th>
        <th>期限类型(日,月)</th>
        <th>利率</th>
        <th>申请人数</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($loans as $loans)
        <tr>
            <td>{!! $loans->name !!}</td>
            <td>{!! $loans->link !!}</td>
            <td>{!! $loans->edu_zhi !!}</td>
            <td>{!! $loans->qixian_zhi !!}</td>
            <td>{!! $loans->qixian_type !!}</td>
            <td>{!! $loans->lilv !!}</td>
            <td>{!! $loans->num !!}</td>
            <td>
                {!! Form::open(['route' => ['loans.destroy', $loans->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  {{--   <a href="{!! route('loans.show', [$loans->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('loans.edit', [$loans->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>