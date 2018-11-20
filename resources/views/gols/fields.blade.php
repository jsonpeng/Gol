<!-- Name Field -->
<div class="form-group col-sm-8">
    {!! Form::label('name', '名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-8">
    {!! Form::label('image', '图片:') !!}
    <div class="input-append">
        {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image')">选择图片</a>
        <img src="@if($gol) {{$gol->image}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
    </div>
</div>

<div class="form-group col-sm-9">
                          {!! Form::label('hourse_type', 'gol房屋类型:') !!}
                          <select class="form-control"  name="hourse_type">
                            <option value="出租" @if(isset($gol) && $gol->hourse_type == '出租') selected="selected" @endif>出租</option>
                            <option value="转让" @if(isset($gol) && $gol->hourse_type == '转让') selected="selected" @endif>转让</option>
                            <option value="出售" @if(isset($gol) && $gol->hourse_type == '出售') selected="selected" @endif>出售</option>
                          </select>
</div>

<!-- Brief Field -->
<div class="form-group col-sm-8">
    {!! Form::label('brief', '简介:') !!}
    {!! Form::textarea('brief', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', '详情:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control intro']) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('services', '请选择服务设施添加:') !!}
    <div class="row">
      @if(count($services))
        @foreach ($services as $item)
          <button type="button" class="col-sm-3 btn
            btn-default gol_services @if(in_array($item->name,$gol->ServicesArr)) active @endif">{!! $item->name !!}</button>
        @endforeach
      @endif
      <input name="services" type="hidden" value="" />
    </div>
</div>



<!-- Xukezheng Field -->
<div class="form-group col-sm-8">
    {!! Form::label('xukezheng', '有无许可证:') !!}
      <div class="input-append">
        {!! Form::text('xukezheng', null, ['class' => 'form-control', 'id' => 'xukezheng']) !!}
        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('xukezheng')">选择替换</a>
        <img src="@if($gol) {{$gol->xukezheng}} @endif" style="max-width: 100%; max-height: 150px; display: block;">
    </div>
</div>

<div class="form-group col-sm-6">
  {!! Form::label('zuqi_type', '租期类型') !!}
  {!! Form::select('zuqi_type',['月'=>'月','季度'=>'季度','半年'=>'半年','整年'=>'整年'],null, ['class' => 'form-control']) !!}
</div>

<!-- Zuqi Field -->
<div class="form-group col-sm-6">
  {!! Form::label('zuqi', '租期') !!}
  {!! Form::number('zuqi', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('water_price', '水费:(元)') !!}
  {!! Form::text('water_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('electric_price', '电费:(元)') !!}
  {!! Form::text('electric_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('mei_price', '煤费:(元)') !!}
  {!! Form::text('mei_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('ranqi_price', '燃气费:(元)') !!}
  {!! Form::text('ranqi_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
  {!! Form::label('mei_price', '其他费用:(元)') !!}
  {!! Form::text('mei_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Field -->
<div class="form-group col-sm-8">
    {!! Form::label('area', '房屋面积:') !!}
    {!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-8">
    {!! Form::label('address', '地址:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Hourse Status Field -->
<div class="form-group col-sm-8">
    {!! Form::label('hourse_status', '房屋状态:') !!}
    {!! Form::text('hourse_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Gaizao Status Field -->
<div class="form-group col-sm-8">
    {!! Form::label('gaizao_status', '改造状态:') !!}
    {!! Form::text('gaizao_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Publish Status Field -->
<div class="form-group col-sm-8">
    {!! Form::label('publish_status', '发布状态:') !!}
        <select name="publish_status" class="form-control">
        <option value="0" @if(isset($gol) && $gol->publish_status == '0') selected="selected" @endif>审核中</option>
        <option value="1" @if(isset($gol) && $gol->publish_status == '1') selected="selected" @endif>已发布</option>
        <option value="2" @if(isset($gol) && $gol->publish_status == '2') selected="selected" @endif>已下架</option>
    </select>
</div>



<!-- Price Field -->
<div class="form-group col-sm-8">
    {!! Form::label('price', '价格:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Give Word Field -->
<div class="form-group col-sm-8">
    {!! Form::label('give_word', '给小屋新主留下来的话:') !!}
    {!! Form::textarea('give_word', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-8">
    {!! Form::label('tui', '给发布者推送更新消息') !!}
    <input type="checkbox" name="tui" />
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gols.index') !!}" class="btn btn-default">返回</a>
</div>
