<x-layout>

    <div class="my-14">
        <x-home.featured-recipes :$recipes />

        <div class="my-5">
            {{ $recipes->links('pagination::custom') }}
        </div>
    </div>

</x-layout>