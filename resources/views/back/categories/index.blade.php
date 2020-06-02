@extends('back.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                الأقسام
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
                        <a href="{{route('category.create')}}">
                            إضافة قسم جديد
                        </a>

                    </button>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>اسم القسم</th>
                                <th>تم الإنشاء في</th>
                                <th>تم التحديث في</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categoris as $catrgory)
                                <tr>
                                    <td>{{$catrgory->id}}</td>
                                    <td>{{$catrgory->category_name}}</td>
                                    <td>{{$catrgory->created_at}}</td>
                                    <td>{{$catrgory->updated_at}}</td>


                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{route('category.edit',$catrgory->id)}}">
                                                <button class="btn btn-warning" ><i class="glyphicon glyphicon-edit"></i></button>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>

                    <div class="well">

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
