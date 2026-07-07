<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il mio Portofolio</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
    @include('partials.navbar')
    <div class="container">
        <h1>Il mio Portofolio</h1>
        @forelse ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <span class="badge bg-secondary">{{ $post->genere }}</span>
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="{{ route('portfolio.show', $post->id) }}" class="btn btn-outline-primary">Leggi</a>
            </div>
        </div>
        @empty
            <p>Nessun lavoro pubblicato ancora.</p>
        @endforelse
    </div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
