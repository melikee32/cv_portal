<form action="{{ $action }}" method="POST" enctype="multipart/form-data">

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

    <!-- Sertifika adı -->
    <div style="margin-bottom: 20px;">
        <label for="name">Sertifika Adı</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $certificate->name ?? '') }}"
            placeholder="Örn: AWS Certified Developer"
            required
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
    </div>

    <!-- Kurum -->
    <div style="margin-bottom: 20px;">
        <label for="institution">Veren Kurum</label>
        <input
            type="text"
            id="institution"
            name="institution"
            value="{{ old('institution', $certificate->institution ?? '') }}"
            placeholder="Örn: Amazon Web Services"
            required
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
    </div>

    <!-- Tarih -->
    <div style="margin-bottom: 20px;">
        <label for="issue_date">Alınma Tarihi</label>
        <input
            type="date"
            id="issue_date"
            name="issue_date"
            value="{{ old('issue_date', $certificate->issue_date ?? '') }}"
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
    </div>

    <!-- URL -->
    <div style="margin-bottom: 20px;">
        <label for="certificate_url">Sertifika Linki (opsiyonel)</label>
        <input
            type="url"
            id="certificate_url"
            name="certificate_url"
            value="{{ old('certificate_url', $certificate->certificate_url ?? '') }}"
            placeholder="https://..."
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >
    </div>

    <!-- Dosya yükleme -->
    <div style="margin-bottom: 20px;">
        <label for="certificate_file">Sertifika Dosyası (opsiyonel, PDF/JPG/PNG)</label>
        <input
            type="file"
            id="certificate_file"
            name="certificate_file"
            accept=".pdf,.jpg,.jpeg,.png"
            style="width: 100%; padding: 10px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"
        >

        @if(!empty($certificate) && $certificate->certificate_file)
            <div style="margin-top: 8px; font-size: 14px;">
                Mevcut dosya:
                <a href="{{ asset('storage/' . $certificate->certificate_file) }}" target="_blank">
                    görüntüle
                </a>
                (yeni dosya seçersen bu değişir)
            </div>
        @endif
    </div>

    <button
        type="submit"
        style="background: #2563eb; color: white; border: none; padding: 12px 20px; border-radius: 8px; cursor: pointer;"
    >
        {{ $method === 'PUT' ? 'Değişiklikleri Kaydet' : 'Sertifikayı Ekle' }}
    </button>

</form>