<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Edit Post") }}
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
                    <form action="{{ route("post.update", $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}" required>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Cover Image:</legend>
                            <input type="file" name="cover_image" class="file-input w-full" placeholder="Type here" value="{{ old("cover_image") ?? $post->cover_image }}" />
                            @error("cover_image")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Title:</legend>
                            <input type="text" name="title" class="input @error("title") input-error bg-red-50 @enderror w-full" placeholder="Lorem ipsum dolor sit amet" value="{{ old("title") ?? $post->title }}" autofocus required />
                            @error("title")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Category:</legend>
                            <select class="select @error("category_id") select-error bg-red-50 @enderror w-full" name="category_id" required>
                                <option disabled selected>Select a category!</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old("category_id") ?? $post->category_id == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Body:</legend>
                            <textarea rows="10" name="body" class="textarea @error("body") textarea-error bg-red-50 @enderror w-full" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, optio?" required>{{ old("body") ?? $post->body }}</textarea>
                            @error("body")
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <div class="mt-4 flex items-center justify-start gap-2">
                            <button type="submit" class="btn btn-warning w-1/2 rounded-lg">Update</button>
                            <a href="{{ route("dashboard") }}" class="btn btn-error w-1/2 rounded-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
