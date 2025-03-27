<x-layout>

        <div class="w-full max-w-7xl mx-auto px-6 my-14">
            <h2 class="h2 mb-10">Update Recipe</h2>

            <form class="flex flex-col gap-4" action="/recipes/{{ $recipe->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Recipe Name --}}
                <x-forms.input-field name="name" type="text" label="Recipe Name" value="{{ old('name', $recipe->name) }}" />

                {{-- Description --}}
                <x-forms.input-field name="description" type="text" label="Description" value="{{ old('description', $recipe->description) }}" />

                {{-- Ingredients (Dynamic) --}}
                <div>
                    <label class="block font-semibold mb-1">Ingredients</label>
                    <div id="ingredients-list">
                        @foreach (json_decode($recipe->ingredients, true) as $ingredient)
                            <input type="text" name="ingredients[]" value="{{ $ingredient }}"
                                class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300 mb-2"
                                required>
                        @endforeach
                    </div>
                    <button type="button" onclick="addIngredient()"
                        class="mt-2 bg-cyan-500 text-white px-4 py-2 rounded ml-auto block hover:bg-cyan-600">Add Ingredient</button>
                </div>

                {{-- Instructions (Dynamic) --}}
                <div>
                    <label class="block font-semibold mb-1">Instructions</label>
                    <div id="instructions-list">
                        @foreach (json_decode($recipe->instructions, true) as $instruction)
                            <input type="text" name="instructions[]" value="{{ $instruction }}"
                                class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300 mb-2"
                                required>
                        @endforeach
                    </div>
                    <button type="button" onclick="addInstruction()"
                        class="mt-2 bg-cyan-500 text-white px-4 py-2 rounded ml-auto block hover:bg-cyan-600">Add Step</button>
                </div>

                {{-- Prep & Cook Time --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-forms.input-field name="prepTimeMinutes" type="number" label="Prep Time (minutes)" value="{{ old('prepTimeMinutes', $recipe->prepTimeMinutes) }}" />
                    <x-forms.input-field name="cookTimeMinutes" type="number" label="Cook Time (minutes)" value="{{ old('cookTimeMinutes', $recipe->cookTimeMinutes) }}" />
                </div>

                {{-- Servings --}}
                <x-forms.input-field name="servings" type="number" label="Servings" value="{{ old('servings', $recipe->servings) }}" />

                {{-- Difficulty --}}
                <div>
                    <label class="block font-medium mb-1">Difficulty</label>
                    <select name="difficulty"
                        class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                        required>
                        <option value="Easy" {{ $recipe->difficulty == 'Easy' ? 'selected' : '' }}>Easy</option>
                        <option value="Medium" {{ $recipe->difficulty == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Hard" {{ $recipe->difficulty == 'Hard' ? 'selected' : '' }}>Hard</option>
                    </select>
                </div>

                {{-- Cuisine --}}
                <x-forms.input-field name="cuisine" type="text" label="Cuisine" value="{{ old('cuisine', $recipe->cuisine) }}" />

                {{-- Calories per Serving --}}
                <x-forms.input-field name="caloriesPerServing" type="number" label="Calories per Serving" value="{{ old('caloriesPerServing', $recipe->caloriesPerServing) }}" />

                {{-- Image Upload --}}
                <div>
                    <label class="block font-medium mb-1">Current Image</label>
                    <img src="{{ Str::startsWith($recipe->image, 'http') ? $recipe->image : Vite::asset($recipe->image) }}" alt="Recipe Image" class="w-32 h-32 rounded-md object-cover mb-2">
                    <x-forms.input-field name="image" type="file" label="Upload New Image (optional)" :required="false" />
                </div>

                {{-- Category --}}
                <div>
                    <label class="block font-medium mb-1">Category</label>
                    <select name="category_id" class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <x-forms.submit-button>Update Recipe</x-forms.submit-button>
            </form>
        </div>

</x-layout>

<script>
    function addIngredient() {
        let container = document.getElementById('ingredients-list');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'ingredients[]';
        input.className =
            "mt-1 border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300 mb-2";
        input.required = true;
        container.appendChild(input);
    }

    function addInstruction() {
        let container = document.getElementById('instructions-list');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'instructions[]';
        input.className =
            "mt-1 border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300 mb-2";
        input.required = true;
        container.appendChild(input);
    }
</script>
