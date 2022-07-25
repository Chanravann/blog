<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    @yield('title')
    @yield('style')
</head>
<body>
    <!--start navegation bar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('image/picture/mypic.jpg')}}" alt="" width="50" style="border-radius:50%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/')}}">{{trans('label.home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('product')}}">{{trans('label.product')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('region')}}">{{trans('label.region')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('student.index')}}">{{trans('label.student')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.home')}}">{{trans('label.category')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.index')}}">{{trans('label.user')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('uploadfile')}}">{{trans('label.upload')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('customer')}}">{{trans('label.customer')}}</a>
                        </li>
                        <li>
                            <span class='text-danger'>
                                {{@Auth::user() -> username}} 
                            </span>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <!-- <button class="btn btn-secondary" type="submit" id='btn'>Search</button> -->
                        <a href="{{url('logout')}}" class='btn btn-danger btn-sm'>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out
                        </a>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!--end navegation bar-->
    <!--start content-->
    <div class="container">
        @yield('content')
    </div>
    <!--end content-->
    @yield('javascript')
</body>
</html>