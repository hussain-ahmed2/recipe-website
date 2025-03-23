<x-layout>

    <div class="my-14 px-6 max-w-7xl mx-auto">
        <h2 class="mb-14 h2 text-center">Update Credentials</h2>
        <div>
            <form class="flex flex-col gap-4" action="/profile/edit" method="POST">
                @csrf
                @method('PUT')

                <x-forms.input-field name="name" type="text" label="Full Name" :value="$user->name" />
                <x-forms.input-field name="email" type="email" label="Email" :value="$user->email" />
                <x-forms.input-field name="password" type="password" label="Password (Optional)" :required="false" />
                <x-forms.input-field name="password_confirmation" type="password" label="Confirm Password"
                    :required="false" />

                <x-forms.submit-button>Update</x-forms.submit-button>
            </form>
        </div>

    </div>

</x-layout>
