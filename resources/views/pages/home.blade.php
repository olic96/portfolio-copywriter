<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
    @include('partials.navbar')
    <div class="container">

    <!-- 1. Hero -->
    <div class="text-center my-5">
        <h1>Il tuo Nome</h1>
        <p class="lead">Scrittore e copywriter</p>
    </div>

    <!-- 2. Bio teaser -->
    <div class="mb-5">
        <p>Due o tre righe brevi su di te...</p>
        <a href="{{ route('bio') }}">Scopri di più su di me &rarr;</a>
    </div>

    <!-- 3. Ultimi lavori pubblicati -->
    <h2>Ultimi lavori</h2>
    <div class="row mb-5">
        @forelse ($latestPosts as $post)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <span class="badge bg-secondary">{{ $post->genere }}</span>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="{{ route('portfolio.show', $post->id) }}" class="btn btn-outline-primary btn-sm">Leggi</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Nessun lavoro pubblicato ancora.</p>
        @endforelse
    </div>
    <a href="{{ route('portfolio.index') }}" class="btn btn-outline-secondary">Vedi tutto il portfolio</a>

    <!-- 4. Call to action -->
    <div class="text-center my-5">
        <h3>Vuoi lavorare con me?</h3>
        <a href="{{ route('contact') }}" class="btn btn-primary">Contattami</a>
    </div>

</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
