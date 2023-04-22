<x-app-layout>
    @include('layouts.dashboard-navbar')
    <div class="md:ml-64 pt-12 md:pt-0">
        {{ $slot }}
    </div>
</x-app-layout>
