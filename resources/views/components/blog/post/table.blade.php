<div class="flex items-center justify-center gap-2 p-3 md:justify-between">
    <form action="{{ route("dashboard") }}" method="GET" enctype="multipart/form-data" class="flex items-center justify-start gap-1">
        @if (request("category"))
            <input type="hidden" name="category" value="{{ request("category") }}">
        @endif
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
        <a href="{{ route("post.create") }}" class="btn rounded-lg bg-emerald-600 text-white">
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
                <th class="w-full text-center lg:w-1/3">Title</th>
                <th class="text-center">Category</th>
                <th>Author</th>
                <th>Published At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route("dashboard") }}?category={{ $post->category->slug }}" class="{{ $post->category->color }} badge">{{ $post->category->name }}</a></td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route("post.show", $post->slug) }}" class="btn btn-info btn-xs btn-outline">
                                <i class="ri-eye-line"></i>
                                <span>Show</span>
                            </a>
                            <a href="{{ route("post.edit", $post->slug) }}" class="btn btn-warning btn-xs btn-outline">
                                <i class="ri-pencil-fill"></i>
                                <span>Edit</span>
                            </a>
                            <form id="delete-form-{{ $post->id }}" action="{{ route("post.delete", $post->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                <button type="button" onclick="confirmDelete({{ $post->id }})" class="btn btn-error btn-xs btn-outline">
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
        @if ($posts->hasPages())
            {{ $posts->links() }}
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
