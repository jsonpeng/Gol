<table class="table table-responsive" id="userEquities-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Type</th>
        <th>Time</th>
        <th>Content</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($userEquities as $userEquity)
        <tr>
            <td>{!! $userEquity->user_id !!}</td>
            <td>{!! $userEquity->type !!}</td>
            <td>{!! $userEquity->time !!}</td>
            <td>{!! $userEquity->content !!}</td>
            <td>
                {!! Form::open(['route' => ['userEquities.destroy', $userEquity->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userEquities.show', [$userEquity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userEquities.edit', [$userEquity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>