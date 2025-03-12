@props(['recipe'])

<article class="flex items-center justify-between gap-10">
    <div class="bg-cyan-50 h-[37.5rem] w-10 rounded-e-[3rem] max-sm:hidden"></div>
    <div class="bg-cyan-50 min-h-[40rem] grid grid-cols-2 max-md:grid-cols-1 overflow-hidden rounded-[3rem] max-w-7xl">
        <div class="max-md:bg-cyan-50/50 p-[3.125rem] max-sm:p-8 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 px-5 py-3 rounded-[1.875rem] bg-white shadow-md w-fit">
                    <img class="h-6 w-6" src="{{ Vite::asset('resources/logos/hot-recipe.png') }}" alt="Logo">
                    <p class="font-semibold text-sm">Hot Recipe</p>
                </div>
                <h1 class="h1 my-8">{{ $recipe->name ?? "Spicy delicious chicken wings" }}</h1>
                <p class="text-black/60 mb-8">
                    {{ $recipe->description ?? "Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqut enim ad minim" }}
                </p>
                <div class="flex gap-5 flex-wrap">
                    <div class="tag">
                        <box-icon type='solid' name='time'></box-icon>
                        <p class="font-medium text-sm text-black/60"> {{ $recipe->cookTimeMinutes ?? 30 }} Minutes</p>
                    </div>
                    <div class="tag">
                        <box-icon type='solid' name='dish'></box-icon>
                        <p class="font-medium text-sm text-black/60">{{ $recipe->category->name ?? "Chicken" }}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center flex-wrap gap-5 mt-10">
                <div class="flex items-center gap-4">
                    <img class="h-12 w-12" src="{{ Vite::asset('resources/images/featured-recipe-author.png') }}"
                        alt="author">
                    <div class="">
                        <h3 class="font-bold text-base">{{ $recipe->user->name ?? "John Smith" }}</h3>
                        <p class="text-black/60 font-medium text-sm">{{ date('d F Y', strtotime($recipe->created_at)) ?? "05 March 2022" }}</p>
                    </div>
                </div>
                <a href="/recipes/{{ $recipe->id }}" class="btn">
                    <p>View Recipes</p>
                    <box-icon color="white" name='play-circle'></box-icon>
                </a>
            </div>
        </div>
        <div class="relative h-full max-md:order-first">
            <img class="object-cover h-full w-full max-md:h-72" src="{{ $recipe->image }}" alt="featured-recipe">
            <img class="absolute top-12 md:-left-12 h-18 md:h-36 w-18 md:w-36"
                src="{{ Vite::asset('resources/logos/handpicked-recipes.png') }}" alt="handpicked-recipes">
        </div>
    </div>
    <div class="h-[37.5rem] bg-cyan-50 w-10 rounded-s-[3rem] max-sm:hidden"></div>
</article>
