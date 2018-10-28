<table class="table table-responsive" id="gols-table">
    <thead>
        <tr>
        <th>名称</th>
        <th>主图</th>
  <!--       <th>Brief</th>
        <th>Content</th> -->
        <th>有无许可证</th>
        <th>租期(年)</th>
        <th>面积(m2)</th>
        <th>地址</th>
        <th>小屋状态</th>
        <th>改造状态</th>
        <th>发布状态</th>
        <th>价格</th>
   <!--      <th>Give Word</th> -->
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
             @foreach($gols as $gol)
                                <tr>
                                    <td>{!! $gol->name !!}</td>
                                    <td><img src="{!! $gol->image !!}" style="max-width: 80px;height: auto;" /></td>
                                    <td>{!! $gol->xukezheng ? $gol->xukezheng : '无' !!}</td>
                                    <td>{!! $gol->zuqi !!}</td>
                                    <td>{!! $gol->area !!}</td>
                                    <td>{!! $gol->address !!}</td>
                                    <td>{!! $gol->hourse_status !!}</td>
                                    <td>{!! $gol->gaizao_status !!}</td>
                                    <td>{!! $gol->fabuStatus !!}</td>
                                    <td>{!! $gol->price !!}</td>
                                        <td>
                                            {!! Form::open(['route' => ['gols.destroy', $gol->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                        <!--         <a href="{!! route('gols.show', [$gol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                                                <a href="{!! route('gols.edit', [$gol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                </tr>
            @endforeach
    </tbody>
</table>