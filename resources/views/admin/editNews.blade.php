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
            <h1 class="my-3">Редактировать</h1>
            <form class="d-flex flex-column gap-3 mt-4 mb-2 form" method="POST"
                action="/admin/editNews/{{ $current->id }}/update" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="floatingInput">Название</label>
                    <input type="text" class="form-control " id="floatingInput" value="{{ $current->title }}"
                        name="title">
                    @error('title')
                        <div class="alert alert-danger alert-dismissible">
                            <div class="alert-text">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Выберите фото</label>
                    <input name="photo" class="form-control" type="file" id="formFile">
                    @error('photo')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="floatingInput">Содержание</label>
                    <textarea class="form-control" name="content" id="floatingTextarea2" style="height: 100px"> {{ $current->content }}</textarea>
                    @error('content')
                        <div class="alert alert-danger alert-dismissible">
                            <div class="alert-text">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="form-group text-white">
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option value="{{ $current->category->id }}" selected>{{ $current->category->name }}</option>
                        @foreach ($categories as $category)
                            @if ($current->category->name !== $category->name)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach

                    </select>
                    @error('category')
                        <div class="alert alert-danger alert-dismissible">
                            <div class="alert-text">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Добавить новую новость</button>
            </form>
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
        </div>
    </main>
</body>

</html>
