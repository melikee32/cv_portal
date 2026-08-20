<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Profilini Tamamla</title>
</head>

<body>

    <h1>Profilini Tamamla</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('candidate.profile.store') }}" method="POST">
        @csrf

        <div>
            <label for="phone">Telefon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
        </div><br>

        <div>
            <label for="date_of_birth">Doğum Tarihi</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
        </div><br>

        <div>
            <label for="city">Şehir</label>
            <select id="city" name="city">
                <option value="" disabled selected>Seçiniz</option>
                @foreach(['Adana', 'Adıyaman', 'Afyonkarahisar', 'Ağrı', 'Amasya', 'Ankara', 'Antalya', 'Artvin', 'Aydın', 'Balıkesir', 'Bilecik', 'Bingöl', 'Bitlis', 'Bolu', 'Burdur', 'Bursa', 'Çanakkale', 'Çankırı', 'Çorum', 'Denizli', 'Diyarbakır', 'Edirne', 'Elazığ', 'Erzincan', 'Erzurum', 'Eskişehir', 'Gaziantep', 'Giresun', 'Gümüşhane', 'Hakkâri', 'Hatay', 'Isparta', 'Mersin', 'İstanbul', 'İzmir', 'Kars', 'Kastamonu', 'Kayseri', 'Kırklareli', 'Kırşehir', 'Kocaeli', 'Konya', 'Kütahya', 'Malatya', 'Manisa', 'Kahramanmaraş', 'Mardin', 'Muğla', 'Muş', 'Nevşehir', 'Niğde', 'Ordu', 'Rize', 'Sakarya', 'Samsun', 'Siirt', 'Sinop', 'Sivas', 'Tekirdağ', 'Tokat', 'Trabzon', 'Tunceli', 'Şanlıurfa', 'Uşak', 'Van', 'Yozgat', 'Zonguldak', 'Aksaray', 'Bayburt', 'Karaman', 'Kırıkkale', 'Batman', 'Şırnak', 'Bartın', 'Ardahan', 'Iğdır', 'Yalova', 'Karabük', 'Kilis', 'Osmaniye', 'Düzce'] as $city)
                <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>
                    {{ $city }}
                </option>
                @endforeach
            </select>
        </div><br>

        <div>
            <label for="about_me">Hakkımda</label>
            <textarea id="about_me" name="about_me">{{ old('about_me') }}</textarea>
        </div><br>

        <div>
            <label for="github">GitHub</label>
            <input type="url" id="github" name="github" value="{{ old('github') }}" placeholder="https://github.com/kullaniciadi">
        </div><br>

        <div>
            <label for="linkedin">LinkedIn</label>
            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
        </div><br>

        <div>
            <label for="portfolio">Portföy</label>
            <input type="url" id="portfolio" name="portfolio" value="{{ old('portfolio') }}">
        </div><br>

        <div>
            <label for="is_public">
                <input type="checkbox" id="is_public" name="is_public" value="1" checked>
                Profilim herkese açık olsun
            </label>
        </div><br>

        <button type="submit">Kaydet</button>
    </form>

</body>

</html>