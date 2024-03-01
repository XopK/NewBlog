<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новость</title>
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
            <h1 class="my-4">Новость </h1>
            <p class="text-muted">Опубликовано: 1 Марта, 2023</p>
            <img src="https://via.placeholder.com/800x400" class="img-fluid mb-3" alt="News Image">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="my-4">
                <button type="button" class="btn btn-success d-flex align-items-center"><span
                        class="material-symbols-outlined">
                        thumb_up
                    </span><span>123</span></button>

            </div>

            <h2 class="my-4">Комментарии</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Напишите здесь комментарий"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Оставить</button>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">danya</h5>
                    <p class="card-text">ХАХАХАХАХ</p>
                </div>
            </div>

        </div>
    </main>
</body>

</html>
