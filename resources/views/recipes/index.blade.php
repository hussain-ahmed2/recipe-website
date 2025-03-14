<x-layout>

    <div class="my-14 max-w-7xl mx-auto px-5">

        <div>
            <form class="flex justify-center gap-1 mb-10 max-w-xl mx-auto" action="/recipes" method="GET">
                <input class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300" name="search" placeholder="Search here..." value="{{ request()->search }}" required />
                <button class="px-7 py-3 bg-black rounded-lg text-white hover:bg-black/80">Search</button>
            </form>
        </div>

        <x-recipe.recipe-grid :$recipes />

        <div class="my-5">
            {{ $recipes->links('pagination::custom') }}
        </div>
    </div>

</x-layout>