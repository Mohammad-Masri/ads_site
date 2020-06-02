@extends('front.layouts.master')


@section('content')
@php
    $img = $post->images->first();
          if ($img == null)
          {
              $img_name = 'defulte.jfif';
          }
          else
          {
              $img_name = $img->image;

          }
@endphp
    <div class="container text-right" style="margin-bottom: 20px">
        <h3 class="card-title">
            {{$post->title}}
        </h3><hr>
        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{{asset('storage/img/'.$img_name)}}">
            <div class="card-body">
                <h4>المعلومات الرئيسية</h4>
                <p class="card-text">
                    اسم المعلن :
                    {{$post->getadvertiser->name}}
                </p>
                <p class="card-text">
                    البلد :
                    {{$post->getcountry->name}}
                </p>
                <p class="card-text">
                    السعر :
                    {{$post->price}}
                </p>
                <h4>وصف الإعلان</h4>
                <p class="card-text">
                    {{$post->text}}
                </p>
                @if(auth()->check())
                    @if(auth()->user()->id == $post->getadvertiser->id)
                        <ul class="arrow">
                            <li>
                                {!! Form::open(array(
                                                        'method'=>'DELETE',
                                                        'url'=>['/post/delete/'.$post->id],
                                                        'onsubmit'=>"return confirm('هل تريد فعلاً حذف الإعلان')"
                                                    )) !!}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <button type="submit" class="btn btn-default">حذف الإعلان</button>
                                {!! Form::close() !!}
                            </li>
                            <li>
                                <button type="submit" class="btn btn-default"><a href="{{url('/post/edit/'.$post->id)}}">تعديل الإعلان</a></button>
                            </li>
                        </ul>
                    @endif
                @endif

            </div>




        </div>

        <div class="card mt-4">
            <h3 class="card-title">
                التعليقات
            </h3><hr>

            @if($comments->first() == null)
                <div class="card-body">
                    <h5 class="card-title">
                        لا يوجد تعليقات
                    </h5>
                </div>
            @else

                <div class="card-body">
                    @foreach($comments as $comment)
                    <div>
                        <h5>{{$comment->user->name}}</h5>
                        <p>{{$comment->content}}</p>
                        @if(auth()->check())
                            @if(auth()->user()->id == $comment->user->id)
                                <ul class="arrow">
                                    <li>
                                        {!! Form::open(array(
                                                        'method'=>'DELETE',
                                                        'route'=>['deletecomment',$comment->id],
                                                        'onsubmit'=>"return confirm('هل تريد فعلاً حذف التعليق')"
                                                    )) !!}
                                        <input type="hidden" name="post_id" value="{{$comment->post->id}}">
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                        {!! Form::close() !!}

                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-default"><a href="{{url('/comment/edit/'.$comment->id)}}">تعديل</a></button>

                                    </li>
                                </ul>
                            @endif
                        @endif
                    </div>
                        <hr/>
                    @endforeach
                </div>
            @endif



            <div class="card-body">
                <div class="card-body">

                    <form method="post" action="{{route('addcomment')}}">
                        @csrf
                        <div class="text2">
                            <textarea id="content" name="content" type="text" value="Message:" required > </textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div>
                            <input name="post_id" type="hidden" value="{{$post->id}}">
                            <input type="submit" class="submit" value="اضافة تعليق">
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
