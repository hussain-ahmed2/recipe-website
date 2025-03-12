<x-layout>

    <div class="p-10 mb-10 max-w-2xl mx-auto rounded-2xl">
        <h1 class="font-semibold text-5xl mb-8">Register</h1>

        <p class="text-black/60 mb-8">Please fill in this form to create an account</p>

        <form class="flex flex-col gap-4" action="/register" method="POST">
            @csrf
        
            <x-forms.input-field name="name" type="text" label="Full Name" />
            <x-forms.input-field name="email" type="email" label="Email" />
            <x-forms.input-field name="password" type="password" label="Password" />
            <x-forms.input-field name="password_confirmation" type="password" label="Confirm Password" />

            <x-forms.submit-button>Register</x-forms.submit-button>
        </form>

    </div>

</x-layout>