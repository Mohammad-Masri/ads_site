@foreach($posts as $post)
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

    <div class="col-lg-4 col-md-6 mb-4 text-right">
        <div class="card h-100">
            <a href="{{url('/post/'.$post->id.'/details')}}"><img class="card-img-top" height="150px"
                            src="{{asset('storage/img/'.$img_name)}}"
                            onerror="this.onerror=null;this.src='storage/img/defulte.jfif'; "
                            alt="image" >
            </a>

            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{url('/post/'.$post->id.'/details')}}">{{$post->title}}</a>
                </h5>
                <h6>{{$post->price}}</h6>
            </div>
        </div>
    </div>
@endforeach
