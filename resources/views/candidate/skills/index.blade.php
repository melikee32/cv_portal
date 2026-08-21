<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeteneklerim</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; padding: 40px; }
        .container { max-width: 900px; margin: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        h1 { margin: 0; color: #333; }
        .add-button { background: #2563eb; color: white; padding: 10px 18px; text-decoration: none; border-radius: 8px; }
        .add-button:hover { background: #1d4ed8; }
        .success { background: #dcfce7; color: #166534; padding: 12px 15px; border-radius: 8px; margin-bottom: 20px; }
        .skill-card { background: white; padding: 20px 25px; margin-bottom: 15px; border-radius: 12px; box-shadow: 0 3px 10px rgba(0,0,0,0.08); display: flex; justify-content: space-between; align-items: center; }
        .skill-info h2 { margin: 0 0 5px 0; color: #222; font-size: 18px; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 13px; margin-right: 8px; }
        .badge-level { background: #dbeafe; color: #1e40af; }
        .badge-category { background: #f3e8ff; color: #6b21a8; }
        .actions { display: flex; gap: 10px; }
        .edit-button { background: #f59e0b; color: white; padding: 8px 15px; border: none; border-radius: 6px; text-decoration: none; }
        .delete-button { background: #dc2626; color: white; padding: 8px 15px; border: none; border-radius: 6px; cursor: pointer; }
        .empty { background: white; padding: 40px; text-align: center; border-radius: 12px; color: #666; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>🛠️ Yeteneklerim</h1>
        <a href="{{ route('candidate.skills.create') }}" class="add-button">+ Yeni Yetenek Ekle</a>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @forelse($skills as $skill)
        <div class="skill-card">
            <div class="skill-info">
                <h2>{{ $skill->name }}</h2>
                <span class="badge badge-level">{{ $skill->level }}</span>
                @if($skill->category)
                    <span class="badge badge-category">{{ $skill->category }}</span>
                @endif
            </div>

            <div class="actions">
                <a href="{{ route('candidate.skills.edit', $skill) }}" class="edit-button">Düzenle</a>
                <form action="{{ route('candidate.skills.destroy', $skill) }}" method="POST"
                      onsubmit="return confirm('Bu yeteneği silmek istediğinize emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">Sil</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">
            <h2>Henüz yetenek eklemediniz.</h2>
            <p>İlk yeteneğinizi eklemek için yukarıdaki butonu kullanabilirsiniz.</p>
        </div>
    @endforelse
</div>
</body>
</html>