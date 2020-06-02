<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Post;


class HomePageController extends Controller
{
    public function index()
    {
        $posts = Post::select('id','title','text','price')
            ->latest()
            ->paginate(9);

        return view('front.index',compact('posts'));
    }

    public function AdsByCategory( $id )
    {
        $category_name = Category::find($id)->category_name;
        $posts = Post::where('category_id',$id)->get();
        return view('front.byCategory',compact('posts','category_name'));
    }

    public function showPostDetails($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
        return view('front.details',compact('post','comments'));
    }

}
