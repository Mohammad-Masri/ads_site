@extends('back.layouts.master')

@section('content')

    <div>

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div>
        {!! Form::open(array(
            'files'=>true,
            'url'=>route('post.store')
            )) !!}
        <div class="form-group">
            <label>
                عنوان الإعلان
            </label>
            {{Form::text('title',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                تفاصيل الإعلان
            </label>
            {{Form::text('text',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                السعر
            </label>
            {{Form::text('price',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                القسم
            </label>
            {{Form::select('category_id',$categories,1,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                اليلد
            </label>
            {{Form::select('country_id',$countries,1,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                الصور
            </label>
            <input type="file" class="form-control" name="images[]" multiple />
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>

        {!! Form::close() !!}
    </div>

@endsection
