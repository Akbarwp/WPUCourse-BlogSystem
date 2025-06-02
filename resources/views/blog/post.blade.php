<x-blog.layout :title="$title">
    <section class="grid min-h-screen place-items-center p-8">
        <h6 class="mb-2 block text-base font-semibold leading-relaxed tracking-normal text-inherit antialiased">Latest Blog Posts</h6>
        @if (request('category'))
            <h1 class="mb-2 block text-5xl font-semibold leading-tight tracking-normal text-inherit antialiased">Posts About <span class="text-blue-900">{{ $search->name }}</span></h1>
        @elseif (request('author'))
            <h1 class="mb-2 block text-5xl font-semibold leading-tight tracking-normal text-inherit antialiased">Posts by <span class="text-blue-900">{{ $search->name }}</span></h1>
        @else
            <h1 class="mb-2 block text-5xl font-semibold leading-tight tracking-normal text-inherit antialiased">Trends News</h1>
        @endif
        <p class="mb-6 block max-w-3xl text-center text-xl font-normal leading-relaxed text-gray-500 antialiased">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam qui vero aut nemo necessitatibus recusandae?
        </p>
        <div class="container mx-auto w-full text-center mb-24 lg:mb-36">
            <form action="{{ route('blog') }}" method="GET" enctype="multipart/form-data" class="mt-8 flex flex-col items-center justify-center gap-4 md:flex-row">
                <div class="w-80">
                    <div class="relative h-10 w-full min-w-[200px]">
                        <label class="input">
                            <i class="ri-search-2-line h-[1em] opacity-50"></i>
                            <input class="text-blue-900 focus:ring-0" type="search" name="search" required placeholder="Searching....." />
                        </label>
                    </div>
                </div>
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <button class="btn btn-block sm:w-[300px] md:btn-md md:w-[100px] bg-gray-900 rounded-lg text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">
                    Search
                </button>
            </form>
        </div>
        <div class="container my-auto grid grid-cols-1 items-start gap-x-8 gap-y-16 lg:grid-cols-3">
            @forelse ($posts as $post)
                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                        @if ($post->cover_image != null)
                            <img alt="The key new features and changes in Tailwind CSS" loading="lazy" width="768" height="768" decoding="async" data-nimg="1" class="h-full w-full scale-110 object-cover" style="color: transparent;" src="{{ $post->cover_image }}">
                        @else
                            <img alt="The key new features and changes in Tailwind CSS" loading="lazy" width="768" height="768" decoding="async" data-nimg="1" class="h-full w-full scale-110 object-cover" style="color: transparent;" src="{{ asset("img/cover-image.jpg") }}">
                        @endif
                    </div>
                    <div class="p-6">
                        <p class="mb-2 block text-sm font-medium leading-normal antialiased">
                            <a href="{{ route('blog') }}?category={{ $post->category->slug }}" class="{{ $post->category->color }} text-gray-600 px-1 py-0.5 rounded-lg opacity-80">{{ $post->category->name }}</a>
                        </p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-gray-900 mb-2 block text-xl font-semibold normal-case leading-snug tracking-normal antialiased transition-colors hover:text-gray-900">
                            {{ $post->title }}
                        </a>
                        <p class="mb-6 block text-base font-normal leading-relaxed text-gray-500 antialiased">
                            {{ Str::limit($post->body, 100) }}
                        </p>
                        <div class="flex items-center gap-4">
                            @if ($post->author->avatar != null)
                                <img src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                            @else
                                <img src="{{ asset("img/photo-profile.jpg") }}" alt="{{ $post->author->name }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                            @endif
                            <div>
                                <a href="{{ route('blog') }}?author={{ $post->author->username }}" class="text-gray-900 mb-0.5 block text-sm font-medium leading-normal antialiased">
                                    {{ $post->author->name }}
                                </a>
                                <p class="block text-xs font-normal text-gray-500 antialiased">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="relative mx-4 -mt-6 overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                        <img alt="The key new features and changes in Tailwind CSS" loading="lazy" width="768" height="768" decoding="async" data-nimg="1" class="h-full w-full scale-110 object-cover" style="color: transparent;" src="{{ asset("img/page-not-found.svg") }}">
                    </div>
                    <div class="p-6">
                        <p class="mb-2 block text-sm font-medium leading-normal text-blue-500 antialiased">
                            404
                        </p>
                        <a href="#" class="text-blue-gray-900 mb-2 block text-xl font-semibold normal-case leading-snug tracking-normal antialiased transition-colors hover:text-gray-900">
                            Not Found
                        </a>
                        <p class="mb-6 block text-base font-normal leading-relaxed text-gray-500 antialiased">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi similique fugit, eaque eos sint facere libero deserunt ipsum ipsam voluptate?
                        </p>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset("img/page-not-found.svg") }}" alt="Posts Not Found" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                            <div>
                                <p class="text-blue-gray-900 mb-0.5 block text-sm font-medium leading-normal antialiased">
                                    Error
                                </p>
                                <p class="block text-xs font-normal text-gray-500 antialiased">
                                    404
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="container mt-7">
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </div>
    </section>
</x-blog.layout>
