<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php  if(empty($infoDonor)) $infoDonor = config('app.infoDonor'); ?>

<head>
    <meta charset="utf-8" />
    <title>{{$infoDonor['meta']['title']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{$infoDonor['meta']['description']}}" name="description" />
    <meta content="artyir" name="author" />

    @include('instructor.elements.header')

</head>

<body >
    <!-- Begin page -->
    <div id="app">
        <!-- left Sidebar -->
        @include('instructor.elements.left-sidebar')
        <!-- End left Sidebar -->


        <div id="main">
            
                <!-- Top navbar -->
                @include('instructor.elements.top-navbar')
                <!-- End Top navbar -->

                    <!-- start page title -->
                    @include('instructor.elements.breadcrumb')
                    <!-- content -->
            <div class="page-content">
                <section class="row">
                      <!-- end page title -->
                      @include('message.messages')
                    <!-- Start Page Content here -->
                    @yield('content')
                    <!-- End Page content -->
                </section>
            </div>

            <!-- /content -->
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{date("Y")}} © Artyir</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Artyir</a></p>
                    </div>
                </div>
            </footer>

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
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('instructor.elements.right-sidebar')
    <!-- End Right Sidebar -->


    <!-- Footer -->
    @include('instructor.elements.footer')
    <!-- End Footer -->
</body>

</html>
