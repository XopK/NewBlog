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
            <form>
                <div class="mb-3">
                    <label for="username" class="form-label">Имя пользователя</label>
                    <input type="text" class="form-control" name="username" value="danya">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" name="email" value="dmahmutov12@gmail.com">
                </div>
                <button type="submit" class="btn btn-warning">Сохранить</button>
            </form>

            <h2 class="my-4">Комментарии пользователя</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">News Title</h5>
                    <p class="card-text">Comment text...</p>
                </div>
            </div>
            <h2 class="my-4">Лайки пользователя</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">News Title</h5>
                    <p class="card-text">Liked on <time datetime="2023-02-15">February 15, 2023</time></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
