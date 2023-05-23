<x-dashboard-layout>
    <form action="{{ route('dashboard.editor.blog.edit', $post->id) }}" method="post" enctype="multipart/form-data"
        class="grid gap-y-6">
        @csrf
        <div>
            <!-- file -->
            <img width="150" src="{{ $post->image }}" alt="">
            <x-input-label for="image" :value="__('Change Image')" />
            <div class="flex gap-x-2">
                <div class="bg-white rounded-lg p-4 shadow-md fit-content inline-block ">
                    <div class="hidden">
                        <x-input-label :value="__('Preview Image')" />
                        <img src="" alt="" id="preview-image-before-upload">
                    </div>
                    <input type="file" name="image" id="image">
                </div>
                <div class="bg-white rounded-lg p-4 shadow-md fit-content inline-block">
                    <input type="text" name="image_url" id="image_url" placeholder="Image URL">
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title"
                value="{{ $post->title }}" />
        </div>
        <div>
            <select name="category" id="category" class="mt-1 block w-full">
                <option value="0">Seçiniz</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="content" :value="__('Content')" />
            <textarea name="content" class="min-h-screen" id="content" cols="30" rows="10">{!! $post->content !!}</textarea>
        </div>
        <div>
            <input type="radio" name="status" id="draft" value="0"
                @if (!$post->status) checked @endif>
            <label for="draft">Draft</label>
            <input type="radio" name="status" id="publish" value="1"
                @if ($post->status) checked @endif>
            <label for="publish">Publish</label>
        </div>
        <div>
            <x-primary-button class="bg-orange-500 hover:bg-orange-700">
                {{ __('Publish') }}
            </x-primary-button>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {


            $('#image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                    $('#preview-image-before-upload').parent().removeClass('hidden');
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
</x-dashboard-layout>
