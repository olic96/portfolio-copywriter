<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messaggi ricevuti</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="p-4">
<h1>Messaggi ricevuti</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr class="text-uppercase fs-6">
            <th>Nome</th>
            <th>Email</th>
            <th>Messaggio</th>
            <th>Data</th>
            <th>Stato</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ Str::limit($message->message, 60) }}</td>
                <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    @if ($message->read)
                        <span class="badge bg-secondary">Letto</span>
                    @else
                        <span class="badge bg-warning">Nuovo</span>
                    @endif
                </td>
                <td class="d-flex gap-1">
                    @unless ($message->read)
                        <form action="{{ route('admin.messages.read', $message->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">Segna come letto</button>
                        </form>
                    @endunless
                    <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-outline-primary">Leggi</a>
                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo messaggio?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Elimina</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Nessun messaggio ricevuto.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Torna alla Dashboard</a>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
