<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title  }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
    <div class="container">
        <span class="badge bg-secondary">{{ $post->genere }}</span>
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Pubblicato il {{ $post->created_at->format('d/m/Y') }}</p>

        <div>
            {{ $post->content }}
        </div>

        <a href="{{ route('portfolio.index') }}" class="btn btn-outline-secondary mt-3">Torna al portfolio</a>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
