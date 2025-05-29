<x-blog.layout :title="$title">
    @php
        $coverImage = null;
        if ($post->cover_image != null) {
            $coverImage = $post->cover_image;
        } else {
            $coverImage = "https://picsum.photos/id/101/2621/1747.webp";
        }
    @endphp
    <div class="relative min-h-screen w-full bg-[url('{{ $coverImage }}')] bg-cover bg-no-repeat">
        <div class="absolute inset-0 h-full w-full bg-gray-900/75"></div>
        <div class="grid min-h-screen px-8">
            <div class="container relative z-10 mx-auto my-auto grid place-items-center text-center">
                <h1 class="block text-lg sm:text-2xl md:text-3xl lg:text-5xl font-semibold leading-tight tracking-normal text-white antialiased">{{ $post->title }}</h1>
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
</x-blog.layout>
