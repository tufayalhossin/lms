<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php if (empty($infoDonor)) $infoDonor = config('app.infoDonor'); ?>

<head>
    <meta charset="utf-8" />
    <title>{{$infoDonor['meta']['title']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{$infoDonor['meta']['description']}}" name="description" />
    <meta content="artyir" name="author" />       
     <!-- Fonts -->
     @include('instructor.elements.header')
</head>

<body>
    <!-- Begin page -->
    <div id="app">
        <!-- left Sidebar -->
        @include('instructor.elements.left-sidebar')
        <!-- End left Sidebar -->


        <div id="main" class='layout-navbar'>

            <!-- Top navbar -->
            @include('instructor.elements.top-navbar')
            <!-- End Top navbar -->

            <div id="main-content" class="pt-0">
                <!-- start page title -->
                @include('instructor.elements.breadcrumb')
                <!-- content -->
                <div class="page-content">
                    <section class="row">
                        <!-- end page title -->
                        @include('message.instructor-messages')
                        <!-- Start Page Content here -->
                        @yield('content')
                        <!-- End Page content -->
                    </section>
                </div>

                <!-- /content -->


                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Affiliate - Artyir.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
        </div>

    </div>
    <!-- END wrapper -->


    <!-- Footer -->
    @include('instructor.elements.footer')
    <!-- End Footer -->
</body>

</html>