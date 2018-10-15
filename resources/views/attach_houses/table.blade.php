<table class="table table-responsive" id="attachHouses-table">
    <thead>
        <tr>
            <th>House Id</th>
        <th>Key</th>
        <th>Value</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attachHouses as $attachHouse)
        <tr>
            <td>{!! $attachHouse->house_id !!}</td>
            <td>{!! $attachHouse->key !!}</td>
            <td>{!! $attachHouse->value !!}</td>
            <td>
                {!! Form::open(['route' => ['attachHouses.destroy', $attachHouse->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('attachHouses.show', [$attachHouse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('attachHouses.edit', [$attachHouse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>