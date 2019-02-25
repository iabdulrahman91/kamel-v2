<header class="navbar navbar-expand-md navbar-dark bg-dark ">
    <a class="navbar-brand" href="/">{{ config('app.name', 'Kamel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="/listings">Listings<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/rentedItems">Rented Items</a>
            </li>


            {{--or @if( Auth::check())--}}
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/profile" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{auth()->user()->fname}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Listed items</a>
                        <a class="dropdown-item" href="#">Active Rent</a>
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="/logout">Sign out</a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li>
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endauth

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</header>
<br>
