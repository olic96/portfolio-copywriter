<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

<div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
    <div class="card-body">
        <h3 class="card-title text-center mb-4 font-weight-bold">Accedi</h3>

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <!-- Campo Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="nome@esempio.com"
                >
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Campo Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                    placeholder="••••••••"
                >
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Ricordami -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label text-muted" for="remember">Resta connesso</label>
            </div>

            <!-- Pulsante Accedi -->
            <button type="submit" class="btn btn-primary w-100 py-2">Accedi</button>
        </form>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
