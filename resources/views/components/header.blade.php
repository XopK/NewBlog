<nav class="navbar navbar-expand-lg" style="background-color: rgb(253, 232, 140)">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/images/logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            NewsBlog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/signUp">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/signIn">Авторизация</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Здраствуй, {{ Auth::user()->username }}</a>
                    </li>
                    @if (Auth::user()->id_role == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Админ панель</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Выход</a>
                    </li>

                @endauth

            </ul>

        </div>
    </div>
</nav>
