<section>

    <div class="container px-6 py-10 mx-auto">

        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img width="250" class="object-cover rounded-xl h-36" src="{{ $image }}" />

            <div class="mt-6 lg:w-2/3 lg:mt-0 lg:mx-6 ">
                <p class="text-sm text-blue-500 uppercase">{{ $category }}</p>

                <a href="#"
                    class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline md:text-3xl {{ $title == '' ? 'text-red-500' : '' }}">
                    {{ $title == '' ? 'Başlık Yok' : $title }}
                </a>

                <div class="mt-5">
                    <a href="{{ route('dashboard.editor.blog.edit', $id) }}"
                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Düzenle
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>
