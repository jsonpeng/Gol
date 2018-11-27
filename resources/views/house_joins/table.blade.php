<table class="table table-responsive" id="houseJoins-table">
    <thead>
        <tr>
        {{-- <th>订单号</th> --}}
        <th>支持小屋</th>
        <th>支持人</th>

        <th>购买档位</th>
        <th>购买数量</th>
        <th>订单描述</th>

        <th>合计支持金额</th>
        <th>支付平台</th>
        <th>支付状态</th>
        <th>是否需要合同</th>
        <th>支持时间</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($houseJoins as $houseJoin)
    <?php $user = optional($houseJoin->user); ?>
        <tr>
            {{-- <td>{!! $houseJoin->number !!}</td> --}}
            <td>{!! optional($houseJoin->house)->name !!}</td>
            <td>{!! a_link($user->name, route('users.show', [$user->id]),'orange',false) !!}</td>

            <td>{!! $houseJoin->gear !!}</td>
            <td>{!! $houseJoin->gear_num !!}</td>
            <td>{!! $houseJoin->body !!}</td>

            <td>{!! $houseJoin->price !!}</td>
            <td>{!! $houseJoin->pay_platform !!}</td>
            <td>{!! $houseJoin->pay_status !!}</td>
            <td>{!! $houseJoin->hetong !!}</td>
            <td>{!! $houseJoin->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['houseJoins.destroy', $houseJoin->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                 {{--    <a href="{!! route('houseJoins.show', [$houseJoin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('houseJoins.edit', [$houseJoin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>