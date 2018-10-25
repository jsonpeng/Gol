<table class="table table-responsive" id="gols-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Image</th>
        <th>Brief</th>
        <th>Content</th>
        <th>Xukezheng</th>
        <th>Zuqi</th>
        <th>Area</th>
        <th>Address</th>
        <th>Hourse Status</th>
        <th>Gaizao Status</th>
        <th>Publish Status</th>
        <th>Price</th>
        <th>Give Word</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($gols as $gol)
        <tr>
            <td>{!! $gol->name !!}</td>
            <td>{!! $gol->image !!}</td>
            <td>{!! $gol->brief !!}</td>
            <td>{!! $gol->content !!}</td>
            <td>{!! $gol->xukezheng !!}</td>
            <td>{!! $gol->zuqi !!}</td>
            <td>{!! $gol->area !!}</td>
            <td>{!! $gol->address !!}</td>
            <td>{!! $gol->hourse_status !!}</td>
            <td>{!! $gol->gaizao_status !!}</td>
            <td>{!! $gol->publish_status !!}</td>
            <td>{!! $gol->price !!}</td>
            <td>{!! $gol->give_word !!}</td>
            <td>
                {!! Form::open(['route' => ['gols.destroy', $gol->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('gols.show', [$gol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('gols.edit', [$gol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>