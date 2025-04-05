<x-layout>

    <div class="p-10 mb-10 max-w-2xl mx-auto rounded-2xl">
        <h1 class="font-semibold text-5xl mb-8">Login</h1>

        <p class="text-black/60 mb-8">Please fill in this form to login</p>

        <form class="flex flex-col gap-4" action="/login" method="POST">
            @csrf
        
            <x-forms.input-field name="email" type="email" label="Email" />
            <x-forms.input-field name="password" type="password" label="Password" />

            <x-forms.submit-button>Login</x-forms.submit-button>
        </form>
        <p class="mt-4">Don't have an account? <a href="/register" class="text-orange-600 hover:underline">Register</a></p>
    </div>

</x-layout>