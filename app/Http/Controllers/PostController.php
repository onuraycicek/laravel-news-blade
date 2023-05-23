<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::latest()->paginate(6);
        return view('home', ['posts' => $posts]);
    }

    public function getOne($slug, $id)
    {
        $post = Post::find($id);
        $post->author = $post->getAuthor()->first()->name;
        $post->category = $post->getCategory()->first()->name;
        return view('post', ['post' => $post]);
    }
}
