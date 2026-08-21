<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikalarım</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; padding: 40px; }
        .container { max-width: 900px; margin: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        h1 { margin: 0; color: #333; }
        .add-button { background: #2563eb; color: white; padding: 10px 18px; text-decoration: none; border-radius: 8px; }
        .add-button:hover { background: #1d4ed8; }
        .success { background: #dcfce7; color: #166534; padding: 12px 15px; border-radius: 8px; margin-bottom: 20px; }
        .cert-card { background: white; padding: 25px; margin-bottom: 20px; border-radius: 12px; box-shadow: 0 3px 10px rgba(0,0,0,0.08); }
        .cert-card h2 { margin-top: 0; margin-bottom: 5px; color: #222; }
        .institution { color: #2563eb; font-weight: bold; margin-bottom: 10px; }
        .date { color: #666; margin-bottom: 15px; }
        .links a { color: #2563eb; margin-right: 15px; text-decoration: none; }
        .actions { margin-top: 20px; display: flex; gap: 10px; }
        .edit-button { background: #f59e0b; color: white; padding: 8px 15px; border: none; border-radius: 6px; text-decoration: none; }
        .delete-button { background: #dc2626; color: white; padding: 8px 15px; border: none; border-radius: 6px; cursor: pointer; }
        .empty { background: white; padding: 40px; text-align: center; border-radius: 12px; color: #666; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>📜 Sertifikalarım</h1>
        <a href="{{ route('candidate.certificates.create') }}" class="add-button">+ Yeni Sertifika Ekle</a>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @forelse($certificates as $certificate)
        <div class="cert-card">
            <h2>{{ $certificate->name }}</h2>
            <div class="institution">{{ $certificate->institution }}</div>

            <div class="date">
                @if($certificate->issue_date)
                    {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d.m.Y') }}
                @else
                    Tarih belirtilmedi
                @endif
            </div>

            <div class="links">
                @if($certificate->certificate_url)
                    <a href="{{ $certificate->certificate_url }}" target="_blank">🔗 Sertifika Linki</a>
                @endif
                @if($certificate->certificate_file)
                    <a href="{{ asset('storage/' . $certificate->certificate_file) }}" target="_blank">📄 Sertifika Dosyası</a>
                @endif
            </div>

            <div class="actions">
                <a href="{{ route('candidate.certificates.edit', $certificate) }}" class="edit-button">Düzenle</a>
                <form action="{{ route('candidate.certificates.destroy', $certificate) }}" method="POST"
                      onsubmit="return confirm('Bu sertifikayı silmek istediğinize emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">Sil</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">
            <h2>Henüz sertifika eklemediniz.</h2>
            <p>İlk sertifikanızı eklemek için yukarıdaki butonu kullanabilirsiniz.</p>
        </div>
    @endforelse
</div>
</body>
</html>
