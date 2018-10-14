<table class="table table-responsive" id="houses-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Address</th>
        <th>Content</th>
        <th>View</th>
        <th>Gear</th>
        <th>Type</th>
        <th>Target</th>
        <th>Status</th>
        <th>Endtime</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($houses as $house)
        <tr>
            <td>{!! $house->name !!}</td>
            <td>{!! $house->address !!}</td>
            <td>{!! $house->content !!}</td>
            <td>{!! $house->view !!}</td>
            <td>{!! $house->gear !!}</td>
            <td>{!! $house->type !!}</td>
            <td>{!! $house->target !!}</td>
            <td>{!! $house->status !!}</td>
            <td>{!! $house->endtime !!}</td>
            <td>
                {!! Form::open(['route' => ['houses.destroy', $house->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('houses.show', [$house->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('houses.edit', [$house->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>