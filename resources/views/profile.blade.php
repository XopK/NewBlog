<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <x-header></x-header>
    <main>
        <div class="container">
            <h1 class="my-4">Личный кабинет </h1>
            <form method="POST" action="/profile/edit">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Имя пользователя</label>
                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                </div>
                <button type="submit" class="btn btn-warning">Сохранить</button>
            </form>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible mt-3">
                    <div class="alert-text">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif
            <h2 class="my-4">Комментарии пользователя</h2>

            @forelse ($comments as $comment)
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="/news/{{ $comment->news->id }}">
                            <h5 class="card-title">{{ $comment->news->title }}</h5>
                        </a>
                        <p class="card-text">{{ $comment->comment_text }}</p>
                    </div>
                </div>
            @empty
                <h1>Пусто</h1>
            @endforelse


            <h2 class="my-4">Лайки пользователя</h2>
            @forelse ($likes as $like)
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="/news/{{ $like->news->id }}">
                            <h5 class="card-title">{{ $like->news->title }}</h5>
                        </a>
                        <p class="card-text">Лайк поставлен: {{ date('d.m.Y', strtotime($like->created_at)) }}</p>
                    </div>
                </div>
            @empty
                <h1>Пусто</h1>
            @endforelse

        </div>
    </main>
</body>

</html>
