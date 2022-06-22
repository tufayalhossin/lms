<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artyir - Dashboard Chooser</title>

    <link rel="stylesheet" href="{{url('webroot/assets/css/main/app.css')}}">
    <link href="{{url('webroot/app/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{url('webroot/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{url('webroot/assets/images/logo/favicon.png')}}" type="image/png">
<link rel="stylesheet" href="{{url('webroot/assets/css/custom.css')}}">
    <style>
        #login-as {
            display: table;
            height: 87vh;
            width: 100%;
        }

        .mycontainer {
            display: table-cell;
            vertical-align: middle;
        }

        .col-height .card {
            height: 100% !important;
        }

       

        .card-course-detail__content--bottom {
            padding: 0;
            position: relative;
            padding: 0px 24px 12px;
            align-items: flex-end;
            bottom: 0;
            display: flex;
            justify-content: space-between;
            right: 0;
        }

        .counter.counter-lg {
            top: -7px !important;
            position: relative;
            font-size: 12px;
            padding-left: 2px;
        }

        .navbar-brand {
            font-weight: bolder;
            font-size: 48px;
            font-family: initial;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
           
        </div>
    </nav>
    <div id="login-as">
        <div class="mycontainer">
            <section class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-12 text-center mb-3">
                        <a class="navbar-brand text-primary "  href="{{url('/')}}">
                            Artyir
                        </a>
                        <h3 class="mb-5">Choose your favorite dashboard</h3>
                    </div>
                    @if(auth()->user()->isStudent)
                    <div class="col-md-3 col-sm-12  col-height">
                        <a href="{{route('dashboard')}}" class="card-course-detail__content">
                            <div class="card mb-1">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="{{url('webroot/assets/images/samples/origami.jpg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h4 class="card-title">Student</h4>
                                        <p class="card-text text-muted">
                                            Visit your student portal.
                                        </p>
                                    </div>
                                    <div class="card-course-detail__content--bottom">
                                        <div class="card-text">
                                            <small class="text-muted bellicon">
                                                <i class="dripicons-bell"></i><span class="counter counter-lg text-danger ">99+</span>
                                            </small>
                                        </div>
                                        <div><small><i class="dripicons-arrow-thin-right artyir-color"></i></small> </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(auth()->user()->isInstructor)
                    <div class="col-md-3 col-sm-12  col-height">
                        <a href="{{route('instructor.dashboard')}}" class="card-course-detail__content">
                            <div class="card mb-1">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="{{url('webroot/assets/images/samples/origami.jpg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h4 class="card-title">Instructor</h4>
                                        <p class="card-text text-muted">
                                            Visit your instructor portal.
                                        </p>
                                    </div>
                                    <div class="card-course-detail__content--bottom">
                                        <div class="card-text">
                                            <small class="text-muted">
                                                <i class="dripicons-bell"></i><span class="counter counter-lg text-danger">99+</span>
                                            </small>
                                            <small class="text-muted pl-1">
                                                <i class="dripicons-message"></i><span class="counter counter-lg text-danger  pl-1">9</span>
                                            </small>
                                        </div>
                                        <div><small><i class="dripicons-arrow-thin-right artyir-color"></i></small> </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(auth()->user()->isAdmin)
                    <div class="col-md-3 col-sm-12  col-height">
                        <a href="{{route('admin.dashboard')}}" class="card-course-detail__content">
                            <div class="card mb-1">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="{{url('webroot/assets/images/samples/origami.jpg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h4 class="card-title">Admin</h4>
                                        <p class="card-text  text-muted">
                                            Visit your admin portal.
                                        </p>
                                    </div>
                                    <div class="card-course-detail__content--bottom">
                                        <div class="card-text">
                                            <small class="text-muted bellicon">
                                                <i class="dripicons-bell"></i><span class="counter counter-lg text-danger">99+</span>
                                            </small>
                                            <small class="text-muted  pl-1">
                                                <i class="dripicons-message"></i><span class="counter counter-lg text-danger  pl-1">9</span>
                                            </small>
                                        </div>
                                        <div><small><i class="dripicons-arrow-thin-right artyir-color"></i></small> </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    <div class="col--12 pt-5 footer clearfix mb-0 text-muted text-center">
                        <p>{{date("Y")}} © Artyir</p>
                    </div>
                </div>
            </section>

        </div>
    </div>

</body>

</html>