<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biografia</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
    @include('partials.navbar')
    <div class="container">
        <h1>Chi sono</h1>
        <p>{{ $setting->bio }}</p>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
