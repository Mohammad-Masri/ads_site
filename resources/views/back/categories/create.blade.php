@extends('back.layouts.master')

@section('content')
    {!! Form::open(array(
            'url'=>route('category.store')
            )) !!}
    <div class="form-group">
        <label>
            اسم القسم
        </label>
        {{Form::text('category_name',null,['class'=>'form-control'])}}
    </div>

    <button type="submit" class="btn btn-primary">حفظ</button>
    {!! Form::close() !!}
@endsection
