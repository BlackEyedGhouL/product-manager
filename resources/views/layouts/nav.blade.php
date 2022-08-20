<nav class="navbar bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-white">Dashboard</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger" type="submit">Log out</button>
        </form>
    </div>
</nav>
