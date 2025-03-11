@php
    $recipes = [
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
        [
            'title' => 'Big and Juicy Wagyu Beef Cheeseburger',
            'image' => 'resources/images/recipe-1.png',
            'cooking_time' => '30',
            'category' => 'Snack',
        ],
    ];
@endphp

<div class="max-w-7xl mx-auto">
    <div class="flex flex-col gap-8 justify-center items-center mb-20">
        <h2 class="font-semibold text-5xl">Simple and tasty recipes</h2>
        <p class="text-black/60 max-w-2xl">Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqut enim ad minim </p>
    </div>

    <div class="grid grid-cols-3 gap-10">
        @foreach ($recipes as $recipe)
            <article class="relative p-5 rounded-3xl bg-gradient-to-b from-white to-cyan-100 flex flex-col gap-8">
                <img class="h-62" src="{{ Vite::asset($recipe['image']) }}" alt="recipe image">
                <h3 class="font-semibold text-2xl">{{ $recipe['title'] }}</h3>
                <div class="flex items-center gap-6 mb-4">
                    <div class="flex items-center gap-3">
                        <box-icon type='solid' name='time'></box-icon>
                        <p class="text-black/60 font-medium text-sm">{{ $recipe['cooking_time'] }} Minutes</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <box-icon type='solid' name='dish'></box-icon>
                        <p class="text-black/60 font-medium text-sm">{{ $recipe['category'] }}</p>
                    </div>
                </div>
                <button class="absolute top-10 right-10">
                    <box-icon class="bg-white h-12 w-12 p-2.5 rounded-full" color="{{ round(rand(0, 1)) ? 'red':'lightgray' }}"  name='heart' type='solid' ></box-icon>
                </button>
            </article>
        @endforeach
    </div>
</div>
