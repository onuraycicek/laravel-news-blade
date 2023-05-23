@foreach ($posts as $post)
    <x-dashboard.editor.blog-post title="{{ $post->title }}" content="{{ $post->content }}"
        category="{{ $post->category }}" id="{{ $post->id }}" image="{{ $post->image }}" />
@endforeach
<div>
    {{ $posts->links() }}
</div>
