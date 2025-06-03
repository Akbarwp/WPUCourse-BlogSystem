<x-app-layout>
    @push("style")
        {{-- Filepond --}}
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

        {{-- Filepond Image Preview --}}
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

        {{-- Quill Editor --}}
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @endpush
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Post") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="shadow-xs overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($errors->any())
                        <div class="mb-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800">
                            <i class="ri-alert-fill mr-3 mt-[2px] inline shrink-0 text-lg"></i>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Ensure that these requirements are met:</span>
                                <ul class="mt-1.5 list-inside list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route("post.store") }}" method="POST" enctype="multipart/form-data" id="post-form">
                        @csrf
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}" required>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Cover Image:</legend>
                            <input type="file" id="cover-image" name="cover_image" class="w-full" placeholder="Type here" value="{{ old("cover_image") }}" />
                            @error("cover_image")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <div class="relative my-2 h-60 w-full rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset("img/cover-image.jpg") }}')">
                        </div>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Title:</legend>
                            <input type="text" name="title" class="input @error("title") input-error bg-red-50 @enderror w-full" placeholder="Lorem ipsum dolor sit amet" value="{{ old("title") }}" autofocus required />
                            @error("title")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Category:</legend>
                            <select class="select @error("category_id") select-error bg-red-50 @enderror w-full" name="category_id" required>
                                <option disabled selected>Select a category!</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old("category_id") == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Body:</legend>
                            <textarea rows="10" id="body" name="body" class="hidden textarea @error("body") textarea-error bg-red-50 @enderror w-full" placeholder="Write post content here" required>{{ old("body") }}</textarea>
                            <div id="editor">{!! old("body") !!}</div>
                            @error("body")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <div class="mt-4 flex items-center justify-start gap-2">
                            <button type="submit" class="btn btn-success w-1/2 rounded-lg">Save</button>
                            <a href="{{ route("dashboard") }}" class="btn btn-error w-1/2 rounded-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push("script")
        {{-- Filepond Image Preview --}}
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        {{-- Filepond Image Type Validation --}}
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        {{-- Filepond Image Size Validation --}}
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        {{-- Filepond Image Resize & Transform --}}
        <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
        {{-- Filepond --}}
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        {{-- Quill Editor --}}
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImageTransform);
            FilePond.registerPlugin(FilePondPluginImageResize);

            const inputElement = document.querySelector('#cover-image');
            const pond = FilePond.create(inputElement, {
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                maxFileSize: '10MB',
                imageResizeTargetWidth: '1920',
                imageResizeTargetHeight: '1080',
                imageResizeMode: 'contain',
                imageResizeUpscale: false,
                server: {
                    url: "{{ route('post.uploud-cover-image') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>

        <script>
            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Write post content here',
            });

            const postForm = document.querySelector("#post-form");
            const postBody = document.querySelector("#body");
            const quillEditor = document.querySelector("#editor");

            postForm.addEventListener("submit", function(e) {
                e.preventDefault();

                const content = quillEditor.children[0].innerHTML;
                postBody.value = content;

                postForm.submit();
            })
        </script>
    @endpush
</x-app-layout>
