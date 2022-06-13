<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        return view('index')
            ->with('posts',$posts);
    }

    public function post($id){
        $post = Post::where('id',$id)->with('user')->first();
        return view('post')
            ->with('post',$post);
    }
}
