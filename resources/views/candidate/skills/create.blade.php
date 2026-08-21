<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Yetenek</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; padding: 40px; }
        .container { max-width: 700px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 3px 10px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; color: #333; }
        .back { display: inline-block; margin-bottom: 20px; color: #2563eb; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('candidate.skills.index') }}" class="back">← Yeteneklerime Dön</a>
    <h1>🛠️ Yeni Yetenek Ekle</h1>
    @include('candidate.skills.form', [
        'action' => route('candidate.skills.store'),
        'method' => 'POST'
    ])
</div>
</body>
</html>