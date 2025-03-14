<x-layout>
    <div class="max-w-7xl mx-auto px-5 my-14">

        <h2 class="h2 mb-10">Your Favourite Recipes</h2>

        <x-recipe.recipe-grid :recipes="$favourites" />

        <div class="my-8">
            {{ $favourites->links('pagination::custom') }}
        </div>

        <div class="py-10">
            <x-home.newsletter />
        </div>

    </div>
</x-layout>