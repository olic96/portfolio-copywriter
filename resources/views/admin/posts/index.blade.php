<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I miei scritti</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
<h1>I miei scritti</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr class="text-uppercase fs-6">
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
                <td class="d-flex gap-1">
                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                        class= "btn btn-sm btn-outline-primary">
                        Modifica
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex gap-1">
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">+</a>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Torna alla Dashboard</a>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
