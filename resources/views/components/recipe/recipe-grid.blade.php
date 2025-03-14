@props(['recipes'])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
    @foreach ($recipes as $recipe)
        <x-recipe.recipe-card :$recipe />
    @endforeach
</div>
