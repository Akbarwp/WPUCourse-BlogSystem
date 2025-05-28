@props(["href", "title", "icon", "current" => false, "ariaCurrent" => false])

@php
    $classes = $current ? "rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" : "text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20";

    if ($current) {
        $classes = "rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none";
        $ariaCurrent = "page";
    } else {
        $classes = "text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20";
    }
@endphp

<li {{ $attributes->merge(["class" => "rounded-lg mx-1 px-3 py-2 text-center align-middle text-xs font-bold uppercase transition-all " . $classes, ' aria-current' => $ariaCurrent]) }}>
    <a href="{{ $href }}" class="flex items-center gap-2 antialiased">
        <i class="{{ $icon }} text-xl font-normal"></i>
        <span>{{ $title }}</span>
    </a>
</li>
