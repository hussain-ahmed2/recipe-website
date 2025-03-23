<div id="message" class="transition-all duration-300 origin-top position fixed w-full z-10">
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
                {{ session('success') }}
                <button id="close-message"
                    class="text-3xl cursor-pointer px-2 transition-all duration-300 origin-top">&times;</button>
            </div>
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
                {{ session('error') }}
                <button id="close-message"
                    class="text-3xl cursor-pointer px-2 transition-all duration-300 origin-top">&times;</button>
            </div>
        </div>
    @endif
</div>

<script>
    const message = document.getElementById('message');
    const closeMessageBtn = document.getElementById('close-message');

    closeMessageBtn.addEventListener('click', () => {
        message.classList.add('scale-y-0', 'h-0');
    });

    setTimeout(() => {
        message.classList.add('scale-y-0', 'h-0');
    }, 3000);
</script>
