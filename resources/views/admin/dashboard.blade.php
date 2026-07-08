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
<div class="d-flex gap-2 mb-4">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Vai all'archivio</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Vai al portfolio</a>
    <a href="{{ route('admin.settings.edit') }}" class="btn btn-secondary">Impostazioni sito</a>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Vedi tutti i messaggi</a>
</div>

<div class="row mb-5">
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-title text-muted">Scritti totali</h6>
                <p class="fs-3 mb-0">{{ $totalPosts }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-title text-muted">Pubblicati / Bozze</h6>
                <p class="fs-3 mb-0">{{ $totalPubblicPost }} / {{ $totalNoPubblicPost }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-title text-muted">Messaggi ricevuti</h6>
                <p class="fs-3 mb-0">{{ $totalMessages }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-title text-muted">Messaggi non letti</h6>
                <p class="fs-3 mb-0">{{ $totalMessagesNoRead }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h4>Ultimi messaggi ricevuti</h4>
        @forelse ($latestMesagges as $message)
            <div class="card mb-2">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>{{ $message->name }}</strong>
                        @if ($message->read)
                            <span class="badge bg-secondary">Letto</span>
                        @else
                            <span class="badge bg-warning">Nuovo</span>
                        @endif
                    </div>
                    <p class="mb-0 text-muted">{{ Str::limit($message->message, 60) }}</p>
                    <small class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</small>
                </div>
            </div>
        @empty
            <p>Nessun messaggio ricevuto.</p>
        @endforelse
        <a href="{{ route('admin.messages.index') }}">Vedi tutti i messaggi &rarr;</a>
    </div>

    <div class="col-md-6">
        <h4>Ultimi scritti aggiornati</h4>
        @forelse ($latestPosts as $post)
            <div class="card mb-2">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>{{ $post->title }}</strong>
                        @if ($post->published)
                            <span class="badge bg-success">Pubblicato</span>
                        @else
                            <span class="badge bg-secondary">Bozza</span>
                        @endif
                    </div>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary mt-1">Modifica</a>
                </div>
            </div>
        @empty
            <p>Nessuno scritto ancora.</p>
        @endforelse
        <a href="{{ route('admin.posts.index') }}">Vedi tutti gli scritti &rarr;</a>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
