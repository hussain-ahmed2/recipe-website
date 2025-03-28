<x-layout>

    <div class="my-14 max-w-7xl mx-auto px-5">
        <!-- Profile Header -->
        <div class="flex items-center space-x-6">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff&size=128"
                alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-gray-200 shadow-md">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
                <a href="/profile/edit" class="">Edit Profile</a> 
            </div>
        </div>

        <hr class="my-6 border-t-2 border-gray-200">

        <!-- Favorite Recipes Section -->
        <h3 class="text-xl font-semibold text-gray-800 mb-4">⭐ Favorite Recipes</h3>

        @if ($favourites->isEmpty())
            <p class="text-gray-500">You haven't added any favorite recipes yet.</p>
        @else
            <div class="my-8">
                <x-recipe.recipe-grid :recipes="$favourites" />
            </div>
            <div>
                @if ($favourites->lastPage() > 1)
                    <a class="btn-light block mx-auto w-fit" href="/favourites">View All</a>
                @endif
            </div>
        @endif

        <!-- User's Recipes Section -->
        <div class="flex flex-warp items-center justify-between gap-5">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-10">👨‍🍳 My Recipes</h3>
            <div>
                <a href="/recipes/create" class="btn">Create</a>
            </div>
        </div>

        @if ($recipes->isEmpty())
            <p class="text-gray-500">You haven't added any recipes yet.</p>
        @else
            <div class="my-8">
                <x-recipe.recipe-grid :$recipes />
            </div>
            <div>
                @if ($recipes->lastPage() > 1)
                    <a class="btn-light block mx-auto w-fit" href="/profile/recipes">View All</a>
                @endif
            </div>
        @endif

    </div>
</x-layout>
