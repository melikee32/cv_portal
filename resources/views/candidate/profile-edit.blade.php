<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Profilimi Düzenle</title>
</head>

<body>

    <h1>Profilimi Düzenle</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidate.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="phone">Telefon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}">
        </div><br>

        <div>
            <label for="date_of_birth">Doğum Tarihi</label>
            <input type="date" id="date_of_birth" name="date_of_birth"
                value="{{ old('date_of_birth', $profile->date_of_birth?->format('Y-m-d')) }}">
        </div><br>

        <div>
            <label for="city">Şehir</label>
            <input type="text" id="city" name="city" value="{{ old('city', $profile->city) }}">
        </div><br>

        <div>
            <label for="about_me">Hakkımda</label>
            <textarea id="about_me" name="about_me">{{ old('about_me', $profile->about_me) }}</textarea>
        </div><br>

        <div>
            <label for="github">GitHub</label>
            <input type="url" id="github" name="github" value="{{ old('github', $profile->github) }}">
        </div><br>

        <div>
            <label for="linkedin">LinkedIn</label>
            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $profile->linkedin) }}">
        </div><br>

        <div>
            <label for="portfolio">Portföy</label>
            <input type="url" id="portfolio" name="portfolio" value="{{ old('portfolio', $profile->portfolio) }}">
        </div><br>

        <div>
            <label for="is_public">
                <input type="checkbox" id="is_public" name="is_public" value="1"
                    {{ old('is_public', $profile->is_public) ? 'checked' : '' }}>
                Profilim herkese açık olsun
            </label>
        </div><br>

        <button type="submit">Güncelle</button>
    </form>

    <p>Tamamlanma oranı: {{ $profile->profile_completion_rate }}%</p>

</body>

</html>