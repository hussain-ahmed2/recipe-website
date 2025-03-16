<x-layout>

    <div class="my-14 mx-auto max-w-7xl px-5">

        <h2 class="h2 mb-10">All Categories</h2>

        <div class="flex justify-center flex-wrap gap-5 md:gap-10">
            @foreach ($categories as $category)
                <a href="/recipes?category={{ $category->id }}"
                    class="max-w-42 flex flex-col items-center justify-between gap-10 p-6 bg-gradient-to-b from-white to-orange-50 hover:from-orange-50 hover:to-orange-100 tc rounded-3xl md:rounded-4xl">
                    <div class="text-6xl md:text-8xl drop-shadow-2xl">{{ $category->icon }}</div>
                    <h4 class="font-semibold text-lg">{{ $category->name }}</h4>
                </a>
            @endforeach
        </div>

        <div class="my-14">
            <x-home.newsletter />
        </div>
    </div>
</x-layout>
