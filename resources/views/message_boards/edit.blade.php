@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Message Board
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($messageBoard, ['route' => ['messageBoards.update', $messageBoard->id], 'method' => 'patch']) !!}

                        @include('message_boards.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection