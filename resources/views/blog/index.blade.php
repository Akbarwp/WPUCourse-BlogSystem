<x-blog.layout :title="$title">
    <header class="bg-white px-8">
        <div class="container mx-auto w-full pb-24 pt-12 text-center">
            <p class="text-blue-gray-900 mx-auto block w-full font-sans text-[30px] font-bold leading-[45px] antialiased lg:max-w-2xl lg:text-[48px] lg:leading-[60px]">
                Web Development Blog @ <a href="https://github.com/Akbarwp" class="text-blue-900 transition hover:text-blue-800">AkbarWP</a>
            </p>
            <p class="mx-auto mb-4 mt-8 block w-full px-8 font-sans text-xl font-normal leading-relaxed antialiased lg:w-10/12 lg:px-12 xl:w-8/12 xl:px-20">
                Expand your web development knowledge with our tutorials and learning articles.</p>
            <div class="grid place-items-start justify-center gap-2">
                <form action="" method="GET" enctype="multipart/form-data" class="mt-8 flex flex-col items-center justify-center gap-4 md:flex-row">
                    <div class="w-80">
                        <div class="relative h-10 w-full min-w-[200px]">
                            <label class="input">
                                <i class="ri-search-2-line h-[1em] opacity-50"></i>
                                <input class="focus:ring-0 text-blue-900" type="search" name="search" required placeholder="Searching....." />
                            </label>
                        </div>
                    </div>
                    <button class="block w-full shrink-0 cursor-pointer select-none rounded-lg bg-gray-900 px-6 py-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:w-max" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </header>
</x-blog.layout>
