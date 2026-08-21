<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>{{ $cv->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4" style="max-width: 800px;">
    <div class="border-start border-primary border-4 ps-3 mb-4">
        <h1>{{ $candidate->user->name ?? 'Ad Soyad' }}</h1>
        <p class="text-muted">{{ $candidate->title ?? '' }}</p>
    </div>

    <h4 class="text-primary">Eğitim</h4>
    @foreach($candidate->educations as $edu)
        <p><strong>{{ $edu->school }}</strong> — {{ $edu->department ?? '' }} ({{ $edu->start_year }}–{{ $edu->end_year ?? 'Devam' }})</p>
    @endforeach

    <h4 class="text-primary mt-4">Deneyim</h4>
    @foreach($candidate->experiences as $exp)
        <p><strong>{{ $exp->company }}</strong> — {{ $exp->position }} ({{ $exp->start_date }}–{{ $exp->end_date ?? 'Devam' }})</p>
    @endforeach

    <h4 class="text-primary mt-4">Yetenekler</h4>
    <p>{{ $candidate->skills->pluck('name')->implode(', ') }}</p>

    <h4 class="text-primary mt-4">Sertifikalar</h4>
    @foreach($candidate->certificates as $cert)
        <p>{{ $cert->name }} — {{ $cert->issuer ?? '' }}</p>
    @endforeach

    <h4 class="text-primary mt-4">Kurslar</h4>
    @foreach($candidate->courses as $course)
        <p>{{ $course->name }}</p>
    @endforeach
</div>
</body>
</html>