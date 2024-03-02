<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <x-adminheader></x-adminheader>
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
            <h1 class="my-3">Все новости</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Дата публикации</th>
                        <th scope="col">Статус блокировки</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($all as $news)
                        <tr>
                            <td><a href="/news/{{ $news->id }}">{{ $news->title }}</a></td>
                            <td>{{ $news->category->name }}</td>
                            <td>{{ date('d.m.Y', strtotime($news->created_at)) }}</td>
                            @if ($news->is_blocked == 0)
                                <td class="text-success">Нет ограничений</td>
                            @else
                                <td class="text-danger">Заблокировано!</td>
                            @endif
                            <td><a href="/admin/delete/{{ $news->id }}" class="btn btn-danger">Удалить</a></td>
                            <td><a href="/admin/editNews/{{ $news->id }}" class="btn btn-warning">Редактировать</a>
                            </td>
                            @if ($news->is_blocked == 0)
                                <td><a href="/admin/block/{{ $news->id }}" class="btn btn-danger">Заблокировать</a>
                                </td>
                            @else
                                <td><a href="/admin/unblock/{{ $news->id }}"
                                        class="btn btn-success">Разблокировать</a></td>
                            @endif

                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
