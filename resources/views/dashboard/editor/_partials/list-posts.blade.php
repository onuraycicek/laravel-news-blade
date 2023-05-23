@foreach ($posts as $post)
    <div class="container px-6 py-10 mx-auto">
        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img width="250" class="object-cover rounded-xl h-36" src="{{ $post->image }}" />

            <div class="mt-6 lg:w-2/3 lg:mt-0 lg:mx-6 ">
                <p class="text-sm text-blue-500 uppercase">{{ $post->category }}</p>

                <a href="#"
                    class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline md:text-3xl {{ !$post->title ? 'text-red-500' : '' }}">
                    {{ $post->title == '' ? 'Başlık Yok' : $post->title }}
                </a>

                <div class="mt-5">
                    <a href="{{ route('dashboard.editor.blog.edit', $post->id) }}"
                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Düzenle
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div>
    {{ $posts->links() }}
</div>
