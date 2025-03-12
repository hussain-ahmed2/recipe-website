<x-layout>

    <div class="flex flex-col gap-25 my-14">
        <x-home.featured-recipe :recipe="$featuredRecipe" />

        <x-home.featured-recipes :$recipes />

        <x-home.featured-categories :$categories />

        <x-home.chef-blog />

        <x-home.newsletter />
    </div>

</x-layout>
