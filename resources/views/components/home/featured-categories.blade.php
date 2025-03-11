@php
    $categories = [
        'Breakfast' => [
            'title' => 'Breakfast',
            'image' => '🍙',
        ],
        'Vegan' => [
            'title' => 'Vegan',
            'image' => '🥬',
        ],
        'Meat' => [
            'title' => 'Meat',
            'image' => '🥩',
        ],
        'Dessert' => [
            'title' => 'Dessert',
            'image' => '🍰',
        ],
        'Lunch' => [
            'title' => 'Lunch',
            'image' => '🥪',
        ],
        'Chocolate' => [
            'title' => 'Chocolate',
            'image' => '🍫',
        ],
    ];
@endphp


<div class="max-w-7xl mx-auto my-40">
    <div class="flex items-center justify-between mb-20">
        <h2 class="text-5xl font-semibold">Categories</h2>
        <button class="px-7 py-4 bg-cyan-100 rounded-2xl font-semibold">View All Categories</button>
    </div>
    <div class="flex justify-between items-center">
        @foreach ($categories as $category)
            <div class="flex flex-col items-center justify-between gap-10 p-6 bg-gradient-to-b from-white to-orange-50 rounded-4xl">
                <div class="text-8xl drop-shadow-2xl">{{ $category['image'] }}</div>
                <h4 class="font-semibold text-lg">{{ $category['title'] }}</h4>
            </div>
        @endforeach
    </div>
</div>
