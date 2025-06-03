<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Category") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="shadow-xs overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Session::has("success"))
                        <div role="alert" id="alert" class="alert alert-info alert-soft">
                            <i class="ri-information-2-line shrink-0 stroke-current text-2xl"></i>
                            <span>{{ Session::get("success") }}</span>
                            <i class="ri-close-line cursor-pointer text-xl" id="closeAlert"></i>
                        </div>
                    @endif
                    <x-blog.category.table :categories="$categories" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
