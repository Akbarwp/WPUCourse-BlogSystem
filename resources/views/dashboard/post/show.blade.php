<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __("Post Detail") }}
            </h2>
            <div class="flex items-center justify-center gap-1">
                <a href="{{ route("dashboard") }}" class="btn btn-neutral btn-sm btn-outline rounded-lg">
                    <i class="ri-arrow-left-fill"></i>
                    <span>Back</span>
                </a>
                <a href="{{ route("post.edit", $post->slug) }}" class="btn btn-warning btn-sm btn-outline rounded-lg">
                    <i class="ri-pencil-fill"></i>
                    <span>Edit</span>
                </a>
                <form id="delete-form" action="{{ route("post.delete", $post->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-error btn-sm btn-outline rounded-lg" onclick="confirmDelete({{ $post->id }})">
                        <i class="ri-delete-bin-6-line"></i>
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    @php
        $coverImage = $post->cover_image != null ? $post->cover_image : asset("img/cover-image.jpg");
    @endphp
    <div class="relative min-h-screen w-full bg-cover bg-no-repeat" style="background-image: url('{{ $coverImage }}')">
        <div class="absolute inset-0 h-full w-full bg-gray-900/75"></div>
        <div class="grid min-h-screen px-8">
            <div class="container relative z-10 mx-auto my-auto grid place-items-center text-center">
                <h1 class="block text-lg font-semibold leading-tight tracking-normal text-white antialiased sm:text-2xl md:text-3xl lg:text-5xl">{{ $post->title }}</h1>
            </div>
        </div>
    </div>

    <section class="px-8 py-12">
        <div class="mx-auto max-w-screen-md">
            <h6 class="block text-base font-semibold leading-relaxed tracking-normal antialiased">
                Author:
                <a href="{{ route("blog") }}?author={{ $post->author->username }}" class="font-semibold text-blue-500 transition hover:text-blue-800">{{ $post->author->name }}</a> | <span class="text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
            </h6>
            <h6 class="block text-base font-semibold leading-relaxed tracking-normal antialiased">
                Category:
                <a href="{{ route("blog") }}?category={{ $post->category->slug }}" class="{{ $post->category->color }} rounded-lg px-1 py-0.5 opacity-100 transition hover:opacity-80">{{ $post->category->name }}</a>
            </h6>
            <p class="my-12 block text-base font-normal leading-relaxed text-gray-500 antialiased">
                {!! $post->body !!}
            </p>
        </div>
    </section>

    @section("script")
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6419E6',
                    cancelButtonColor: '#F87272',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endsection
</x-app-layout>
