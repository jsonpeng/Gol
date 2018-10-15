<!-- Name Field -->
<div class="form-group col-sm-8">
    {!! Form::label('name', '小屋名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-8">
    {!! Form::label('address', '小屋地址:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', '小屋详情:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- View Field -->
<div class="form-group col-sm-8">
    {!! Form::label('view', '浏览量:') !!}
    {!! Form::text('view', null, ['class' => 'form-control']) !!}
</div>

<!-- Gear Field -->
<div class="form-group col-sm-8">
    {!! Form::label('gear', '档位:') !!}
    {!! Form::text('gear', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-8">
    {!! Form::label('type', '小屋类型:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Target Field -->
<div class="form-group col-sm-8">
    {!! Form::label('target', '目标金额:') !!}
    {!! Form::text('target', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-8">
    {!! Form::label('status', '状态:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Endtime Field -->
<div class="form-group col-sm-8">
    {!! Form::label('endtime', '结束时间:') !!}
    {!! Form::text('endtime', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('houses.index') !!}" class="btn btn-default">返回</a>
</div>
