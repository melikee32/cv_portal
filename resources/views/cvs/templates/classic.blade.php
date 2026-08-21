<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>{{ $cv->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4" style="max-width: 800px; font-family: 'Times New Roman', serif;">
    <div class="text-center mb-4">
        <h1>{{ $candidate->user->name ?? 'Ad Soyad' }}</h1>
        <p>{{ $candidate->title ?? '' }}</p>
        <hr>
    </div>

    <h4>EĞİTİM</h4>
    <hr>
    @foreach($candidate->educations as $edu)
        <p>{{ $edu->school }}, {{ $edu->department ?? '' }} ({{ $edu->start_year }}–{{ $edu->end_year ?? 'Devam' }})</p>
    @endforeach

    <h4 class="mt-4">DENEYİM</h4>
    <hr>
    @foreach($candidate->experiences as $exp)
        <p>{{ $exp->company }}, {{ $exp->position }} ({{ $exp->start_date }}–{{ $exp->end_date ?? 'Devam' }})</p>
    @endforeach

    <h4 class="mt-4">YETENEKLER</h4>
    <hr>
    <p>{{ $candidate->skills->pluck('name')->implode(', ') }}</p>

    <h4 class="mt-4">SERTİFİKALAR</h4>
    <hr>
    @foreach($candidate->certificates as $cert)
        <p>{{ $cert->name }} — {{ $cert->issuer ?? '' }}</p>
    @endforeach

    <div class="mt-4 text-center">
        <a href="{{ route('cvs.pdf', $cv) }}" class="btn btn-outline-dark">PDF İndir</a>
    </div>
</div>
</body>
</html>