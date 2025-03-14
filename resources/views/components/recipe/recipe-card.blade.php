@props(['recipe'])

<a href="/recipes/{{ $recipe->id }}">
    <article
        class="h-full relative p-5 rounded-3xl bg-gradient-to-b from-white to-cyan-50 flex flex-col gap-8 hover:from-cyan-100 hover:to-orange-100 border border-transparent hover:border-black/10 hover:shadow-lg tc">
        <img class="rounded-3xl w-full" src="{{ $recipe->image }}" alt="recipe image">
        <h4 class="h4">{{ $recipe->name }}</h4>
        <div class="flex items-center gap-6 mb-4 mt-auto">
            <div class="flex items-center gap-3">
                <box-icon type='solid' name='time'></box-icon>
                <p class="text-black/60 font-medium text-sm">
                    {{ $recipe->cookTimeMinutes ? $recipe->cookTimeMinutes : $recipe->prepTimeMinutes }} Minutes</p>
            </div>
            <div class="flex items-center gap-3">
                <box-icon type='solid' name='dish'></box-icon>
                <p class="text-black/60 font-medium text-sm">{{ $recipe->category->name }}</p>
            </div>
        </div>
        <button class="absolute top-10 right-10">
            <box-icon class="bg-white h-12 w-12 p-2.5 rounded-full"
                color="{{ round(rand(0, 1)) ? 'red' : 'lightgray' }}" name='heart' type='solid'></box-icon>
        </button>
    </article>
</a>
