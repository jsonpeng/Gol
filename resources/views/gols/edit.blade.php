@extends('layouts.app')

@section('css')
<style type="text/css">
  .active{
    background: #FF5511 !important;
    color: white !important;
  }
</style>
@endsection

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
                   {!! Form::model($gol, ['route' => ['gols.update', $gol->id], 'method' => 'patch']) !!}

                        @include('gols.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection


@section('scripts')
<script type="text/javascript">
  $('.gol_services').click(function(){
    $(this).toggleClass('active');
    dealWithActiveServices();
  });
  //处理选中的设施
  function dealWithActiveServices(){
    var services = [];
    $('.gol_services').each(function(){
      if($(this).hasClass('active')){
        services.push($(this).text());
      }
    });
    console.log(services);
    $('input[name=services]').val(services);
  }
</script>
@endsection