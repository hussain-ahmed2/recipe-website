<x-layout>

    <div class="my-14 mx-auto max-w-7xl px-6">
        <h1 class="h1 text-center mb-20">Contact us</h1>
        <div class=" flex justify-center gap-10 max-md:flex-col">
            <div class="max-md:w-full">
                <img class="max-w-96 w-full mx-auto" src="{{ Vite::asset('resources/images/contact-avatar.png') }}"
                    alt="contact-avatar">
            </div>
            <form class=" w-full md:max-w-2/3 flex flex-col gap-8" action="/contact">
                <div class="grid grid-cols-2 w-full gap-8">
                    <x-forms.input-field name="name" label="Name" placeholder="Enter your name..." />
                    <x-forms.input-field name="email" type="email" label="Email"
                        placeholder="Your email address..." />
                </div>

                <x-forms.input-field name="subject" label="Subject" placeholder="Enter subject..." />
                
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message..." class="input"> {{ old('message') }} </textarea>
                </div>

                <x-forms.submit-button>Submit</x-forms.submit-button>
            </form>
        </div>

        <div class="my-20">
            <x-home.newsletter />
        </div>
    </div>

</x-layout>
