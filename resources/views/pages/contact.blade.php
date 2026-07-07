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
        <ul class="list-unstyled">
            <li><strong>Email:</strong> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
            <li><strong>Telefono:</strong> <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
        </ul>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
