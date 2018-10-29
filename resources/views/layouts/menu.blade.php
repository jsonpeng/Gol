<li class="">
    <a href="/" target="_blank"><i class="fa fa-home"></i><span>网站首页</span></a>
</li>

<li class="header">网站设置</li>
    <li class="{{ Request::is('zcjy/settings/setting*') || Request::is('zcjy') ? 'active' : '' }}">
      <a href="{!! route('settings.setting') !!}"><i class="fa fa-cog"></i><span>系统设置</span></a>
    </li>
    <li class="{{ Request::is('zcjy/banners*') || Request::is('zcjy/*/bannerItems*') ? 'active' : '' }}">
        <a href="{!! route('banners.index') !!}"><i class="fa fa-object-group"></i><span>网站横幅</span></a>
    </li>
 {{--    <li class="{{ Request::is('zcjy/notices*') ? 'active' : '' }}">
        <a href="{!! route('notices.index') !!}"><i class="fa fa-edit"></i><span>通知消息管理</span></a>
    </li> --}}

    <li class="{{ Request::is('zcjy/menus*') ? 'active' : '' }}">
        <a href="{!! route('menus.index') !!}"><i class="fa fa-cog"></i><span>网站菜单</span></a>
    </li>

    <li class="{{ Request::is('zcjy/messages*') ? 'active' : '' }}">
        <a href="{!! route('messages.index') !!}"><i class="fa fa-commenting"></i><span>系统公告</span></a>
    </li>

    <li class="{{ Request::is('zcjy/cities*') ? 'active' : '' }}">
            <a href="{!! route('cities.index') !!}"><i class="fa fa-arrows"></i><span>城市设置</span></a>
    </li>

<li class="header">用户/小屋新主/商户管理</li>
<li class="{{ Request::is('zcjy/users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>账户管理</span></a>
</li>
<li class="{{ Request::is('zcjy/certs*') ? 'active' : '' }}">
    <a href="{!! route('certs.index') !!}"><i class="fa fa-edit"></i><span>账户实名认证管理</span></a>
</li>
<li class="header">GOL小屋管理</li>
<li class="{{ Request::is('zcjy/houses*') ? 'active' : '' }}">
    <a href="{!! route('houses.index') !!}"><i class="fa fa-edit"></i><span>小屋管理</span></a>
</li>
<li class="{{ Request::is('zcjy/houseJoins*') ? 'active' : '' }}">
    <a href="{!! route('houseJoins.index') !!}"><i class="fa fa-edit"></i><span>小屋支持记录</span></a>
</li>
<li class="{{ Request::is('zcjy/gols*') ? 'active' : '' }}">
    <a href="{!! route('gols.index') !!}"><i class="fa fa-edit"></i><span>GOL系列</span></a>
</li>

<li class="header">内容管理</li>
<li class="treeview @if(Request::is('zcjy/categories*') || Request::is('zcjy/posts*') || Request::is('zcjy/customPostTypes') || Request::is('zcjy/*/customPostTypeItems*')) active @endif " >
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>故事管理</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('zcjy/categories*') ? 'active' : '' }}">
            <a href="{!! route('categories.index') !!}"><i class="fa fa-bars"></i><span>分类</span></a>
        </li>

        <li class="{{ Request::is('zcjy/posts*') ? 'active' : '' }}">
            <a href="{!! route('posts.index') !!}"><i class="fa fa-newspaper-o"></i><span>故事</span></a>
        </li>
        @if(!$online)
        </li><li class="{{ Request::is('zcjy/customPostTypes*') || Request::is('zcjy/*/customPostTypeItems*') ? 'active' : '' }}">
            <a href="{!! route('customPostTypes.index') !!}"><i class="fa fa-calendar-plus-o"></i><span>自定义故事类型</span></a>
        </li>
        @endif
    </ul>
</li>

<li class="treeview @if(Request::is('zcjy/pages*') || Request::is('zcjy/customPageTypes*') ||  Request::is('zcjy/*/pageItems*')) active @endif">
    <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>页面管理</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('zcjy/pages*') ? 'active' : '' }}">
            <a href="{!! route('pages.index') !!}"><i class="fa fa-newspaper-o"></i><span>页面</span></a>
        </li>
        @if(!$online)
        <li class="{{ Request::is('zcjy/customPageTypes*') ||  Request::is('zcjy/*/pageItems*')  ? 'active' : '' }}">
            <a href="{!! route('customPageTypes.index') !!}"><i class="fa fa-calendar-plus-o"></i><span>自定义页面类型</span></a>
        </li>
        @endif
    </ul>
</li>
<!-- <li class="{{ Request::is('zcjy/messageBoards*') ? 'active' : '' }}">
    <a href="{!! route('messageBoards.index') !!}"><i class="fa fa-edit"></i><span>留言板</span></a>
</li> -->
{{-- <li class="{{ Request::is('zcjy/messages*') ? 'active' : '' }}">
    <a href="{!! route('messages.index') !!}"><i class="fa fa-edit"></i><span>客户提交记录</span></a>
</li> --}}
<li class="">
    <a href="javascript:;" id="refresh"><i class="fa fa-refresh"></i><span>刷新缓存</span></a>
</li>


