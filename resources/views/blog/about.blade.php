<x-blog.layout :title="$title">
    <header class="mb-96 bg-gray-900">
        <div class="container mx-auto h-[22rem] translate-y-64 px-8 lg:px-48">
            <img alt="avatar" loading="lazy" width="1024" height="1024" decoding="async" data-nimg="1" class="w-40 rounded-xl" style="color: transparent;" src="https://picsum.photos/id/103/2592/1936.webp" />
            <div class="mt-16 flex justify-between">
                <h5 class="block font-sans text-3xl font-semibold tracking-normal text-inherit antialiased">Akbar W.P.</h5>
                <a href="https://github.com/Akbarwp" target="_blank" class="select-none rounded-lg bg-gray-900 px-6 py-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">follow</a>
            </div>
            <div class="flex items-center gap-6">
                <div class="mt-3 flex items-center gap-2">
                    <p class="block font-sans text-base font-bold leading-relaxed text-gray-900 antialiased">323</p>
                    <p class="block font-sans text-base font-normal leading-relaxed text-gray-500 antialiased">Posts</p>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <p class="block font-sans text-base font-bold leading-relaxed text-gray-900 antialiased">3.5k</p>
                    <p class="block font-sans text-base font-normal leading-relaxed text-gray-500 antialiased">Followers</p>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <p class="block font-sans text-base font-bold leading-relaxed text-gray-900 antialiased">260</p>
                    <p class="block font-sans text-base font-normal leading-relaxed text-gray-500 antialiased">Following</p>
                </div>
            </div>
            <p class="mt-8 block font-sans text-xl font-normal leading-relaxed text-gray-500 antialiased">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic dolores iure quibusdam maxime voluptatibus earum tempore ad rerum cum facere ducimus, non tenetur sint alias voluptas dolorem doloremque itaque aspernatur fuga porro? Possimus.
            </p>
                <button class="mt-2 flex select-none items-center gap-2 rounded-lg px-6 py-3 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    more about me
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true" class="h-3.5 w-3.5 text-gray-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                </svg>
            </button>
        </div>
    </header>
</x-blog.layout>
