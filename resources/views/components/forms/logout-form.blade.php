<form action="/logout" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" class="px-6 py-2 rounded-md bg-rose-400 hover:bg-rose-500 text-white transition duration-300">Logout</button>
</form>