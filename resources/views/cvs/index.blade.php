<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>CV'lerim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>CV'lerim</h2>
        <a href="{{ route('cvs.create') }}" class="btn btn-primary">+ Yeni CV</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="list-group">
        @forelse($cvs as $cv)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $cv->title }}</strong>
                    <span class="badge bg-secondary">{{ ucfirst($cv->template) }}</span>
                </div>
                <div>
                    <a href="{{ route('cvs.show', $cv) }}" class="btn btn-sm btn-outline-primary">Görüntüle</a>
                    <form action="{{ route('cvs.destroy', $cv) }}" method="POST" class="d-inline" onsubmit="return confirm('Silinsin mi?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Sil</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Henüz CV oluşturmadınız.</p>
        @endforelse
    </div>
</div>
</body>
</html>