<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica informazioni</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Titolo del sito</label>
        <input type="text" name="site_title" class="form-control @error('site_title') is-invalid @enderror"
            value="{{ old('site_title', $setting->site_title) }}">
        @error('site_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Titolo Hero (home)</label>
        <input type="text" name="hero_title" class="form-control @error('hero_title') is-invalid @enderror"
            value="{{ old('hero_title', $setting->hero_title) }}">
        @error('hero_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Sottotitolo Hero (home)</label>
        <input type="text" name="hero_subtitle" class="form-control @error('hero_subtitle') is-invalid @enderror"
            value="{{ old('hero_subtitle', $setting->hero_subtitle) }}">
        @error('hero_subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Biografia</label>
        <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="6">{{ old('bio', $setting->bio) }}</textarea>
        @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $setting->email) }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Telefono</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $setting->phone) }}">
        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Torna alla Dashboard</a>
</form>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
