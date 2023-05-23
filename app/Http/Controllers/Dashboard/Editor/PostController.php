<?php

namespace App\Http\Controllers\Dashboard\Editor;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;

class PostController extends Controller
{
    public function showPublishedPosts()
    {
        $posts = auth()->user()->getPosts()->where('status', 1)->paginate(5);
        return view('dashboard.editor.posts', [
            'posts' => $posts,
        ]); 
    }

    public function showDrafts()
    {
        $posts = auth()->user()->getPosts()->where('status', 0)->paginate(5);
        return view('dashboard.editor.drafts', [
            'posts' => $posts
        ]); 
    }

    public function create()
    {
        // create post
        $post = new Post([
            'author_id' => auth()->user()->id,
            'category_id' => 1,
            'content' => '',
            'status' => 0
        ]);
        $post->save();

        $postID = $post->id;

        return redirect()->route('dashboard.editor.blog.edit', ['id' => $postID]);
    }

    public function showEdit($id)
    {
        $post = Post::find($id);
        $categories = PostCategory::all();
        return view('dashboard.editor.post-edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function edit($id)
    {
        $title = request()->input('title');
        $content = request()->input('content');
        $image = request()->file('image');
        $imageUrl = request()->input('image_url');
        $status = request()->input('status');
        $category = request()->input('category');

        $post = Post::find($id);

        $newData = [
            'title' => $title,
            'content' => $content,
            'status' => $status,
            'category_id' => $category
        ];

         if ($image) {
            $uniueId = uniqid();
            $imageName = $uniueId . "-" . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $imagePath = 'images/' . $imageName;
        
            $newData['image'] = $imagePath;
        } else if ($imageUrl) {
            $newData['image'] = $imageUrl;
        }

        $post->update($newData);
        return redirect()->route('dashboard.editor.blog.edit', ['id' => $id]);
    }
}
