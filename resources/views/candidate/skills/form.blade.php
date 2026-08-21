<form action="{{ $action }}" method="POST">

    @csrf

    @if($method === 'PUT')
        @method('PUT')
    @endif

    @if($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <strong>Lütfen aşağıdaki hataları düzeltin:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Yetenek adı -->
    <div style="margin-bottom: 20px;">
        <label for="name">Yetenek Adı</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $skill->name ?? '') }}"
            placeholder="Örn: Laravel, İngilizce"
            required
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
    </div>

    <!-- Seviye -->
    <div style="margin-bottom: 20px;">
        <label for="level">Seviye</label>
        <select
            id="level"
            name="level"
            required
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
            @php
                $currentLevel = old('level', $skill->level ?? '');
            @endphp
            <option value="" disabled {{ $currentLevel === '' ? 'selected' : '' }}>Seçiniz</option>
            <option value="Başlangıç" {{ $currentLevel === 'Başlangıç' ? 'selected' : '' }}>Başlangıç</option>
            <option value="Orta" {{ $currentLevel === 'Orta' ? 'selected' : '' }}>Orta</option>
            <option value="İleri" {{ $currentLevel === 'İleri' ? 'selected' : '' }}>İleri</option>
        </select>
    </div>

    <!-- Kategori -->
    <div style="margin-bottom: 20px;">
        <label for="category">Kategori</label>
        <input
            type="text"
            id="category"
            name="category"
            value="{{ old('category', $skill->category ?? '') }}"
            placeholder="Örn: Teknik, Dil, Yumuşak Beceri"
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
    </div>

    <button
        type="submit"
        style="background: #2563eb; color: white; border: none; padding: 12px 20px; border-radius: 8px; cursor: pointer;"
    >
        {{ $method === 'PUT' ? 'Değişiklikleri Kaydet' : 'Yeteneği Ekle' }}
    </button>

</form>