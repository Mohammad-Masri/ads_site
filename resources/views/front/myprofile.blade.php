
@extends('front.layouts.master')

@section('title')
   منشوراتي
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <strong>{{ session('edit_password') }}</strong>
                    <div class="card-header">معلوماتي</div>

                    <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">الاسم</label>

                                <div class="col-md-6">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{$user->name}}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <label for="email" class="">{{ $user->email }}</label>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role_id" class="col-md-4 col-form-label text-md-right">الدور</label>

                                <div class="col-md-6">
                                    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ $user->getRole() }}</label>

                                </div>
                            </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 text-right">
            <h4>آخر الإعلانات في منشوراتي</h4><hr/>
        </div>
        <div class="col-lg-12 text-right">
            <h4>{{session('success')}}</h4>
        </div>

        @include('front.layouts.showImage')

        {{$posts->links()}}

    </div>
@endsection
