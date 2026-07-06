<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I miei scritti</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Genere</th>
            <th>Stato</th>
            <th>Aggiornato</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->genere }}</td>
                <td>
                    @if ($post->published)
                        <span class="badge bg-success">Pubblicato</span>
                    @else
                        <span class="badge bg-secondary">Bozza</span>
                    @endif
                </td>
                <td>{{ $post->updated_at->format('d/m/Y H:i')}}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                        class= "btn btn-sm btn-outline-primary">
                        Modifica
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Torna alla Dashboard</a>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
