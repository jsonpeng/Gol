@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Attach House
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('attach_houses.show_fields')
                    <a href="{!! route('attachHouses.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
