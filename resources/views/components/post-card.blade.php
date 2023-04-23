<div class="lg:flex">
    <img class="object-cover w-full h-28 rounded-lg lg:w-32" src="{{ $image }}" alt="">

    <div class="flex flex-col justify-between py-6 lg:mx-6">
        <a href="{{ $link }}" class="text-xl font-semibold hover:underline ">
            {{ $title }}
        </a>

        <span class="text-sm text-gray-500 ">{{ $date }}</span>
    </div>
</div>
