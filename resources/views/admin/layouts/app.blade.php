<!DOCTYPE html>
<html dir="ltr" lang="en">
@include('admin.layouts.head')


<body>
<div id="app">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        @include('admin.layouts.header')
        @include('admin.layouts.menu')

        <div class="page-wrapper">
            @yield('content')



            @include('admin.layouts.footer')

        </div>

    </div>
</div>

    <script src="{{url('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{url('admin/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin/js/app-style-switcher.js')}}"></script>
    <script src="{{url('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{url('admin/js/waves.js')}}"></script>

    <script src="{{url('admin/js/sidebarmenu.js')}}"></script>

    <script src="{{url('admin/js/custom.js')}}"></script>

    <script src="{{url('admin/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>


</body>

</html>
