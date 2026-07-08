<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $message->name }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
    <div class="container">

        <div>
            {{ $message->message }}
        </div>

        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary mt-3">Torna ai messaggi</a>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
