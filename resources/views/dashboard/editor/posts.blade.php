<x-dashboard-layout title="Yazılar">

    <!-- create button form -->
    <form action="{{ route('dashboard.editor.blog.create') }}" method="post">
        @csrf
        <button type="submit"
            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Oluştur
        </button>
    </form>

    @include('dashboard.editor._partials.list-posts', ['posts' => $posts])

    {{-- <div>
        {{ $drafts->links() }}
    </div> --}}
</x-dashboard-layout>
