<?php

namespace App\Http\Controllers\Dashboard\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        return view('dashboard.editor.posts');
    }

    public function create()
    {
        return view('dashboard.editor.post-create');
    }

    public function edit()
    {
        return view('dashboard.editor.post-edit');
    }
}
