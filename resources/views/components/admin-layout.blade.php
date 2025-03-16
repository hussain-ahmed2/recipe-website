@props(['title'])

<div class="my-14 max-w-7xl mx-auto px-5">
    <h1 class="h1 mb-8">{{ $title ?? 'Dashboard' }}</h1>

    <div class="flex gap-5">
        <aside class="border border-black/10 min-h-96">
            <nav class="flex flex-col">
                <a class="sidebar-link {{ Request::is('admin/dashboard') ? 'bg-black/10' : '' }}"
                    href="/admin/dashboard">Dashboard</a>
                <a class="sidebar-link {{ Request::is('admin/recipes*') ? 'bg-black/10' : '' }}"
                    href="/admin/recipes">Recipes</a>
                <a class="sidebar-link {{ Request::is('admin/users') ? 'bg-black/10' : '' }}"
                    href="/admin/users">Users</a>
                <a class="sidebar-link {{ Request::is('admin/categories') ? 'bg-black/10' : '' }}"
                    href="/admin/categories">Categories</a>
            </nav>
        </aside>

        <div class="w-full">
            {{ $slot }}
        </div>

    </div>
</div>
