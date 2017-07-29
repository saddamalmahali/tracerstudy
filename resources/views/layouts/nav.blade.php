<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         
        @if(Auth::guard('web')->check())
            <li class="{{url()->full() == url('/admin/user_admin')? 'active' : ''}}"><a href="{{url('/admin/user_admin')}}"><i class="ion-person"></i><span>&nbsp;User Admin</span></a></li>
            <li class="{{url()->full() == url('/admin/alumni')? 'active' : ''}}"><a href="{{url('/admin/alumni')}}"><i class="ion-android-contacts"></i><span>&nbsp;Alumni</span></a></li>

            <li class="header">LAPORAN</li>
            <li class="{{url()->full() == url('/admin/laporan_responden')? 'active' : ''}}">
                <a href="{{url('/admin/laporan_responden')}}"><i class="fa fa-area-chart"></i><span>&nbsp;Responden</span></a>
            </li>
        @endif

        @if(Auth::guard('tracer')->check())
            <li class="{{url()->full() == url('/alumni/tracer')? 'active' : ''}}"><a href="{{url('/alumni/tracer')}}"><i class="ion-android-contacts"></i><span>&nbsp;Isi Tracer</span></a></li>
        @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>