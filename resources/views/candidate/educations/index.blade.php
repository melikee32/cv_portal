<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Eğitim Bilgilerim</title>
</head>
<body>

    <h1>Eğitim Bilgilerim</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('candidate.educations.create') }}">+ Yeni Eğitim Ekle</a>

    <ul>
        @forelse ($educations as $education)
            <li>
                <strong>{{ $education->school_name }}</strong>
                @if ($education->degree) — {{ $education->degree }} @endif
                @if ($education->department) ({{ $education->department }}) @endif
                <br>
                {{ $education->start_date?->format('Y') }} - {{ $education->is_current ? 'Devam ediyor' : $education->end_date?->format('Y') }}
                <br>
                <a href="{{ route('candidate.educations.edit', $education) }}">Düzenle</a>
                <form action="{{ route('candidate.educations.destroy', $education) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
                </form>
            </li>
        @empty
            <li>Henüz eğitim bilgisi eklenmemiş.</li>
        @endforelse
    </ul>

</body>
</html>