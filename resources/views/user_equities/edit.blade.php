@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Equity
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userEquity, ['route' => ['userEquities.update', $userEquity->id], 'method' => 'patch']) !!}

                        @include('user_equities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection