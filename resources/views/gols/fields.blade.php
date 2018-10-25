<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Brief Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brief', 'Brief:') !!}
    {!! Form::text('brief', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Xukezheng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('xukezheng', 'Xukezheng:') !!}
    {!! Form::text('xukezheng', null, ['class' => 'form-control']) !!}
</div>

<!-- Zuqi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zuqi', 'Zuqi:') !!}
    {!! Form::text('zuqi', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Hourse Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hourse_status', 'Hourse Status:') !!}
    {!! Form::text('hourse_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Gaizao Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gaizao_status', 'Gaizao Status:') !!}
    {!! Form::text('gaizao_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Publish Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publish_status', 'Publish Status:') !!}
    {!! Form::text('publish_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Give Word Field -->
<div class="form-group col-sm-6">
    {!! Form::label('give_word', 'Give Word:') !!}
    {!! Form::text('give_word', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gols.index') !!}" class="btn btn-default">Cancel</a>
</div>
