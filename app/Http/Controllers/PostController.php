<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::paginate(6);
        $posts->each(function ($post) {
            $post->slug = str_replace(' ', '-', $post->title);
        });
        return view('home', ['posts' => $posts]);
    }

    public function getOne($slug, $id)
    {
        $post = Post::find($id);
        $post->slug = str_replace(' ', '-', $post->title);
        $post->author = $post->getAuthor()->first()->name;
        $post->category = $post->getCategory()->first()->name;
        return view('post', ['post' => $post]);
    }
}
