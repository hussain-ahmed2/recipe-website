<header class="fixed top-0 left-0 right-0 bg-white/20 backdrop-blur-xs border-b border-b-gray-300 z-50">
    <nav class="flex items-center justify-between max-w-5xl mx-auto min-h-16 px-5 max-md:pe-0">
        <a class="logo" href="#">Recipes</a>

        <div
            class="flex justify-between md:w-2/3 max-md:absolute max-md:top-16 max-md:right-0 max-md:left-0 max-md:bg-white/90 max-md:flex-col max-md:border-b max-md:border-gray-300 max-md:translate-x-full transition duration-300"
            id="nav-container">
            <div class="flex md:items-center md:space-x-6 max-md:flex-col">
                <a class="navlink {{ Request::is('/') ? 'text-orange-600' : '' }}" href="#">Home</a>
                <a class="navlink {{ Request::is('/recipes') ? 'text-orange-600' : '' }}" href="#">Recipes</a>
                <a class="navlink {{ Request::is('/faq') ? 'text-orange-600' : '' }}" href="#">FAQ</a>
                <a class="navlink {{ Request::is('/faq') ? 'text-orange-600' : '' }}" href="#">About Us</a>
            </div>

            <div class="flex md:space-x-6 max-md:flex-col">
                @auth
                    <a href="/dashboard">User</a>
                @else
                    <a class="navlink" href="/login">Login</a>
                    <a class="navlink" href="/register">Register</a>
                @endauth
            </div>
        </div>
        <div class="h-16 w-16 flex justify-center items-center md:hidden">
            <button
                class="text-2xl border border-gray-300 h-12 aspect-square rounded-lg hover:border-orange-300 hover:text-orange-600 transition"
                id="nav-toggle-btn">
                &#9776;
            </button>
        </div>
    </nav>
</header>


<script>
    const navToggleBtn = document.getElementById("nav-toggle-btn");
    const navContainer = document.getElementById("nav-container");

    navToggleBtn.addEventListener('click', () => {
        navContainer.classList.toggle('max-md:translate-x-full');
    });
</script>
