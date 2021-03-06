@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($house, ['route' => ['houses.update', $house->id], 'method' => 'patch']) !!}

                        @include('houses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
      @include('admin.partial.imagemodel')
@endsection