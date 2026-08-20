<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Register</title>
</head>


<body>
    <h1>CV Portalı</h1>

    <h3>Hesap Oluşturun</h3>


    {{-- Show validation errors --}}
    @if ($errors->any())
    <div>
        <strong>Hatalar:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    {{-- Registration successful message --}}
    @if (session('success'))
    <p> {{ session('success') }} </p>
    @endif


    {{-- Register Form --}}
    <form action="{{ url('/register') }}" method="POST">

        {{-- Laravel CSRF güvenliği --}}
        @csrf

        <div>
            <label for="name">Ad Soyad</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div><br>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div><br>

        <div>
            <label for="password">Şifre</label>
            <input type="password" id="password" name="password" required>
        </div><br>

        <div>
            <label for="password_confirmation">Şifre Tekrar</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div><br>

        <div>
            <label for="role">Hesap Türü</label>

            <select name="role" id="role" required>
                <option value="candidate">Aday</option>
                <option value="employer">İşveren</option>
            </select>

        </div><br>

        <button type="submit">Kayıt Ol</button>

    </form>

    <p>Zaten hesabın var mı? 
        <a href="{{ url('/login') }}">Giriş Yap</a>
    </p>

</body>

</html>