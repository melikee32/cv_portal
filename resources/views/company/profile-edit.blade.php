<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Portal - Firma Profilini Düzenle</title>
</head>

<body>

    <h1>Firma Profilini Düzenle</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('company.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="company_name">Firma Adı</label>
            <input type="text" id="company_name" name="company_name"
                value="{{ old('company_name', $company->company_name) }}" required>
        </div><br>

        <div>
            <label for="industry">Sektör</label>
            <input type="text" id="industry" name="industry" value="{{ old('industry', $company->industry) }}">
        </div><br>

        <div>
            <label for="city">Şehir</label>
            <input type="text" id="city" name="city" value="{{ old('city', $company->city) }}">
        </div><br>

        <div>
            <label for="address">Adres</label>
            <input type="text" id="address" name="address" value="{{ old('address', $company->address) }}">
        </div><br>

        <div>
            <label for="description">Firma Açıklaması</label>
            <textarea id="description" name="description">{{ old('description', $company->description) }}</textarea>
        </div><br>

        <div>
            <label for="website">Web Sitesi</label>
            <input type="url" id="website" name="website" value="{{ old('website', $company->website) }}">
        </div><br>

        <div>
            <label for="instagram">Instagram</label>
            <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $company->instagram) }}">
        </div><br>

        <div>
            <label for="linkedin">LinkedIn</label>
            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $company->linkedin) }}">
        </div><br>

        <div>
            <label for="x">X (Twitter)</label>
            <input type="url" id="x" name="x" value="{{ old('x', $company->x) }}">
        </div><br>

        <button type="submit">Güncelle</button>
    </form>

</body>

</html>