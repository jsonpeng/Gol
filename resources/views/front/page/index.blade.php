@extends('front.partial.base')

@section('css')

@endsection

{{-- @include('front.page.seo') --}}

@section('content')
<h1>单页</h1>
@endsection


@section('js')
	<script type="text/javascript">
	    var mySwiper = new Swiper ('.swiper-container', {
		    // Optional parameters
		    loop: true,
	  	})
	</script>
@endsection