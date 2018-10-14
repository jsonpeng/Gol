<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/gol/logo.jpg" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>GOL</p>
                @else
                    <p>{{ auth('admin')->user()->name}}</p>
                @endif
                <!-- Status -->
           <!--      <a href="#"><i class="fa fa-circle text-success"></i> 在线</a> -->
            </div>
        </div>

        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>