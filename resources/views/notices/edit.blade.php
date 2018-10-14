@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Notices
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($notices, ['route' => ['notices.update', $notices->id], 'method' => 'patch']) !!}

                        @include('notices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection