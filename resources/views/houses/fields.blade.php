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

<div class="form-group col-sm-8">
        {!! Form::label('image', '小屋主图:') !!}

        <div class="input-append">
            {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
            <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image')">选择图片</a>
            <img src="@if($house) {{$house->image}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
        </div>

</div>

<div class="form-group col-sm-8">
                    {!! Form::label('plan_address', '小屋计划书:') !!}

                    <div class="input-append type_files">
                        {!! Form::text('plan_address', null, ['class' => 'form-control', 'id' => 'plan_address']) !!}
                        @if(isset($house))<a  href="{!! $house->plan_address !!}" class="btn" target="_blank" type="button">预览查看</a>@endif
                    </div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', '小屋详情:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control intro']) !!}
</div>

<!-- View Field -->
<div class="form-group col-sm-8">
    {!! Form::label('view', '浏览量:') !!}
    {!! Form::text('view', null, ['class' => 'form-control']) !!}
</div>

<!-- Gear Field -->
<div class="form-group col-sm-8">
    {!! Form::label('gear', '档位:') !!}
    {!! Form::textarea('gear', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-8">
    {!! Form::label('type', '小屋类型:') !!}
         <select class="form-control" id="type" name="type">
                <option value="青旅" @if(isset($house) && $house->type == '青旅') selected="selected" @endif>青旅</option>
                <option value="客栈" @if(isset($house) && $house->type == '客栈') selected="selected" @endif>客栈</option>
                <option value="民宿" @if(isset($house) && $house->type == '民宿') selected="selected" @endif>民宿</option>
                <option value="空间" @if(isset($house) && $house->type == '空间') selected="selected" @endif>空间</option>
        </select>
</div>

<!-- Target Field -->
<div class="form-group col-sm-8">
    {!! Form::label('target', '目标金额:(万)') !!}
    {!! Form::text('target', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-8">
    {!! Form::label('status', '状态:') !!}
    <select name="status" class="form-control">
        <option value="审核中" @if(isset($house) && $house->status == '审核中') selected="selected" @endif>审核中</option>
        <option value="已发布" @if(isset($house) && $house->status == '已发布') selected="selected" @endif>已发布</option>
        <option value="已完成" @if(isset($house) && $house->status == '已完成') selected="selected" @endif>已完成</option>
        <option value="已下架" @if(isset($house) && $house->status == '已下架') selected="selected" @endif>已下架</option>
        <option value="已过期" @if(isset($house) && $house->status == '已过期') selected="selected" @endif>已过期</option>
    </select>
 
</div>

<!-- Endtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endtime', '结束时间:') !!}
    {!! Form::text('endtime', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('put_time', '上架时间:') !!}
    {!! Form::text('put_time', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-8">
    {!! Form::label('index_show', '权重比例:(比例越高首页显示越靠前)') !!}
    {!! Form::number('index_show', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('houses.index') !!}" class="btn btn-default">返回</a>
</div>
