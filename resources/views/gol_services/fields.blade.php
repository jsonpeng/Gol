<!-- Name Field -->
<div class="form-group col-sm-8">
    {!! Form::label('name', '名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Group Field -->
<div class="form-group col-sm-8">
    {!! Form::label('group', '组:') !!}
{{--     {!! Form::text('group', null, ['class' => 'form-control']) !!} --}}
    <select class="form-control"  name="group">
            <option value="基础设施" @if(isset($golServices) && $golServices->group == '基础设施') selected="selected" @endif>基础设施</option>
            <option value="卫浴设施" @if(isset($golServices) && $golServices->group == '卫浴设施') selected="selected" @endif>卫浴设施</option>
            <option value="厨房设施" @if(isset($golServices) && $golServices->group == '厨房设施') selected="selected" @endif>厨房设施</option>
            <option value="娱乐" @if(isset($golServices) && $golServices->group == '娱乐') selected="selected" @endif>娱乐</option>
           <option value="周边" @if(isset($golServices) && $golServices->group == '周边') selected="selected" @endif>周边</option>
    </select>
</div>

<!-- Image Field -->
<div class="form-group col-sm-8">
    {!! Form::label('image', '图标图片:') !!}

     <div class="input-append">
        {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image')">选择图片</a>
        <img src="@if(isset($golServices)) {{$golServices->image}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('golServices.index') !!}" class="btn btn-default">返回</a>
</div>
