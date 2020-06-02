<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        موقع إعلانات
        |
        @yield('title')
    </title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('css/homepage.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>

<body >
<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top " style="background-color:#f9f9f9">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">موقع إعلانات مبوبة</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">دخول</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">حساب جديد</a>
                        </li>
                    @endif
                @else

                    <li class="nav-link">
                        <a class="btn icon-btn btn-success" href="{{url('/user/profile/'.auth()->user()->id)}}">
                            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
                            ملفي الشخصي
                        </a>

                    </li>
                    <li class="nav-link">
                        <a class="btn icon-btn btn-success" href="{{url('/user/profile/'.auth()->user()->id.'/edit')}}">
                            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
                            تحديث بياناتي
                        </a>

                    </li>

                    <li class="nav-link">
                        <a class="btn icon-btn btn-success" href="{{url('addpost')}}">
                            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
                            إضافة إعلان جديد
                        </a>

                    </li>

                    @if(Auth::user()->role_id == 1)
                        <li class="nav-link">
                            <a class="btn icon-btn btn-success" href="{{url('adminpanel')}}">
                                <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
                                    لوحة التحكم
                            </a>

                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>


        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container" id="main_container">

    <div class="row">
        <div class="col-lg-3 text-right">
            <h1 class="my-4"></h1>
            <div class="list-group ">
                @foreach($items as $item)
                <a href="{{url('/category/'.$item->id)}}" class="list-group-item">{{$item->category_name}}</a>
                @endforeach

            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9 text-right">

            @yield('content')

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
