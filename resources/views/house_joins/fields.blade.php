<div class="form-group col-sm-8">
    {!! Form::label('number', '订单号:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- House Id Field -->
<div class="form-group col-sm-8">
    {!! Form::label('house_id', '小屋:') !!}
    {!! Form::text('house_id', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-8">
    {!! Form::label('user_id', '支持人:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-8">
    {!! Form::label('price', '支持金额:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->

<!-- Pay Status Field -->
<div class="form-group col-sm-8">
    {!! Form::label('pay_status', '状态:') !!}
    {!! Form::text('pay_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('houseJoins.index') !!}" class="btn btn-default">返回</a>
</div>
