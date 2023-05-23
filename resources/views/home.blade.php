<x-app-layout>
    <section>
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl ">News</h1>

            <div class="grid grid-cols-1 gap-6 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($posts as $post)
                    <x-post-card title="{{ $post->title }}"
                        link="{{ route('post', ['slug' => $post->slug, 'id' => $post->id]) }}"
                        date="{{ $post->created_at->format('M d, Y') }}" image="{{ $post->image }}" />
                @endforeach

                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
