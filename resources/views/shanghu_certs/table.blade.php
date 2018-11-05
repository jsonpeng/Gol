<table class="table table-responsive" id="shanghuCerts-table">
    <thead>
        <tr>
        <th>商户名称</th>
        <th>营业执照</th>
        <th>店铺实图</th>
        <th>发起人</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($shanghuCerts as $shanghuCerts)
        <tr>
            <td>{!! $shanghuCerts->name !!}</td>
            <td>{!! $shanghuCerts->work_image !!}</td>
            <td>{!! $shanghuCerts->shop_image !!}</td>
            <td>{!! $shanghuCerts->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['shanghuCerts.destroy', $shanghuCerts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
          {{--           <a href="{!! route('shanghuCerts.show', [$shanghuCerts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('shanghuCerts.edit', [$shanghuCerts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>