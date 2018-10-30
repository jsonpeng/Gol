<table class="table table-responsive" id="attentionGols-table">
    <thead>
        <tr>
            <th>Gol Id</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attentionGols as $attentionGol)
        <tr>
            <td>{!! $attentionGol->gol_id !!}</td>
            <td>{!! $attentionGol->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['attentionGols.destroy', $attentionGol->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('attentionGols.show', [$attentionGol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('attentionGols.edit', [$attentionGol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>