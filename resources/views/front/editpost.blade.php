@extends('front.layouts.master')

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
                    'url'=>['/post/update/'.$post->id],
                    'method'=>'PUT'
                    )) !!}
        <div class="form-group">
            <label>
                عنوان الإعلان
            </label>
            {{Form::text('title',$post->title,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                تفاصيل الإعلان
            </label>
            {{Form::text('text',$post->text,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                السعر
            </label>
            {{Form::text('price',$post->price,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                القسم
            </label>
            {{Form::select('category_id',$categories,$post->category_id,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                اليلد
            </label>
            {{Form::select('country_id',$countries,$post->country_id,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label>
                الصور
            </label>
            <input type="file" class="form-control" name="images[]" multiple />
        </div>

        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>

        {!! Form::close() !!}
    </div>
@endsection
