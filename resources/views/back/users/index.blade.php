@extends('back.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                المستخدمين
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header" style="color: red">
                {{session('message')}}
            </h4>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left">
                    <button type="button" class="btn btn-success">
                        <a href="{{route('user.create')}}">
                            إضافة مستخدم جديد
                        </a>

                    </button>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>البريد الإلاكتروني</th>
                                <th>الدور</th>
                                <th>تم الإنشاء في</th>
                                <th>تم التحديث في</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->getRole()}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>


                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{route('user.edit',$user->id)}}">
                                                <button class="btn btn-warning" ><i class="glyphicon glyphicon-edit"></i></button>
                                            </a>

                                            {!! Form::open(array(
                                                'method'=>'DELETE',
                                                'route'=>['user.destroy',$user->id],
                                                'onsubmit'=>"return confirm('هل تريد فعلاً حذف المستخدم ؟')"
                                            )) !!}
                                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{$users->links()}}

                    </div>

                    <div class="well">

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
