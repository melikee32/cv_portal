<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>CV Portalı - Test</title>
</head>
<body>

    <h1>CV Portalı Test</h1>

    @forelse($users as $user)

        <hr>

        <h2>{{ $user->name }}</h2>

        <p>Email: {{ $user->email }}</p>
        <p>Rol: {{ $user->role }}</p>

        @if($user->candidateProfile)
            <h3>Candidate Profile ✅</h3>

            <p>Telefon: {{ $user->candidateProfile->phone }}</p>
            <p>Şehir: {{ $user->candidateProfile->city }}</p>
            <p>Hakkımda: {{ $user->candidateProfile->about }}</p>
        @else
            <p>Candidate Profile bulunamadı ❌</p>
        @endif

    @empty

        <p>Veritabanında kullanıcı bulunamadı.</p>

    @endforelse

</body>
</html>