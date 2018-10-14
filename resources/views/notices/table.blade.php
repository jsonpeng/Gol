<table class="table table-responsive" id="notices-table">
    <thead>
        <tr>
            <th>Content</th>
        <th>Link</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notices as $notices)
        <tr>
            <td>{!! $notices->content !!}</td>
            <td>{!! $notices->link !!}</td>
            <td>{!! $notices->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['notices.destroy', $notices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notices.show', [$notices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('notices.edit', [$notices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>