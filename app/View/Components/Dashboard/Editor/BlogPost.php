<?php

namespace App\View\Components\Dashboard\Editor;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title)
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.editor.blog-post');
    }
}
