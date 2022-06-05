<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}>
<?php  if(empty($infoDonor)) $infoDonor = config('app.infoDonor'); ?>

<head>
    <meta charset="utf-8" />
    <title>{{$infoDonor['meta']['title']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{$infoDonor['meta']['description']}}" name="description" />
    <meta content="artyir" name="author" />

    @include('backend.elements.header')

</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- Right Sidebar -->
        @include('backend.elements.left-sidebar')
        <!-- End Right Sidebar -->


        <div class="content-page">
            <div class="content">

                <!-- Top navbar -->
                @include('backend.elements.top-navbar')
                <!-- End Top navbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    @include('backend.elements.breadcrumb')
                    <!-- end page title -->
                    @include('message.messages')
                    <!-- Start Page Content here -->
                    @yield('content')
                    <!-- End Page content -->
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Affiliate - Artyir().
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('backend.elements.right-sidebar')
    <!-- End Right Sidebar -->


    <!-- Footer -->
    @include('backend.elements.footer')
    <!-- End Footer -->
</body>

</html>