<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - İşveren Paneli</title>
</head>

<body>

    <h1>İşveren Paneli</h1>

    <p>Hoş geldiniz, {{ $user->name }} 👋</p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        <li><a href="#">Firma Profilim</a></li>
        <li><a href="#">İlanlarım</a></li>
        <li><a href="#">Yeni İlan Oluştur</a></li>
        <li><a href="#">Gelen Başvurular</a></li>
        <li><a href="#">Favori Adaylarım</a></li>
    </ul>

    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Çıkış Yap</button>
    </form>

</body>

</html>