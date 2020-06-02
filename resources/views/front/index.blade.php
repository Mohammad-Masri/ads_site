
@extends('front.layouts.master')

@section('title')
    الصفحة الرئيسية
    @endsection
@section('content')

    <div class="container" style="margin-top:25px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox" style="height:300px">
                <div class="carousel-icarousel-innertem active">
                    <img class="d-block img-fluid" width="100%"  src="css/images.jpg" alt="First slide">
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 text-right">
            <h4>آخر الإعلانات</h4><hr/>
        </div>
        <div class="col-lg-12 text-right">
            <h4>{{session('success')}}</h4>
        </div>

        @include('front.layouts.showImage')

        {{$posts->links()}}

    </div>
@endsection
