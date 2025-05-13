<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('produits.index') }}">Gestion Produits</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.create') }}">Ajouter</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('produits.index') }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Rechercher...">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
                <a class="btn btn-outline-primary ms-2" href="/register">Add Account</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>