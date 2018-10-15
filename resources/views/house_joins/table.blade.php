<table class="table table-responsive" id="houseJoins-table">
    <thead>
        <tr>
            <th>House Id</th>
        <th>User Id</th>
        <th>Price</th>
        <th>Number</th>
        <th>Pay Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($houseJoins as $houseJoin)
        <tr>
            <td>{!! $houseJoin->house_id !!}</td>
            <td>{!! $houseJoin->user_id !!}</td>
            <td>{!! $houseJoin->price !!}</td>
            <td>{!! $houseJoin->number !!}</td>
            <td>{!! $houseJoin->pay_status !!}</td>
            <td>
                {!! Form::open(['route' => ['houseJoins.destroy', $houseJoin->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('houseJoins.show', [$houseJoin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('houseJoins.edit', [$houseJoin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>