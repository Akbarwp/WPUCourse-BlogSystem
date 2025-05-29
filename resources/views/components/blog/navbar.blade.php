<nav id="navbar" class="top-0 z-50 block w-full max-w-full rounded-none border-0 border-white/80 px-4 py-4 transition {{ request()->is('posts/*') ? 'fixed bg-transparent' : 'sticky bg-white/80 backdrop-blur-2xl backdrop-saturate-200' }}" x-data="{ isOpen: false }">
    <div class="container mx-auto flex items-center justify-between">
        <a class="m-0 block whitespace-nowrap text-sm text-gray-900" href="{{ route("index") }}">
            <img src="{{ asset("img/logo.png") }}" class="ease-nav-brand inline w-16 rounded-lg transition-all duration-200" alt="main_logo" />
            <span class="ease-nav-brand font-space-grotesk ml-2 font-bold transition-all duration-200">AkbarWP Blog</span>
        </a>
        <ul class="ml-10 hidden items-center lg:flex">
            <x-blog.nav-link :href="route('index')" title="Home" icon="ri-home-9-line" :current="request()->routeIs('index')" />
            <x-blog.nav-link :href="route('blog')" title="Blog" icon="ri-news-line" :current="request()->routeIs('blog')" />
            <x-blog.nav-link :href="route('about')" title="About" icon="ri-at-line" :current="request()->routeIs('about')" />
            <x-blog.nav-link :href="route('contact')" title="Contact" icon="ri-contacts-book-line" :current="request()->routeIs('contact')" />
        </ul>
        <div class="hidden items-center gap-2 lg:flex">
            @if (Auth::check())
                <div class="dropdown dropdown-bottom dropdown-end">
                    <div tabindex="0" role="button" class="cursor-pointer">
                        @if (Auth::user()->avatar != null)
                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                        @else
                            <img src="https://picsum.photos/id/30/1280/901.webp" alt="{{ Auth::user()->name }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                        @endif
                        <span class="ml-2 font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                        <li>
                            <a href="{{ route("dashboard") }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route("profile.edit") }}">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route("logout") }}" method="POST">
                                @csrf
                                <button type="submit" class="cursor-pointer" onclick="event.preventDefault(); this.closest('form').submit();">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route("login") }}" class="rounded-lg px-6 py-3 text-center align-middle text-xs font-bold uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Login
                </a>
                <a href="{{ route("register") }}" class="rounded-lg bg-gray-900 px-6 py-3 text-center align-middle text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Register
                </a>
            @endif
        </div>

        <button @click="isOpen = !isOpen" class="relative ml-auto inline-block h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden" type="button" aaria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform">
                <i class="ri-align-justify h-6 w-6 text-xl" :class="{ 'block': !isOpen, 'hidden': isOpen }"></i>
                <i class="ri-close-fill h-6 w-6 text-xl" :class="{ 'block': isOpen, 'hidden': !isOpen }"></i>
            </span>
        </button>
    </div>

    {{-- Mobile Responsive --}}
    <div class="z-40 w-full basis-full rounded-b-md pb-2 shadow-md" :class="{ 'h-auto': isOpen, 'h-0': !isOpen }" x-show="isOpen" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-4 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-50 transform" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 -translate-y-2 scale-95">
        <div class="container mx-auto mt-3 border-t border-gray-200 bg-white px-2 pt-4">
            <ul class="flex flex-col gap-1">
                <x-blog.nav-link :href="route('index')" title="Home" icon="ri-home-9-line" :current="request()->routeIs('index')" />
                <x-blog.nav-link :href="route('blog')" title="Blog" icon="ri-news-line" :current="request()->routeIs('blog')" />
                <x-blog.nav-link :href="route('about')" title="About" icon="ri-at-line" :current="request()->routeIs('about')" />
                <x-blog.nav-link :href="route('contact')" title="Contact" icon="ri-contacts-book-line" :current="request()->routeIs('contact')" />
            </ul>
            <div class="divider"></div>
            @if (Auth::check())
                <ul class="flex flex-col gap-1">
                    <div class="mb-2">
                        @if (Auth::user()->avatar != null)
                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                        @else
                            <img src="https://picsum.photos/id/30/1280/901.webp" alt="{{ Auth::user()->name }}" class="relative inline-block h-9 w-9 rounded-full object-cover object-center">
                        @endif
                        <span class="ml-2 font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <x-blog.nav-link :href="route('dashboard')" title="Dashboard" icon="ri-dashboard-line" />
                    <x-blog.nav-link :href="route('profile.edit')" title="Profile" icon="ri-user-line" />
                    <li>
                        <form action="{{ route("logout") }}" method="POST">
                            @csrf
                            <x-blog.nav-link :href="route('logout')" title="Logout" icon="ri-logout-circle-line" onclick="event.preventDefault(); this.closest('form').submit();" />
                        </form>
                    </li>
                </ul>
            @else
                <div class="mb-4 mt-6 flex items-center gap-2">
                    <a href="{{ route("login") }}" class="rounded-lg px-6 py-3 text-center align-middle text-xs font-bold uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        Login
                    </a>
                    <a href="{{ route("register") }}" class="rounded-lg bg-gray-900 px-6 py-3 text-center align-middle text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Register
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>
