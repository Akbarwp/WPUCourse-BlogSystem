<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Category") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="shadow-xs overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($errors->any())
                        <div class="mb-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800">
                            <i class="ri-alert-fill mr-3 mt-[2px] inline shrink-0 text-lg"></i>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Ensure that these requirements are met:</span>
                                <ul class="mt-1.5 list-inside list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route("category.store") }}" method="POST" enctype="multipart/form-data" id="post-form">
                        @csrf
                        <div class="w-full flex flex-col md:flex-row justify-center items-center gap-2">
                            <fieldset class="fieldset w-full md:w-1/2">
                                <legend class="fieldset-legend">Name:</legend>
                                <input type="text" name="name" class="input @error("name") input-error bg-red-50 @enderror w-full" placeholder="Lorem ipsum dolor sit amet" value="{{ old("name") }}" autofocus required />
                                @error("name")
                                    <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset w-full md:w-1/2">
                                <legend class="fieldset-legend">Color:</legend>
                                <select class="select @error("color") select-error @enderror w-full" name="color" required>
                                    <option disabled selected>Select a color!</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ 'bg-'.$color.'-100' }}" @selected(old("color") == ('bg-'.$color.'-100')) class="{{ 'bg-'.$color.'-100' }}">{{ $color }}</option>
                                    @endforeach
                                </select>
                                @error("color")
                                    <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="mt-4 flex items-center justify-start gap-2">
                            <button type="submit" class="btn btn-success w-1/2 rounded-lg">Save</button>
                            <a href="{{ route("category") }}" class="btn btn-error w-1/2 rounded-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
