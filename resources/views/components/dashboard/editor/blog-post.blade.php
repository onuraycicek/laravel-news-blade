<section>

    <div class="container px-6 py-10 mx-auto">
        <a href="{{ route('dashboard.editor.blog.create') }}"
            class="inline-flex items-center rounded-md
            bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline
            focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Oluştur
        </a>
        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/3 rounded-xl h-36"
                src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">

            <div class="mt-6 lg:w-2/3 lg:mt-0 lg:mx-6 ">
                <p class="text-sm text-blue-500 uppercase">{{ $category }}</p>

                <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline md:text-3xl">
                    {{ $title }}
                </a>

                <p class="mt-3 text-sm text-gray-500 md:text-sm">
                    {{ $content }}
                </p>
                <div class="mt-5">
                    <a href="{{ route('dashboard.editor.blog.edit', 1) }}"
                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Düzenle
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>
