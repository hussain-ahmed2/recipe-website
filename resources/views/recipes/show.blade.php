<x-layout>

    <div class="max-w-7xl mx-auto px-5 my-14">

        @if (Auth::user()->id === $recipe->user_id)
            <div class="">
                <a href="/recipes/{{ $recipe->id }}/edit" class="btn w-fit ml-auto">Edit</a>
            </div>
        @endif

        <div class="flex flex-col gap-12">
            <h1 class="h1">{{ $recipe->name }}</h1>
            <div class="flex items-center flex-wrap gap-16">
                <div class="flex items-center gap-4">
                    <img class="h-12 w-12" src="{{ Vite::asset('resources/images/featured-recipe-author.png') }}"
                        alt="author">
                    <div class="space-y-1">
                        <h3 class="font-bold text-base">{{ $recipe->user->name ?? 'John Smith' }}</h3>
                        <p class="text-black/60 font-medium text-sm">
                            {{ date('d F Y', strtotime($recipe->created_at)) ?? '05 March 2022' }}</p>
                    </div>
                </div>
                <div class="flex items-center flex-wrap gap-16 text-sm">
                    <div class="flex items-center gap-4">
                        <box-icon type='solid' name='time'></box-icon>
                        <div class="space-y-2">
                            <h4 class="font-medium uppercase text-xs">Prep Time</h4>
                            <p class="font-medium text-black/60"> {{ $recipe->prepTimeMinutes ?? 30 }} Minutes</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <box-icon type='solid' name='time'></box-icon>
                        <div class="space-y-2">
                            <h4 class="font-medium uppercase text-xs">Cook Time</h4>
                            <p class="font-medium text-black/60"> {{ $recipe->cookTimeMinutes ?? 30 }} Minutes</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <box-icon type='solid' name='dish'></box-icon>
                        <p class="font-medium text-black/60">{{ $recipe->category->name ?? 'Chicken' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 flex flex-col md:flex-row gap-10">
            <img class="w-2/3 max-md:w-full max-h-[35rem] object-cover rounded-2xl" src="{{ $recipe->image }}"
                alt="{{ $recipe->name }}">
            <div class="rounded-2xl md:w-1/3 bg-cyan-100 p-6 flex flex-col justify-between gap-10">
                <div>
                    <h3 class="text-2xl font-semibold">Information</h3>
                    <div class="font-medium text-lg flex flex-col mt-5">
                        <p class="flex text-black/60 border-b border-black/10 justify-between py-3">
                            Calories <span class="text-black">{{ $recipe->caloriesPerServing }} kcal</span>
                        </p>
                        <p class="flex text-black/60 border-b border-black/10 justify-between py-3">
                            Servings <span class="text-black">{{ $recipe->servings }}</span>
                        </p>
                        <p class="flex text-black/60 border-b border-black/10 justify-between py-3">
                            Difficulty <span class="text-black">{{ $recipe->difficulty }}</span>
                        </p>
                        <p class="flex text-black/60 border-b border-black/10 justify-between py-3">
                            Cuisine <span class="text-black">{{ $recipe->cuisine }}</span>
                        </p>
                    </div>
                </div>

                <div class="text-black/60">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, odit debitis. Reprehenderit eos sed
                </div>
            </div>
        </div>

        <p class="my-12 text-black/70">
            {{ $recipe->description }}
        </p>

        <div>
            <h3 class="font-semibold text-3xl md:text-4xl flex items-center gap-2">
                <box-icon name='list-ul' size="md"></box-icon>
                Ingredients
            </h3>

            <ul class="my-8 ms-8 list-disc list-inside space-y-4">
                @foreach (json_decode($recipe->ingredients) as $ingredient)
                    <li class="text-lg font-medium text-black/90">
                        {{ $ingredient }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-semibold text-3xl md:text-4xl flex items-center gap-2">
                <box-icon name='list-ol' size="md"></box-icon>
                Instructions
            </h3>

            <ol class="my-8 ms-8 list-decimal list-inside space-y-4">
                @foreach (json_decode($recipe->instructions) as $instruction)
                    <li class="text-lg font-medium text-black/90">
                        {{ $instruction }}
                    </li>
                @endforeach
            </ol>
        </div>

        <div class="my-20">
            <x-home.newsletter />
        </div>
    </div>

</x-layout>
