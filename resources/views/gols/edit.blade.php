@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gol
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($gol, ['route' => ['gols.update', $gol->id], 'method' => 'patch']) !!}

                        @include('gols.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection