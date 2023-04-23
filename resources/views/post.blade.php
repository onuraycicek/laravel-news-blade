<x-app-layout>
    <div class="max-w-screen-xl mx-auto ">
        <x-post-content :title="$post->title" :image="$post->image" :category="$post->category" :author="$post->author" :date="$post->created_at"
            :content="$post->content" />
    </div>
</x-app-layout>
