<x-app-layout>
    @include('layouts.dashboard-navbar')
    <div class="md:ml-64 pt-12 md:pt-0">
        <h2>{{ $title }}</h2>
        {{ $slot }}
    </div>
</x-app-layout>
