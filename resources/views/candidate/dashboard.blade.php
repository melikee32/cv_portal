<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Aday Paneli</title>
</head>

<body>

    <h1>Aday Paneli</h1>

    <p>Hoş geldin, {{ $user->name }} 👋</p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        <li><a href="#">Profilim</a></li>
        <li><a href="#">CV'lerim</a></li>
        <li><a href="#">İş İlanlarını İncele</a></li>
        <li><a href="#">Başvurularım</a></li>
        <li><a href="#">Favorilerim</a></li>
    </ul>

    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Çıkış Yap</button>
    </form>

</body>

</html>