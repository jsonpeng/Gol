@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Attention Gol
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($attentionGol, ['route' => ['attentionGols.update', $attentionGol->id], 'method' => 'patch']) !!}

                        @include('attention_gols.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection