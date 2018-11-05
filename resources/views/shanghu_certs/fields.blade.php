<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '商户名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Work Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work_image', '营业执照:') !!}
    {!! Form::text('work_image', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_image', '店铺图:') !!}
    {!! Form::text('shop_image', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', '发布人:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('shanghuCerts.index') !!}" class="btn btn-default">返回</a>
</div>
