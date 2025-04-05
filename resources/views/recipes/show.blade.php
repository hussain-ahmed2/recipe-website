<x-layout>

    <div class="max-w-7xl mx-auto px-5 my-14">

        @auth
            @if (Auth::user()->id === $recipe->user_id)
                <div class="">
                    <a href="/recipes/{{ $recipe->id }}/edit" class="btn w-fit ml-auto">Edit</a>
                </div>
            @endif
        @endauth

        <div class="flex flex-col gap-12">
            <h1 class="h1">{{ $recipe->name }}</h1>
            <div class="flex items-center flex-wrap gap-16">
                <div class="flex items-center gap-4">
                    <img class="h-12 w-12 rounded-full"
                        src="{{ $recipe->user->avatar ? $recipe->user->avatar : 'https://ui-avatars.com/api/?name=' . urlencode($recipe->user->name) . '&background=random&color=fff&size=128' }}"
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
                        <div class="space-y-2">
                            <h4 class="font-medium uppercase text-xs">Category</h4>
                            <p class="font-medium text-black/60">{{ $recipe->category->name ?? 'Chicken' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <box-icon name='star' type='solid'></box-icon>
                        <div class="space-y-2">
                            <h4 class="font-medium uppercase text-xs">Rating</h4>
                            <p class="font-medium text-black/60">{{ round($recipe->reviews_avg_rating, 1) ?? 'N/A' }} / 5
                            </p>
                        </div>
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

        <div class="my-14">
            <h3 class="font-semibold text-3xl md:text-4xl flex items-center gap-2">
                <box-icon name='star' size="md"></box-icon>
                Reviews and Ratings
            </h3>

            <div class="my-8">
                <ul class="my-8 mx-8 list-inside space-y-4">
                    @foreach ($recipe->reviews as $review)
                        @php
                            if (Auth::user() && $review->user_id === Auth::user()->id) {
                                $alreadyReviewed = $review;
                            }
                        @endphp
                        <li
                            class="p-6 rounded-2xl {{ isset($alreadyReviewed) ? 'bg-green-100' : 'bg-gray-50' }} space-y-5">
                            <div class="flex justify-between flex-wrap">
                                <div class="flex items-center gap-4">
                                    <img class="h-12 w-12 rounded-full"
                                        src="{{ $review->user->avatar ? $review->user->avatar : 'https://ui-avatars.com/api/?name=' . urlencode($review->user->name) . '&background=random&color=fff&size=128' }}"
                                        alt="author">
                                    <div class="space-y-1">
                                        <h3 class="font-bold text-base">{{ $review->user->name ?? 'John Smith' }}</h3>
                                        <p class="text-black/60 font-medium text-sm">
                                            {{ date('d F Y', strtotime($review->created_at)) ?? '05 March 2022' }}</p>
                                    </div>
                                </div>
                                <h4 class="font-medium ms-5">{{ $review->rating }} / 5</h4>
                            </div>
                            <p class="text-black/60 ms-5">
                                {{ $review->review }}
                            </p>
                            @isset($alreadyReviewed)
                                <button id="modal-open-btn" class="block ms-auto btn">Edit</button>
                            @endisset
                        </li>
                    @endforeach
                </ul>

                @if (!isset($alreadyReviewed))
                    <div>
                        <form action="/reviews/{{ $recipe->id }}" method="POST"
                            class="flex flex-col gap-4 max-w-xl my-12 mx-8">
                            @csrf

                            <div class="flex flex-col gap-1">
                                <label class="font-semibold" for="rating">Rating</label>
                                <div class="flex items-center">
                                    <input class="my-4 flex-1 text-black" type="range" name="rating" id="rating"
                                        min="1" max="5" step="1">
                                    <span id="rating-display" class="font-semibold ms-2"></span>
                                </div>
                                @error('rating')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-semibold" for="review">Review</label>
                                <textarea name="review" id="review" class="input" rows="5" placeholder="Enter your review..."></textarea>
                                @error('review')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <x-forms.submit-button>Submit Review</x-forms.submit-button>
                        </form>
                    </div>
                @else
                    <div id="modal"
                        class="fixed top-0 left-0 w-full h-full z-30 bg-black/30 scale-0 transition-transform duration-300">
                        <div
                            class="border border-gray-300 rounded-3xl bg-neutral-50 p-14 max-w-3xl mx-auto w-full mt-20">
                            <div class="flex flex-col gap-4 w-full">
                                <p class="font-semibold text-3xl">Edit your review</p>
                                <form action="/reviews/{{ $alreadyReviewed->id }}" method="POST"
                                    class="flex flex-col gap-4 w-full max-w-3xl">
                                    @csrf
                                    @method('PUT')

                                    <div class="flex flex-col gap-1 w-full max-w-3xl">
                                        <label class="font-semibold" for="rating">Rating</label>
                                        <div class="flex items-center">
                                            <input value="{{ $alreadyReviewed->rating }}"
                                                class="my-4 flex-1 text-black" type="range" name="rating"
                                                id="rating" min="1" max="5" step="1">
                                            <span id="rating-display" class="font-semibold ms-2"></span>
                                        </div>
                                        @error('rating')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex flex-col gap-1">
                                        <label class="font-semibold" for="review">Review</label>
                                        <textarea name="review" id="review" class="input" rows="5" placeholder="Enter your review...">{{ $alreadyReviewed->review }}</textarea>
                                        @error('review')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <x-forms.submit-button>Submit Review</x-forms.submit-button>
                                </form>
                                <form action="/reviews/{{ $alreadyReviewed->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn-danger bg-red-500 hover:bg-red-600 w-full">Delete Review</button>
                                </form>
                                <button id="modal-close-btn" class="btn-danger">Cancel</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="my-20">
                <x-home.newsletter />
            </div>
        </div>

</x-layout>


<script>
    const value = document.querySelector("#rating-display");
    const input = document.querySelector("#rating");
    value.textContent = input.value;
    input.addEventListener("input", (event) => {
        value.textContent = event.target.value;
    });


    const modalOpenBtn = document.getElementById('modal-open-btn');
    const modalCloseBtn = document.getElementById('modal-close-btn');
    const modal = document.getElementById("modal");

    modalOpenBtn.addEventListener('click', () => {
        modal.classList.toggle('scale-0');
        console.log('open')
    })
    modalCloseBtn.addEventListener('click', () => {
        modal.classList.toggle('scale-0');
        console.log('close')
    })
</script>
