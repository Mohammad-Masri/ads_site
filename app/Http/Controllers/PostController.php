<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Country;
use App\Http\Requests\StorePostRequest;
use App\Image;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{


    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        $categories = Category::pluck('category_name','id');
        $countries = Country::pluck('name','id');
        return view('front.addpost',compact('categories'),compact('countries'));
    }

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

        return redirect('index')->with('success','تم إضافة الإعللان');
    }

    public function edit_post($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('category_name','id');
        $countries = Country::pluck('name','id');
        return view('front.editpost',compact('post','countries','categories'));
    }

    public function update_post($id ,StorePostRequest $request)
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

        return redirect('post/'.$post->id.'/details');
    }

    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('index');
    }


    public function store_comment(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'max:255'],
            ],[],
            [
                'content'=>'Comment'
            ]);
        $comment = new Comment;
        $comment->content = $data['content'];
        $comment->post_id = $request['post_id'];
        $comment->user_id = $request->user()->id;
        $comment->save();

        return back();
    }

    public function show_edit_comment($id)
    {
        $comment = Comment::find($id);
        return view('front.editcomment',compact('comment'));
    }

    public function edit_comment($id , Request $request)
    {
        $comment = Comment::find($id);
        $comment->content = $request['content'];
        $comment->save();

        $post_id = $request['post_id'];

        return redirect('post/'.$post_id.'/details');
    }



    public function delete_comment($id , Request $request)
    {
        //return $request->all();
        Comment::find($id)->delete();

        $post_id = $request['post_id'];

        return redirect('post/'.$post_id.'/details');
    }


    public function show_myprofile($id)
    {
        $user = User::find($id);
        $posts = Post::select('id','title','text','price')->where(['user_id'=>$id])
            ->latest()
            ->paginate(9);

        return view('front.myprofile',compact('posts','user'));
    }

    public function show_editmyprofile($id)
    {
        $user = User::find($id);
        return view('front.editmyprofile',compact('user'));
    }

    public function editmyprofile($id , Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return back();
    }

    public function editmypassword($id , Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);
        $oldpassword = $request->old_password;
        $currpassword = $user->password;

        if(Hash::check($oldpassword, $currpassword))
        {
            $newpassword = bcrypt($data['password']);
            $user->password = $newpassword;
            $user->save();
            return back()->with('edit_password','تم تغيير كلمة المرور بنجاح');
        }
        else
        {
            return back()->with('error_password','كلمة المرور خاطئة');
        }

    }

}
