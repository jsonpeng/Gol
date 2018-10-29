<!--底部菜单-->
<div class="gol_footer  pb15">
	@if(count($footer_menus))
		<div class="pt15">
			<div class="gol_footer_menus">
				@foreach($footer_menus as $menu)
					<a href="{!! $menu->link !!}">{!! $menu->name !!}</a>
				@endforeach
			<!-- 	<a>小屋微信</a> -->
			</div>
		</div>
	@endif
	<div class="gol_footer_beian">
		<p><img src="/images/gol/beian.png">公安备案&nbsp;&nbsp;|&nbsp;&nbsp;Copyright 索尔科技(上海)有限公司&nbsp;&nbsp;&nbsp;ICP备案号&nbsp;&nbsp;&nbsp;<strong>投资有风险,购买需谨慎</strong></p>
	</div>
</div>