<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', '名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', '显示图片:') !!}
    <div class="input-append">
        {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image')">选择图片</a>
        <img src="@if(isset($loans)) {{$loans->image}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
    </div>
</div>

<!-- Link Field -->
<div class="form-group col-sm-12">
    {!! Form::label('link', '链接地址:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Edu Qi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edu_qi', '额度(起):') !!}
    {!! Form::number('edu_qi', null, ['class' => 'form-control']) !!}
</div>

<!-- Edu Zhi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edu_zhi', '额度(止):') !!}
    {!! Form::number('edu_zhi', null, ['class' => 'form-control']) !!}
</div>

<!-- Qixian Type Field -->
<div class="form-group col-sm-8">
    {!! Form::label('qixian_type', '期限类型:') !!}
    <select name="qixian_type" class="form-control">
        <option value="日" @if(isset($loans) && $loans->qixian_type == '日') selected="selected" @endif>日</option>
        <option value="月" @if(isset($loans) && $loans->qixian_type == '月') selected="selected" @endif>月</option>
    </select>
</div>

<!-- Qixian Qi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qixian_qi', '期限(起):') !!}
    {!! Form::number('qixian_qi', null, ['class' => 'form-control']) !!}
</div>

<!-- Qixian Zhi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qixian_zhi', '期限(止):') !!}
    {!! Form::number('qixian_zhi', null, ['class' => 'form-control']) !!}
</div>


<!-- Lilv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lilv', '利率:') !!}
    {!! Form::text('lilv', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num', '申请人数:') !!}
    {!! Form::text('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('loans.index') !!}" class="btn btn-default">返回</a>
</div>
