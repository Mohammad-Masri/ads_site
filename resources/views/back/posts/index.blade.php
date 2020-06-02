@extends('back.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                الإعلانات
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left">
                    <button type="button" class="btn btn-success">
                        <a href="{{route('post.create')}}">
                            إضافة إعلان جديد
                        </a>

                    </button>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>العنوان</th>
                                    <th>التفاصيل</th>
                                    <th>السعر</th>
                                    <th>تم البيع</th>
                                    <th>المعلن</th>
                                    <th>الفئة</th>
                                    <th>الدولة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->text}}</td>
                                        <td>{{$post->price}}</td>
                                        <td>{{Form::checkbox('active',null,$post->is_active)}}</td>
                                        <td>{{$post->getadvertiser->name}}</td>
                                        <td>{{$post->getCategory->category_name}}</td>
                                        <td>{{$post->getcountry->name}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{route('post.show',$post->id)}}">
                                                    <button class="btn btn-warning" ><i class="glyphicon glyphicon-eject"></i></button>
                                                </a>

                                                {!! Form::open(array(
                                                    'method'=>'DELETE',
                                                    'route'=>['post.destroy',$post->id],
                                                    'onsubmit'=>"return confirm('هل تريد فعلاً حذف الإعلان ؟')"
                                                )) !!}
                                                    <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{$posts->links()}}

                    </div>

                    <div class="well">

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
