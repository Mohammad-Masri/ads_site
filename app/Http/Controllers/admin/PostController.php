<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{


    public function __construct()
    {
        return $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('back.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name','id');
        $countries = Country::pluck('name','id');
        return view('back.posts.create',compact('categories'),compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $data = $request->validated();

        $post = Post::create([
            'title'=>$data['title'],
            'text'=>$data['text'],
            'price'=>$data['price'],
            'category_id'=>$request['category_id'],
            'country_id'=>$request['country_id'],
            'user_id'=>$request->user()->id,
        ]);

        if ($request->hasFile('images'))
        {
            $imges = request()->file('images');
            foreach ($imges as $img)
            {
                $name = $img->store('public/img');
                $image = new Image ;
                $image->image = basename($name);
                $post->images()->save($image);

            }
        }

        $posts = Post::paginate(10);
        return view('back.posts.index',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
        return view('front.details',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('category_name','id');
        $countries = Country::pluck('name','id');
        return view('back.posts.edit',compact('post','countries','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $data = $request->validated();

        $post = Post::find($id);
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->price = $data['price'];
        $post->category_id = $request->category_id;
        $post->country_id = $request->country_id;


        if ($request->hasFile('images'))
        {
            $post->images()->delete();
            $imges = request()->file('images');
            foreach ($imges as $img)
            {
                $name = $img->store('public/img');
                $image = new Image ;
                $image->image = basename($name);
                $post->images()->save($image);

            }
        }
        else
        {
            $post->save();
        }

        $posts = Post::paginate(10);
        return view('back.posts.index',compact('posts'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back();
    }





}
