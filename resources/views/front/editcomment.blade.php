@extends('front.layouts.master')


@section('content')
    <div class="card-body">
        <div class="card-body">
            <form method="post" action="{{route('editcomment',$comment->id)}}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="post_id" value="{{$comment->post->id}}">
                <div class="text2">
                    <textarea name="content" type="text"  required >{{$comment->content}}</textarea>
                </div>

                <div>
                    <input type="submit" class="submit" value="تعديل">
                </div>
            </form>
        </div>
    </div>
@endsection
