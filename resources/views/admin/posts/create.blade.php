<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuovo scritto</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
<form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf

    <h1>Nuovo Scritto</h1>
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') }}"
            required
            autofocus
            placeholder="Inserisci un Titolo"
        >
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

        <div class="mb-3">
        <label for="genere" class="form-label">Genere</label>
        <input
            type="text"
            name="genere"
            class="form-control @error('genere') is-invalid @enderror"
            value="{{ old('genere') }}"
            required
            autofocus
            placeholder="Inserisci un Genere"
        >
        @error('genere')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="excerpt" class="form-label">Estratto</label>
        <textarea name="excerpt" class="form-control">{{ old('excerpt') }}</textarea>
        @error('excerpt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea name="content" class="form-control" rows="10">{{ old('content') }}</textarea>
        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-check">
        <input type="checkbox" name="published" class="form-check-input" id="published">
        <label class="form-check-label" for="published">Pubblica subito</label>
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
</form>

<a href="{{ route('admin.posts.index') }}" class="btn btn-primary mt-1">Torna ai tuoi Scritti</a>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
