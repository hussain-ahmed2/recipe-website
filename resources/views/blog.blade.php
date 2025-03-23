<x-layout>
    <div class="my-14 mx-auto max-w-7xl px-6">
        <div>
            <h1 class="h1 font-semibold text-center mb-10">Full Guide to Becoming a Professional Chef</h1>
            <div class="flex items-center gap-4 justify-center">
                <img class="h-12 w-12" src="{{ Vite::asset('resources/images/featured-recipe-author.png') }}"
                    alt="author">
                <div class="flex justify-between items-center gap-16">
                    <h3 class="font-bold text-base">{{ 'John Smith' }}</h3>
                    <p class="text-black/60 font-medium text-sm">
                        {{ '05 March 2022' }}</p>
                </div>
            </div>
            <p class="text-black/60 my-10 text-center max-w-6xl mx-auto px-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue
                diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.
            </p>
        </div>

        <div class="mt-14">
            <img src="{{ Vite::asset('resources/images/blog-image.png') }}" alt="blog image">
        </div>

        <div class="my-14 max-w-6xl mx-auto flex gap-12">
            <div class="flex flex-col gap-12">
                <div class="px-10">
                    <h3 class="h3 mb-8">How did you start out in the food industry?</h3>
                    <p class="text-black/60 my-10 ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at
                        congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit
                        vel pulvinar. Fusce id mollis ex. Praesent feugiat elementum ex ut suscipit.
                    </p>
                </div>
                <div class="px-10">
                    <h3 class="h3 mb-8">What do you like most about your job?</h3>
                    <p class="text-black/60 my-10 ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at
                        congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit
                        vel pulvinar. Fusce id mollis ex. Praesent feugiat elementum ex ut suscipit.
                    </p>
                </div>
                <div class="px-10">
                    <h3 class="h3 mb-8">Do you cook at home on your days off?</h3>
                    <div>
                        <img class="w-full" src="{{ Vite::asset('resources/images/blog-image2.png') }}"
                            alt="cook at home image">
                    </div>
                    <p class="text-black/60 mt-10 ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at
                        congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit
                        vel pulvinar. Fusce id mollis ex. Praesent feugiat elementum ex ut suscipit.
                    </p>
                </div>

                <div class="bg-gradient-to-r from-black/5 to-white w-full p-10 border-y border-black/10">
                    <p class="text-4xl italic font-medium leading-relaxed">
                        “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio.”
                    </p>
                </div>

                <div class="px-10">
                    <h3 class="h3 mb-8">
                        What is the biggest misconception that people have about being a professional chef?
                    </h3>
                    <p class="text-black/60 my-10 ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at
                        congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit
                        vel pulvinar. Fusce id mollis ex. Praesent feugiat elementum ex ut suscipit.
                    </p>
                </div>
            </div>

            <div class="max-w-30 w-full flex flex-col gap-10 me-10"> 
                <h4 class="text-sm font-semibold ">SHARE THIS ON:</h4>

                <div class="flex flex-col items-center gap-10">
                    <box-icon type='logo' name='facebook'></box-icon>
                    <box-icon type='logo' name='twitter'></box-icon>
                    <box-icon name='instagram' type='logo'></box-icon>
                </div>
            </div>
        </div>

        <div class="my-14">
            <x-home.newsletter />
        </div>
    </div>
</x-layout>
