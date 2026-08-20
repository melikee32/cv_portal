<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Login </title>
</head>



<body>

    <h1>CV Portal</h1>

    <h2>Giriş Yap</h2>

    @if (session('success'))
    <p> {{ session('success') }} </p>
    @endif


    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
        <p> {{ $error }} </p>
        @endforeach
    </div>
    @endif


    <form action="{{ url('/login') }}" method="POST">

        {{-- CSRF koruması --}}
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div> <br>


        <div>
            <label for="password">Şifre</label>

            <input type="password" id="password" name="password" required>
        </div> <br>


        <button type="submit">Giriş Yap</button>

    </form>

    <p> Hesabın yok mu?
        <a href="{{ url('/register') }}"> Kayıt Ol</a>
    </p>


</body>

</html>