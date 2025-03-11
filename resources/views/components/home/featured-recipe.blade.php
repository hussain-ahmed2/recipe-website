<article class="flex items-center justify-between gap-10 my-10">
    <div class="h-[37.5rem] bg-cyan-100 w-10 rounded-e-[3rem]"></div>
    <div class="grid grid-cols-2 overflow-hidden rounded-[3rem] h-[40rem] max-w-7xl">
        <div class="bg-cyan-100 p-[3.125rem] flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 px-5 py-3 rounded-[1.875rem] bg-white shadow-md w-fit">
                    <img class="h-6 w-6" src="{{ Vite::asset('resources/logos/hot-recipe.png') }}" alt="Logo">
                    <p class="font-semibold text-sm">Hot Recipe</p>
                </div>
                <h1 class="font-semibold text-6xl my-8">Spicy delicious chicken wings</h1>
                <p class="text-black/60 mb-8">
                    Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqut enim ad minim
                </p>
                <div class="flex gap-5">
                    <div class="flex items-center gap-2 rounded-[1.875rem] px-5 py-3 bg-black/5">
                        <box-icon type='solid' name='time'></box-icon>
                        <p class="font-medium text-sm text-black/60">30 Minutes</p>
                    </div>
                    <div class="flex items-center gap-2 rounded-[1.875rem] px-5 py-3 bg-black/5">
                        <box-icon type='solid' name='dish'></box-icon>
                        <p class="font-medium text-sm text-black/60">Chicken</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <img class="h-12 w-12" src="{{ Vite::asset('resources/images/featured-recipe-author.png') }}"
                        alt="author">
                    <div class="">
                        <h3 class="font-bold">John Smith</h3>
                        <p class="text-black/60 font-medium text-sm">05 March 2022</p>
                    </div>
                </div>
                <button class="bg-black rounded-2xl px-9 py-4 flex items-center gap-3 text-white">
                    <p>View Recipes</p>
                    <box-icon color="white" name='play-circle'></box-icon>
                </button>
            </div>
        </div>
        <div class="relative h-[40rem]">
            <img class="h-full w-full" src="{{ Vite::asset('resources/images/featured-recipe.png') }}" alt="featured-recipe">
            <img class="absolute top-12 -left-12 h-36 w-36"
                src="{{ Vite::asset('resources/logos/handpicked-recipes.png') }}" alt="handpicked-recipes">
        </div>
    </div>
    <div class="h-[37.5rem] bg-cyan-100 w-10 rounded-s-[3rem]"></div>
</article>
