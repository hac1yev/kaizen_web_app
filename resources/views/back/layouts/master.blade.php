<!doctype html>
<html lang="en" dir="ltr">
@include('back.layouts.head')
<body class="ltr app sidebar-mini">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">
        @include('back.layouts.header')
        @include('back.layouts.nav')
        <!--app-content open-->
        <div class="app-content main-content mt-0">
            <div class="side-app">
                <!-- CONTAINER -->
                <div class="main-container container-fluid">
                @yield('content')
                </div>
            </div>
        </div>
        <!-- CONTAINER END -->
    </div>

    @include('back.layouts.footer')

</div>
<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

@include('back.layouts.script')
</body>
</html>
