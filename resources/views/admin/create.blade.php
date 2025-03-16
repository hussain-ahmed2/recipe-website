<x-layout>

    <x-admin-layout title="Create Recipe">

        <div class="w-full">
            <form class="flex flex-col gap-4" action="/admin/recipes" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Recipe Name --}}
                <x-forms.input-field name="name" type="text" label="Recipe Name" />

                {{-- Description --}}
                <x-forms.input-field name="description" type="text" label="Description" />

                {{-- Ingredients (Dynamic) --}}
                <div>
                    <label class="block font-semibold mb-1">Ingredients</label>
                    <div id="ingredients-list">
                        <input type="text" name="ingredients[]"
                            class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                            required>
                    </div>
                    @error('ingredients')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <button type="button" onclick="addIngredient()"
                        class="mt-2 bg-cyan-500 text-white px-4 py-2 rounded ml-auto block hover:bg-cyan-600 tc">Add Ingredient</button>
                </div>

                {{-- Instructions (Dynamic) --}}
                <div class="">
                    <label class="block font-semibold mb-1">Instructions</label>
                    <div id="instructions-list">
                        <input type="text" name="instructions[]"
                            class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                            required>
                    </div>
                    @error('instructions')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <button type="button" onclick="addInstruction()"
                        class="mt-2 bg-cyan-500 text-white px-4 py-2 rounded block ml-auto hover:bg-cyan-600 tc">Add Step</button>
                </div>

                {{-- Prep & Cook Time --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-forms.input-field name="prepTimeMinutes" type="number" label="Prep Time (minutes)" />
                    <x-forms.input-field name="cookTimeMinutes" type="number" label="Cook Time (minutes)" />
                </div>

                {{-- Servings --}}
                <x-forms.input-field name="servings" type="number" label="Servings" />

                <!-- Difficulty -->
                <div class="">
                    <label class="block font-medium mb-1">Difficulty</label>
                    <select name="difficulty"
                        class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300"
                        required>
                        <option value="Easy">Easy</option>
                        <option value="Medium">Medium</option>
                        <option value="Hard">Hard</option>
                    </select>
                </div>

                {{-- Cuisine --}}
                <x-forms.input-field name="cuisine" type="text" label="Cuisine" />

                {{-- Calories per Serving --}}
                <x-forms.input-field name="caloriesPerServing" type="number" label="Calories per Serving" />

                {{-- Image Upload --}}
                <x-forms.input-field name="image" type="file" label="Image" />

                <!-- Category -->
                <div class="">
                    <label class="block font-medium mb-1">Category</label>
                    <select name="category_id" class="border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <x-forms.submit-button>Create</x-forms.submit-button>
            </form>
        </div>

    </x-admin-layout>

</x-layout>


<script>
    function addIngredient() {
        let container = document.getElementById('ingredients-list');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'ingredients[]';
        input.className =
            "mt-1 border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300";
        input.required = true;
        container.appendChild(input);
    }

    function addInstruction() {
        let container = document.getElementById('instructions-list');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'instructions[]';
        input.className =
            "mt-1 border border-black/10 outline-none py-3 px-4 rounded-lg w-full focus:ring-4 ring-black/10 transition duration-300";
        input.required = true;
        container.appendChild(input);
    }
</script>
