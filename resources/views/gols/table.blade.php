<table class="table table-responsive" id="gols-table">
    <thead>
        <tr>
        <th>名称</th>
        <th>发布人</th>
        <th>主图</th>
        <th>gol房屋类型</th>
  <!--       <th>Brief</th>
        <th>Content</th> -->
        <th>浏览量</th>
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
             <?php $user = $gol->user;?>
                <tr>
                    <td>{!! $gol->name !!}[{!! $gol->type !!}]</td>
                    <td>{!! a_link($user->name, route('users.show', [$user->id]),'orange',false) !!}</td>
                    <td><img src="{!! $gol->image !!}" style="max-width: 80px;height: auto;" /></td>
                    <td>{!! $gol->hourse_type !!}</td>
                    <td>{!! $gol->view !!}</td>
                    <td>{!! $gol->zuqi !!}</td>
                    <td>{!! $gol->area !!}</td>
                    <td>{!! $gol->address !!}</td>
                    <td>{!! $gol->hourse_status !!}</td>
                    <td>{!! $gol->gaizao_status !!}</td>
                    <td>{!! $gol->fabuStatus == '审核中' ? tag($gol->fabuStatus) : $gol->fabuStatus !!}</td>
                    <td>{!! $gol->price !!}@if($gol->hourse_type == '出租') /{!! $gol->zuqi !!}个{!! $gol->zuqi_type !!} @endif</td>
                        <td>
                            {!! Form::open(['route' => ['gols.destroy', $gol->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="/golDetail/{!! $gol->id !!}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('gols.edit', [$gol->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                </tr>
            @endforeach
    </tbody>
</table>