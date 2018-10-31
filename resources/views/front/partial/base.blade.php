
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! getSettingValueByKeyCache('name') !!}</title>
    <link rel="icon" href="{!!  getSettingValueByKeyCache('logo') !!}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style type="text/css">
        /**
         *去除响应式
         */
         .container{ 
            width: 1170px; 
            max-width: none !important; 
          }

          @media screen and (max-width: 1400px) { 
            body{ 
            width: 1400px; 
            } 
         }

        /**
         * [全局]
         * @type {[type]}
         */
         p{
            word-wrap:break-word;
            font-size: 16px;
         }
         .in-block{display: inline-block;}
        .p_relative{position: relative;}
        a:hover { color: #FF5511; text-decoration: underline; }
        .border_b{border-bottom: 1px solid #bbb;}
        .gol_hidden{display: none;}
        .h150{height: 150px;}
        .h120{height: 120px;}
        .h60{height:60px;}
        .h45{height: 45px;}
        .mr20{margin-right:20px;}
        .mt120{margin-top: 120px;}
        .mt50{margin-top: 50px;}
        .mt30{margin-top: 30px !important;}
        .mt15{margin-top:15px;}
        .ml0{margin-left: 0px;}
        .ml25{margin-left: 25px;}
        .mb25{margin-bottom: 25px;}
        .pt15{padding-top: 15px;}
        .pt30{padding-top:30px;}
        .pt50{padding-top:50px;}
        .pt100{padding-top: 100px;}
        .pt120{padding-top: 120px;}
        .pb120{padding-bottom: 120px;}
        .pb220{padding-bottom: 220px;}
        .pb50{padding-bottom: 50px;}
        .pb30{padding-bottom: 30px;}
        .pb15{padding-bottom: 15px;}
        .pr15{padding-right: 15px;}
        .pl15{padding-left: 15px;}
        .pl30{padding-left: 30px;}
        .pr30{padding-right: 30px;}
        .pl50{padding-left: 50px;}
        .pl80{padding-left: 80px;}
        .pl120{padding-left: 120px;}
        .ml20b{margin-left: 20%;}
        .w50{width:50%;}
        .w85{width: 85% !important;}
        .w154{width: 154px !important;}
        .f12{font-size: 12px;}
        .f14{font-size: 14px;}
        .f16{font-size: 16px !important;}
        .f24{font-size:24px;}
        .fw700{font-weight: 700;}
        .h163{height:163px;}
        .img_auto{width:100%;height:auto;}
        .gol_color{
            color:#FF5511;
        }
        .form-control:focus{
            border-color:#FF5511;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #FF5511;
        }
        .backgroud_red{
            background: red;
        }
        /**
         *顶部文字
         */
        .gol_top_text{padding-top:5px;padding-right: 20px;color:black;font-size:14px;display: inline-block;}
        /**
         * [菜单导航]
         * @type {Number}
         */
        .gol_logo{
            width: 100px;
            height: auto;
        }
        .gol_footer{
            background: #ddd;
            text-align: center;
        }
        .gol_footer_menus{
            padding-top: 18px;
            border-top: 1.5px solid #666;
            margin-left: 10%;
            margin-right:10%;
            padding-bottom: 20px;
        }
        .gol_footer_menus a{
            font-size:16px;
            color: black;
            padding-right: 35px;
            display: inline-block;
        }
        .gol_footer_beian{
            /*padding-left: 10%;*/
        }
        .gol_many_post_item{
            max-width: 300px;
            color: black;
        }
        .gol_many_top_a{
            color: black;
            display: inline-block;
            padding-right: 15px;
            padding-bottom: 25px;
        }
        .gol_many_top_a.active{
            color:#FF5511;
        }
        .nav>li>a{padding-left: 0; padding-right: 0;color:black;font-size:16px;}
        .nav>li{margin: 0 25px;}
        .nav>li>a:focus, .nav>li>a:hover {
            text-decoration: none;
            background-color: transparent;
            color:#FF5511; 
        }
        /**
         *个人中心
         */
           .gol_usercenter_headimg{
            max-width: 100px;
          }
          .gol_usercenter_leftnav{
            background-color: #F4F2F2;
            padding-top: 15px;
            padding-bottom: 220px;
            padding-right: 10px;
            text-align: center;
          }
          .gol_usercenter_li{
            padding-top: 50px;
            /*text-align: center;*/
            font-size: 16px;
            list-style:none;
          }
          .gol_usercenter_li > a{
            color: black;
          }
          .gol_usercenter_li.active > a{
            color: #FF5511;
          }
          #user-table > thead > tr > th{
            text-align: center;
          }
          .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
                z-index: 3;
                color: #fff;
                cursor: default;
                background-color: #FF5511;
                border-color: #FF5511;
            }
    </style>
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
        @include('front.partial.footer')
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/touch.js')}}"></script>
        <script src="{{ asset('vendor/layer/layer.js') }}"></script>
        <script  src="{{ asset('vendor/scrollreveal.min.js') }}"></script>
{{--         <script src="{{ asset('js/main.js') }}"></script> --}}
        <script src="{{asset('js/zcjy.js')}}"></script>
        <script src="{{asset('js/banner.js')}}"></script>
        <script src="{{asset('js/jq_goup.js')}}"></script>
        <script type="text/javascript">
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.reveal', { duration: 2000 }, 50);
        sr.reveal('.reveal1', { duration: 2000 }, 50);
        sr.reveal('.reveal2', { duration: 2000 }, 50);
        sr.reveal('.reveal3', { duration: 2000 }, 50);
        sr.reveal('.reveal4', { duration: 2000 }, 50);
        sr.reveal('.reveal5', { duration: 2000 }, 50);
        //自动加载返回顶部插件
        $(document).ready(function () {
            $.goup({
                trigger: 100,
                bottomOffset: 150,
                locationOffset: 100,
                titleAsText: true
            });
        });
        /**
         * swipe滚动
         * @type {[type]}
         */
        $('.carousel').carousel({
            interval: 1500
        });
        $('.carousel-hourse').carousel({
            interval: 2000
        });
        $("#carousel-example-generic,#carousel-example-generic-hourse").swipe({
            swipeLeft: function() { $(this).carousel('next'); },
            swipeRight: function() { $(this).carousel('prev'); },
        });
        //退出登录
        $('.gol_logout').click(function(){
            $.zcjyRequest('/ajax/logout_user',function(res){
                if(res){
                    $.alert('退出成功');
                    location.reload();
                }
            },{},'POST');
        });
        //全站搜索
        $('.site_search_all').click(function(){
            if($.empty($('input[name=search_all]').val())){
                $.alert('请输入搜索关键字');
                return ;
            }
            location.href="/search?word="+$('input[name=search_all]').val();
        });

        </script>

        @yield('js')
        
       
        


    </body>
</html>
