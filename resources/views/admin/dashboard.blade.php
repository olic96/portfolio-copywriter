<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Dashboard</h1>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-secondary">Esci</button>
    </form>
</div>

<p>Benvenuto, {{ auth()->user()->name }}.</p>
<a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Vai ai lavori</a>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
