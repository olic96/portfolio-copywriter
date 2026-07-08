<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
    @include('partials.navbar')
    <div class="container">
        <h1>Contatti</h1>
        <p>Puoi scrivermi o chiamarmi qui:</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="list-unstyled">
            <li><strong>Email:</strong> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
            <li><strong>Telefono:</strong> <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
        </ul>

        <form action="{{ route('contact.store') }}" method="POST" class="mt-4" style="max-width: 500px;">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea
                    name="message"
                    id="message"
                    rows="5"
                    class="form-control @error('message') is-invalid @enderror"
                >{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Invia messaggio</button>
        </form>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
