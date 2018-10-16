
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! getSettingValueByKeyCache('name') !!}</title>
    <link rel="icon" href="{!!  getSettingValueByKeyCache('logo') !!}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> -->
        @yield('css')
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lte IE 9]>
            <script src="{{ asset('vendor/html5shiv.min.js') }}"></script>
            <script src="{{ asset('vendor/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
        
        <!--[if lte IE 8]>
            <script>
                alert("您正在使用的浏览器版本过低，为了您的最佳体验，请先升级浏览器。");window.location.href="http://support.dmeng.net/upgrade-your-browser.html?referrer="+encodeURIComponent(window.location.href);
            </script>
        <![endif]-->
        <!-- Add your site or application content here -->
        @include('front.partial.nav')
        @yield('content')
        <!-- @include('front.partial.footer') -->
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/touch.js')}}"></script>
        <script src="{{ asset('vendor/layer/layer.js') }}"></script>
{{--         <script src="{{ asset('js/main.js') }}"></script> --}}
        <script src="{{asset('js/zcjy.js')}}"></script>
        <script src="{{asset('js/banner.js')}}"></script>
        <script type="text/javascript">
        $('.carousel').carousel({
            interval: 1500
        })
        $("#carousel-example-generic").swipe({
            swipeLeft: function() { $(this).carousel('next'); },
            swipeRight: function() { $(this).carousel('prev'); },
        });
        </script>
        <!-- <script>
          var _hmt = _hmt || [];
          (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?7efffafa578ff4e986f1ac345c6fb753";
            var s = document.getElementsByTagName("script")[0]; 
            s.parentNode.insertBefore(hm, s);
          })();
        </script> -->
        <!-- <script type="text/javascript">
            var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cspan style='display:none' id='cnzz_stat_icon_1258944175'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1258944175' type='text/javascript'%3E%3C/script%3E"));
        </script> -->
        @yield('js')
        
        <!-- JS统计代码 -->
        


    </body>
</html>
