@props(['recipe'])

<a href="/recipes/{{ $recipe->id }}">
    <article
        class="h-full relative p-5 rounded-3xl bg-gradient-to-b from-white to-cyan-50 flex flex-col gap-8 hover:from-cyan-100 hover:to-orange-100 border border-transparent hover:border-black/10 hover:shadow-lg tc">
        <img class="rounded-3xl w-full" src="{{ $recipe->image }}" alt="recipe image">
        <h4 class="h4">{{ $recipe->name }}</h4>
        <div class="flex items-center gap-6 mt-auto">
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
        <form action="/favourites/{{ $recipe->id }}" method="POST">
            @csrf
            <button class="absolute top-10 right-10" type="submit">
                <box-icon
                    class="bg-white h-12 w-12 p-2.5 rounded-full border border-transparent tc hover:shadow cursor-pointer hover:border-black/10"
                    color="{{ (Auth::user() ? Auth::user()->favourites->contains($recipe->id) : false) ? 'oklch(0.645 0.246 16.439)' : 'lightgray' }}"
                    name='heart' type='solid'></box-icon>
            </button>
        </form>
    </article>
</a>
