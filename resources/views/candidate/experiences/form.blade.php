<form action="{{ $action }}" method="POST">

    @csrf

    <!-- Edit işleminde PUT kullan -->
    @if($method === 'PUT')
        @method('PUT')
    @endif


    <!-- Validation hataları -->
    @if($errors->any())

        <div style="
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        ">

            <strong>Lütfen aşağıdaki hataları düzeltin:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <!-- Şirket adı -->
    <div style="margin-bottom: 20px;">

        <label for="company_name">
            Şirket Adı
        </label>

        <input
            type="text"
            id="company_name"
            name="company_name"
            value="{{ old('company_name', $experience->company_name ?? '') }}"
            placeholder="Örn: Code23"
            required
            style="
                width: 100%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
            "
        >

    </div>


    <!-- Pozisyon -->
    <div style="margin-bottom: 20px;">

        <label for="position">
            Pozisyon
        </label>

        <input
            type="text"
            id="position"
            name="position"
            value="{{ old('position', $experience->position ?? '') }}"
            placeholder="Örn: Backend Developer"
            required
            style="
                width: 100%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
            "
        >

    </div>


    <!-- Başlangıç tarihi -->
    <div style="margin-bottom: 20px;">

        <label for="start_date">
            Başlangıç Tarihi
        </label>

        <input
            type="date"
            id="start_date"
            name="start_date"
            value="{{ old('start_date', $experience->start_date ?? '') }}"
            style="
                width: 100%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
            "
        >

    </div>


    <!-- Bitiş tarihi -->
    <div style="margin-bottom: 20px;">

        <label for="end_date">
            Bitiş Tarihi
        </label>

        <input
            type="date"
            id="end_date"
            name="end_date"
            value="{{ old('end_date', $experience->end_date ?? '') }}"
            style="
                width: 100%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
            "
        >

    </div>


    <!-- Hâlen çalışıyor checkbox -->
    <div style="margin-bottom: 20px;">

        <label>

            <input
                type="checkbox"
                name="is_current"
                value="1"
                {{ old('is_current', $experience->is_current ?? false) ? 'checked' : '' }}
            >

            Hâlen bu şirkette çalışıyorum

        </label>

    </div>


    <!-- Açıklama -->
    <div style="margin-bottom: 20px;">

        <label for="description">
            Açıklama
        </label>

        <textarea
            id="description"
            name="description"
            rows="6"
            placeholder="Görevleriniz, sorumluluklarınız ve yaptığınız çalışmalar..."
            style="
                width: 100%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
                resize: vertical;
            "
        >{{ old('description', $experience->description ?? '') }}</textarea>

    </div>


    <!-- Kaydet butonu -->
    <button
        type="submit"
        style="
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
        "
    >
        {{ $method === 'PUT' ? 'Değişiklikleri Kaydet' : 'İş Deneyimini Ekle' }}
    </button>

</form>