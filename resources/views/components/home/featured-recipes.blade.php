@props(['recipes'])

<div class="max-w-7xl mx-auto px-5">
    <div class="flex flex-col gap-8 justify-center items-center mb-20">
        <h2 class="h2">Simple and tasty recipes</h2>
        <p class="text-black/60 max-w-2xl max-md:text-center">Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqut enim ad minim </p>
    </div>

    <x-recipe.recipe-grid :$recipes />
</div>
