@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Zichang Log
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('user_zichang_logs.show_fields')
                    <a href="{!! route('userZichangLogs.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
