<header class="border-b border-black/10 z-100 sticky top-0 bg-white">
    <nav class="min-h-18 md:min-h-28 flex items-center justify-between max-w-7xl mx-auto">
        <a href="/" class="logo">Foodiland<span class="text-orange-600">.</span></span></a>

        <div id="menu" class="flex md:gap-7 lg:gap-14 lg:w-2/3 md:justify-between md:me-5 max-md:absolute top-18 left-0 right-0 bg-white max-md:flex-col max-md:border-y border-black/10 transition ease-in-out duration-300 max-md:translate-x-full">
            <div class="flex md:items-center md:gap-7 lg:gap-14 max-md:flex-col">
                <a href="/" class="navlink">Home</a>
                <a href="/recipes" class="navlink">Recipes</a>
                <a href="/blog" class="navlink">Blog</a>
                <a href="/contact" class="navlink">Contact</a>
                <a href="/about" class="navlink">About Us</a>
            </div>

            <div class="flex md:items-center md:gap-5 lg:gap-10 max-md:flex-col">
                @auth
                    <a href="/profile" class="navlink"></a>
                @else
                    <a href="/login" class="navlink"> Login </a>
                    <a href="/register" class="navlink"> Register </a>
                @endauth
            </div>
        </div>

        <button id="menu-button" class="md:hidden me-5">
            <box-icon class="border border-black/10 h-12 w-12 p-1.5 rounded-lg hover:bg-black/8" size="md" name='menu'></box-icon>
        </button>
    </nav>
</header>


<script>
    const menu = document.getElementById('menu');
    const menuButton = document.getElementById('menu-button');

    menuButton.addEventListener('click', () => {
        menu.classList.toggle('max-md:translate-x-full');
    });
</script>