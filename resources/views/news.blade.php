<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $info->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <x-header></x-header>
    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible mt-3">
                    <div class="alert-text">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible mt-3">
                    <div class="alert-text">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif
            <h1 class="my-4">{{ $info->title }}</h1>
            <p class="text-muted">Опубликовано: {{ date('d.m.Y', strtotime($info->created_at)) }}</p>
            <img style="max-width: 40%" src="/storage/news/{{ $info->photo }}" class="img-fluid mb-3"
                alt="{{ $info->photo }}">
            <p class="card-text">{{ $info->content }}</p>

            <div class="my-4">
                <a class="d-flex align-items-center text-decoration-none" href="/news/{{ $info->id }}/like"><span
                        class="material-symbols-outlined">
                        thumb_up
                    </span>
                    <h3>{{ $info->LikeCount() }}</h3>
                </a>

            </div>

            <h2 class="my-4">Комментарии</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="/news/{{ $info->id }}/comment">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" name="comment" placeholder="Напишите здесь комментарий"></textarea>
                        </div>
                        @error('comment')
                            <div class="alert alert-danger alert-dismissible">
                                <div class="alert-text">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-warning">Оставить</button>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                @forelse ($info->comment as $item)
                    <div class="card-body">
                        <h5 class="card-title">{{$item->usersComment->username}}</h5>
                        <p class="card-text">{{$item->comment_text}}</p>
                    </div>
                @empty
                <h1>Пусто</h1>
                @endforelse

            </div>

        </div>
    </main>
</body>

</html>
