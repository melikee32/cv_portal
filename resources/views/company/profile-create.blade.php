<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Firma Profili Oluştur</title>
</head>

<body>

    <h1>Firma Profilini Oluştur</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('company.profile.store') }}" method="POST">
        @csrf

        <div>
            <label for="company_name">Firma Adı</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
        </div><br>

        <div>
            <label for="industry">Sektör</label>
            <input type="text" id="industry" name="industry" value="{{ old('industry') }}">
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

        <div>
            <label for="address">Adres</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
        </div><br>

        <div>
            <label for="description">Firma Açıklaması</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div><br>

        <div>
            <label for="website">Web Sitesi</label>
            <input type="url" id="website" name="website" value="{{ old('website') }}">
        </div><br>

        <div>
            <label for="instagram">Instagram</label>
            <input type="url" id="instagram" name="instagram" value="{{ old('instagram') }}">
        </div><br>

        <div>
            <label for="linkedin">LinkedIn</label>
            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
        </div><br>

        <div>
            <label for="x">X (Twitter)</label>
            <input type="url" id="x" name="x" value="{{ old('x') }}">
        </div><br>

        <button type="submit">Kaydet</button>
    </form>

</body>

</html>