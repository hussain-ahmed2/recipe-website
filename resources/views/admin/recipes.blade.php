<x-layout>

    <x-admin-layout title="Recipes">

        <div class="mb-8">
            <a href="/admin/recipes/create"
                class="w-fit ml-auto bg-black hover:bg-black/85 transition duration-300 rounded-lg px-7 py-3 mb-5 flex items-center justify-center gap-3 text-white active:ring-4 ring-black/10">Create</a>
            <form class="flex gap-1" action="/admin/recipes" method="GET">
                <div class="w-full relative">
                    <input id="search"
                        class="peer border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                        type="text" name="search" placeholder="Search..." value="{{ request()->search ?? '' }}">
                    <button id="clear-search"
                        class="absolute top-0 right-0 h-full w-8 hidden justify-center items-center z-20 peer-focus:flex cursor-pointer">
                        <box-icon class="w-8" size="md" name="x"></box-icon>
                    </button>
                </div>
                <button type="submit"
                    class="bg-black hover:bg-black/85 transition duration-300 rounded-lg px-7 flex items-center justify-center gap-3 text-white active:ring-4 ring-black/10">Search</button>
            </form>
        </div>

        <table class="table table-auto w-full border border-black/10">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Image</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Category</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($recipes as $recipe)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ Str::startsWith($recipe->image, 'http') ? $recipe->image : Vite::asset($recipe->image) }}"
                                        alt="avatar">
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $recipe->name }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $recipe->category->name }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex gap-5">
                                <a href="/admin/recipes/{{ $recipe->id }}/edit" class="text-blue-600">Edit</a>
                                <form action="/admin/recipes/{{ $recipe->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="my-8">
            {{ $recipes->links('pagination::custom') }}
        </div>
    </x-admin-layout>

</x-layout>
