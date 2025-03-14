@props(['categories'])

<div class="max-w-7xl mx-auto px-5">
    <div class="flex items-center justify-between mb-20">
        <h2 class="h2">Categories</h2>
        <a href="/categories" class="btn-light max-md:hidden">View All Categories</a>
    </div>
    <div class="flex justify-center flex-wrap gap-5 md:gap-10">
        @foreach ($categories as $category)
            <a 
                href="/categories/{{ $category->id }}"
                class="max-w-42 flex flex-col items-center justify-between gap-10 p-6 bg-gradient-to-b from-white to-orange-50 hover:from-orange-50 hover:to-orange-100 tc rounded-3xl md:rounded-4xl">
                <div class="text-6xl md:text-8xl drop-shadow-2xl">{{ $category->icon }}</div>
                <h4 class="font-semibold text-lg">{{ $category->name }}</h4>
            </a>
        @endforeach
    </div>
    <div class="w-full md:hidden mt-5 md:mt-10">
        <button class="btn-light ">View All Categories</button>
    </div>
</div>
