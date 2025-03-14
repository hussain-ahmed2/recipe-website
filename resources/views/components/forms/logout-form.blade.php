<form action="/logout" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" class="navlink cursor-pointer text-rose-500 hover:text-rose-600 w-full max-md:hover:bg-rose-100">Logout</button>
</form>