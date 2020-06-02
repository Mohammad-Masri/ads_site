@extends('back.layouts.master')

@section('content')
    {!! Form::open(array(
                'url'=>route('category.update',$category->id),
                'method'=>'PUT'
                )) !!}
    <div class="form-group">
        <label>
            اسم القسم
        </label>
        {{Form::text('category_name',$category->category_name,['class'=>'form-control'])}}
    </div>



    <button type="submit" class="btn btn-primary">تحديث</button>

    {!! Form::close() !!}
@endsection
