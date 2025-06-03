<div class="flex items-center justify-center gap-2 p-3 md:justify-between">
    <form action="{{ route("category") }}" method="GET" enctype="multipart/form-data" class="flex items-center justify-start gap-1">
        <div class="w-fit">
            <div class="relative h-10 w-full min-w-[200px]">
                <label class="input">
                    <i class="ri-search-2-line h-[1em] opacity-50"></i>
                    <input class="text-blue-900 focus:ring-0" type="search" name="search" required placeholder="Searching....." />
                </label>
            </div>
        </div>
        <button class="btn btn-neutral rounded-lg" type="submit">
            Search
        </button>
    </form>
    <div>
        <a href="{{ route("category.create") }}" class="btn rounded-lg bg-emerald-600 text-white">
            <i class="ri-add-line"></i>
            <span>Create</span>
        </a>
    </div>
</div>
<div class="rounded-box border-base-content/5 bg-base-100 overflow-x-auto overflow-y-auto border">
    <table class="table-zebra table">
        <thead class="bg-base-200 text-blue-900">
            <tr class="text-center">
                <th></th>
                <th>Name</th>
                <th>Color</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td><span class="{{ $category->color }} badge">{{ $category->color }}</span></td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route("category.show", $category->slug) }}" class="btn btn-info btn-xs btn-outline">
                                <i class="ri-eye-line"></i>
                                <span>Show</span>
                            </a>
                            <a href="{{ route("category.edit", $category->slug) }}" class="btn btn-warning btn-xs btn-outline">
                                <i class="ri-pencil-fill"></i>
                                <span>Edit</span>
                            </a>
                            <form id="delete-form-{{ $category->id }}" action="{{ route("category.delete", $category->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                <button type="button" onclick="confirmDelete({{ $category->id }})" class="btn btn-error btn-xs btn-outline">
                                    <i class="ri-delete-bin-6-line"></i>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container px-2 py-3">
        @if ($categories->hasPages())
            {{ $categories->links() }}
        @endif
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
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
