<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministock</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href='{{ route('home') }}'>Ministock</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('stock') }}">Stock</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container d-flex flex-column min-vh-100">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center my-3" > @yield('titre')</h1>

        @yield('content')
    </main>

    <footer class="bg-light p-3">
        <div class="container d-flex justify-content-between align-items-center">

            <span class="small text-muted">
                © 2026 Ministock. Tous droits réservés.
            </span>

            <span class="small">
                Créé par 
                <a href="https://github.com/donneger-k">Kilyan Donneger</a>
            </span>

            <a class="small text-decoration-none" href='{{ route('credits') }}'>
                Crédits
            </a>

        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>