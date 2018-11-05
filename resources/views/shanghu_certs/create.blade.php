@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Shanghu Certs
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'shanghuCerts.store']) !!}

                        @include('shanghu_certs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
