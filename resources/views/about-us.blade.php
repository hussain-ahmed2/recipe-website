<x-layout>
    <div class="my-14 mx-auto max-w-7xl px-6">
        <h1 class="h1 text-center mb-10">About RecipeRally</h1>
        <div class="flex flex-col md:flex-row gap-10 items-center">
            <div class="md:w-1/2">
                <img class="w-full rounded-lg shadow-lg" src="{{ Vite::asset('resources/images/contact-avatar.png') }}" alt="About RecipeRally">
            </div>
            <div class="md:w-1/2 space-y-6">
                <p class="text-lg text-gray-700">
                    Welcome to <strong>RecipeRally</strong>, your ultimate destination for discovering, sharing, and creating amazing recipes! Whether you're a home cook, a professional chef, or someone who simply loves food, our platform is designed to bring together food enthusiasts from around the world.
                </p>
                <p class="text-lg text-gray-700">
                    Our mission is to make cooking more accessible and enjoyable by providing a space where users can explore a diverse collection of recipes, add their own unique creations, and connect with fellow food lovers.
                </p>
                <p class="text-lg text-gray-700">
                    From quick and easy meals to gourmet delicacies, RecipeRally offers a wide range of recipes categorized by cuisine, difficulty level, and dietary preferences. Join us and embark on a flavorful journey!
                </p>
            </div>
        </div>

        <div class="my-14">
            <h2 class="text-2xl font-semibold text-center mb-6">Why Choose RecipeRally?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold mb-3">Wide Variety</h3>
                    <p class="text-gray-700">Explore thousands of recipes across multiple cuisines and categories.</p>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold mb-3">User-Friendly</h3>
                    <p class="text-gray-700">Easily find and share recipes with an intuitive interface.</p>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold mb-3">Community Driven</h3>
                    <p class="text-gray-700">Connect with fellow food enthusiasts, leave reviews, and share your favorites.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-14">
            <x-forms.submit-button>Join Us Today</x-forms.submit-button>
        </div>
    </div>
</x-layout>
