@extends('front.partial.base')

@section('css')

@endsection

@section('seo')
	<title>{!! getSettingValueByKey('name') !!}</title>
    <meta name="keywords" content="{!! getSettingValueByKey('seo_keywords') !!}">
    <meta name="description" content="{!! getSettingValueByKey('seo_des') !!}">
@endsection

@section('content')
	<div class="container main-box">
		@include('front.partial.leftnav')
		<div class="main ">
			<div class="commits" style="margin-top: 0;">
				<div class="commit-myself">
					<div class="comm-limits">
						<span style="color:#008837;">22 </span>条留言 
						<a href="javacript:void(0);" style="margin-left: 12px;">登录</a>
						<span>/</span>
						<a href="javacript:void(0);">注册</a>
					</div>
					<div class="comm-content">
						<div class="media">
							<div class="media-left user-head">
								<img src="{{asset('images/head.png')}}" alt="">
							</div>
							<div class="media-body">
								<textarea class="form-control" rows="4"></textarea>
							</div>
						</div>
					</div>
					<div class="more">
						<a href="javacript:void(0);" class="fabu">立即发布</a>
						<span>
							<input type="text" class="form-control input-code" placeholder="输入验证码">
							<canvas id="canvas" width="100" height="34">您的浏览器不支持canvas，请换个浏览器试试~</canvas>
						</span>		
					</div>
				</div>
				<div class="new-commit">
					<p class="title">最新留言</p>
					<div class="media comm-item">
						<div class="media-left">
							<img src="{{asset('images/head.png')}}" alt="">
						</div>
						<div class="media-body">
							<h5>用户名888</h5>
							<p class="pub-date">2018/8/28 14:22</p>
							<p class="comm-text">留言</p>
							<a class="reply-num" href="javascript:void(0);">
								<span>用户名888</span>等人 <span class="open-comm">共2条回复></span>
							</a>
							<div class="comm-reply" style="display: none">
								<div class="media comm-item" >
									<div class="media-left">
										<img src="{{asset('images/head.png')}}" alt="">
									</div>
									<div class="media-body">
										<h5>用户名888</h5>
										<p class="pub-date">2018/8/28 14:22</p>
										<p class="comm-text">回复<span style="color:#004796;">@用户名888</span> ： 回复回复回复回复回复回复回复回复回复回复回复回复回复回复回复</p>
									</div>
									<div class="operate">
										<span class="dianzan">22</span>
										<a href="javascript:void(0);">回复</a>
									</div>
								</div>
								<div class="media comm-item" >
									<div class="media-left">
										<img src="{{asset('images/head.png')}}" alt="">
									</div>
									<div class="media-body">
										<h5>用户名888</h5>
										<p class="pub-date">2018/8/28 14:22</p>
										<p class="comm-text">回复<span style="color:#004796;">@用户名888</span> ： 回复回复回复回复回复回复回复回复回复回复回复回复回复回复回复</p>
									</div>
									<div class="operate">
										<span class="dianzan">22</span>
										<a href="javascript:void(0);">回复</a>
									</div>
								</div>
								<div class="media comm-item" >
									<div class="media-left">
										<img src="{{asset('images/head.png')}}" alt="">
									</div>
									<div class="media-body">
										<h5>用户名888</h5>
										<p class="pub-date">2018/8/28 14:22</p>
										<p class="comm-text">回复<span style="color:#004796;">@用户名888</span> ： 回复回复回复回复回复回复回复回复回复回复回复回复回复回复回复</p>
									</div>
									<div class="operate">
										<span class="dianzan">22</span>
										<a href="javascript:void(0);">回复</a>
									</div>
								</div>
								<p class="shou"><span>收起</span></p>
							</div>
						</div>
						<div class="operate">
							<span class="dianzan">22</span>
							<a href="javascript:void(0);">回复</a>
						</div>
					</div>
					<div class="media comm-item same-item">
						<div class="media-left">
							<img src="{{asset('images/head.png')}}" alt="">
						</div>
						<div class="media-body">
							<h5>用户名888</h5>
							<p class="pub-date">2018/8/28 14:22</p>
							<p class="comm-text">留言</p>
						</div>
						<div class="operate">
							<span class="dianzan">22</span>
							<a href="javascript:void(0);">回复</a>
						</div>
					</div>
					<div class="media comm-item same-item">
						<div class="media-left">
							<img src="{{asset('images/head.png')}}" alt="">
						</div>
						<div class="media-body">
							<h5>用户名888</h5>
							<p class="pub-date">2018/8/28 14:22</p>
							<p class="comm-text">留言</p>
						</div>
						<div class="operate">
							<span class="dianzan">22</span>
							<a href="javascript:void(0);">回复</a>
						</div>
					</div>
					<div class="media comm-item same-item">
						<div class="media-left">
							<img src="{{asset('images/head.png')}}" alt="">
						</div>
						<div class="media-body">
							<h5>用户名888</h5>
							<p class="pub-date">2018/8/28 14:22</p>
							<p class="comm-text">留言</p>
						</div>
						<div class="operate">
							<span class="dianzan">22</span>
							<a href="javascript:void(0);">回复</a>
						</div>
					</div>
				</div>
				<div class="more-comm">
					<span>查看更多留言</span>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
    $(function(){
        var show_num = [];
        draw(show_num);
        $("#canvas").on('click',function(){
            draw(show_num);
        })
        $(".fabu").on('click',function(){
            var val = $(".input-code").val().toLowerCase();
            var num = show_num.join("");
            if(val==''){
                alert('请输入验证码！');
            }else if(val == num){
                alert('发布成功！');
                $(".input-val").val('');
                draw(show_num);
            }else{
                alert('验证码错误！请重新输入！');
                $(".input-val").val('');
                draw(show_num);
            }
        })
    })
    function draw(show_num) {
        var canvas_width=$('#canvas').width();
        var canvas_height=$('#canvas').height();
        var canvas = document.getElementById("canvas");//获取到canvas的对象，演员
        var context = canvas.getContext("2d");//获取到canvas画图的环境，演员表演的舞台
        canvas.width = canvas_width;
        canvas.height = canvas_height;
        var sCode = "A,B,C,E,F,G,H,J,K,L,M,N,P,Q,R,S,T,W,X,Y,Z,1,2,3,4,5,6,7,8,9,0";
        var aCode = sCode.split(",");
        var aLength = aCode.length;//获取到数组的长度
        
        for (var i = 0; i <= 3; i++) {
            var j = Math.floor(Math.random() * aLength);//获取到随机的索引值
            var deg = Math.random() * 30 * Math.PI / 180;//产生0~30之间的随机弧度
            var txt = aCode[j];//得到随机的一个内容
            show_num[i] = txt.toLowerCase();
            var x = 10 + i * 20;//文字在canvas上的x坐标
            var y = 20 + Math.random() * 8;//文字在canvas上的y坐标
            context.font = "bold 23px 微软雅黑";

            context.translate(x, y);
            context.rotate(deg);

            context.fillStyle = randomColor();
            context.fillText(txt, 0, 0);

            context.rotate(-deg);
            context.translate(-x, -y);
        }
        for (var i = 0; i <= 5; i++) { //验证码上显示线条
            context.strokeStyle = randomColor();
            context.beginPath();
            context.moveTo(Math.random() * canvas_width, Math.random() * canvas_height);
            context.lineTo(Math.random() * canvas_width, Math.random() * canvas_height);
            context.stroke();
        }
        for (var i = 0; i <= 30; i++) { //验证码上显示小点
            context.strokeStyle = randomColor();
            context.beginPath();
            var x = Math.random() * canvas_width;
            var y = Math.random() * canvas_height;
            context.moveTo(x, y);
            context.lineTo(x + 1, y + 1);
            context.stroke();
        }
    }

    function randomColor() {//得到随机的颜色值
        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);
        return "rgb(" + r + "," + g + "," + b + ")";
    }
</script>
@endsection