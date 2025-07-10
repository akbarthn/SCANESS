<h1>halooooooo</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-red-600 hover:underline">Logout</button>
</form>