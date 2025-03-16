<x-layout>

    <div class="my-14 max-w-7xl mx-auto px-5">

        <div>
            <form class="" action="/recipes" method="GET">
                <div class="flex justify-center gap-1 mb-10 max-w-xl mx-auto">
                    <div class="w-full relative">
                        <input
                            id="search"
                            class="peer border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                            name="search" placeholder="Search here..." value="{{ request()->search }}" />
                        <button id="clear-search" class="absolute top-0 right-0 h-full w-8 hidden justify-center items-center z-20 peer-focus:flex cursor-pointer">
                            <box-icon class="w-8" size="md" name="x"></box-icon>
                        </button>
                    </div>
                    <button class="px-7 py-3 bg-black rounded-lg text-white hover:bg-black/80">Search</button>
                </div>

                <div class="flex mb-5 justify-end gap-5 flex-wrap">
                    <div class="flex justify-center gap-1 items-center">
                        <label class="text-nowrap me-1" for="sort">Sort By</label>
                        <select id="sort"
                            class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                            name="sort">
                            <option value="latest" {{ request()->sort == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="oldest" {{ request()->sort == 'oldest' ? 'selected' : '' }}>Oldest</option>
                            <option value="name_asc" {{ request()->sort == 'name_asc' ? 'selected' : '' }}>A-Z</option>
                            <option value="name_desc" {{ request()->sort == 'name_desc' ? 'selected' : '' }}>Z-A
                            </option>
                        </select>
                        <button class="px-7 py-3 bg-black rounded-lg text-white hover:bg-black/80">Sort</button>
                    </div>
                    <div class="flex justify-center gap-1 items-center">
                        <label class="me-1" for="category">Category</label>
                        <select id="category"
                            class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                            name="category" id="category">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}"
                                    {{ request()->category == $category->slug ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="px-7 py-3 bg-black rounded-lg text-white hover:bg-black/80">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <p class="text-black/60 mb-5">
            @if (request()->search)
                Showing search result for "{{ request()->search }}"
            @endif
        </p>

        <div>
            @if ($recipes->total())
                <x-recipe.recipe-grid :$recipes />
            @else
                <p class="text-black/60 my-10 text-center">No Recipe found!</p>
            @endif
        </div>

        <div class="my-5">
            {{ $recipes->links('pagination::custom') }}
        </div>
    </div>

</x-layout>
