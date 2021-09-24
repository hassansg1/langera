<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    @include('layouts.head-css')
</head>

@section('body')
    <body data-topbar="dark" data-layout="horizontal">
    @show

    <!-- Begin page -->
    <div id="layout-wrapper">
    @include('layouts.horizontal')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="padding: 79px 0px 0px !important;">
                <!-- Start content -->
                <div class="container-fluid" style="padding-right: 0px;padding-left: 0px">
                    @include('layouts.master_header')
                </div> <!-- content -->
            </div>
        </div>
        <div class="main-content">
            <div class="page-content" style="margin-top: 0px !important;padding: 12px 12px 60px">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
            @include('components.modals')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    @include('layouts.vendor-scripts')
    </body>

</html>
