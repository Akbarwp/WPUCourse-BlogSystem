<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __("Category Detail") }}
            </h2>
            <div class="flex items-center justify-center gap-1">
                <a href="{{ route("category") }}" class="btn btn-neutral btn-sm btn-outline rounded-lg">
                    <i class="ri-arrow-left-fill"></i>
                    <span>Back</span>
                </a>
                <a href="{{ route("category.edit", $category->slug) }}" class="btn btn-warning btn-sm btn-outline rounded-lg">
                    <i class="ri-pencil-fill"></i>
                    <span>Edit</span>
                </a>
                <form id="delete-form" action="{{ route("category.delete", $category->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-error btn-sm btn-outline rounded-lg" onclick="confirmDelete({{ $category->id }})">
                        <i class="ri-delete-bin-6-line"></i>
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="shadow-xs overflow-hidden bg-white py-3 sm:rounded-lg">
                <div class="mx-auto max-w-screen-md rounded-lg bg-white">
                    <h6 class="block text-base font-semibold leading-relaxed tracking-normal antialiased">
                        Name:
                        <span class="font-semibold text-blue-500 transition hover:text-blue-800">{{ $category->name }}</span> | <span class="text-gray-500">{{ $category->created_at->diffForHumans() }}</span>
                    </h6>
                    <h6 class="block text-base font-semibold leading-relaxed tracking-normal antialiased">
                        Color:
                        <span class="{{ $category->color }} badge badge-lg">{{ $category->color }}</span>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    @push("script")
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
    @endpush
</x-app-layout>
