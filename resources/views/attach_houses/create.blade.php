@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Attach House
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'attachHouses.store']) !!}

                        @include('attach_houses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
