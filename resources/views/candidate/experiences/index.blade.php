<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>İş Deneyimlerim</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0;
            color: #333;
        }

        .add-button {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
        }

        .add-button:hover {
            background: #1d4ed8;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .experience-card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .experience-card h2 {
            margin-top: 0;
            margin-bottom: 5px;
            color: #222;
        }

        .company {
            color: #2563eb;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .date {
            color: #666;
            margin-bottom: 15px;
        }

        .description {
            color: #444;
            line-height: 1.6;
        }

        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .edit-button {
            background: #f59e0b;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
        }

        .delete-button {
            background: #dc2626;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .empty {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 12px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Sayfa başlığı ve yeni deneyim butonu -->
    <div class="header">

        <h1>💼 İş Deneyimlerim</h1>

        <a href="{{ route('candidate.experiences.create') }}"
           class="add-button">
            + Yeni Deneyim Ekle
        </a>

    </div>


    <!-- Başarı mesajı -->
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Deneyimler varsa -->
    @forelse($experiences as $experience)

        <div class="experience-card">

            <!-- Pozisyon -->
            <h2>
                {{ $experience->position }}
            </h2>

            <!-- Şirket -->
            <div class="company">
                {{ $experience->company_name }}
            </div>


            <!-- Tarih bilgisi -->
            <div class="date">

                @if($experience->start_date)
                    {{ \Carbon\Carbon::parse($experience->start_date)->format('d.m.Y') }}
                @endif

                -

                @if($experience->is_current)
                    Devam ediyor
                @elseif($experience->end_date)
                    {{ \Carbon\Carbon::parse($experience->end_date)->format('d.m.Y') }}
                @else
                    Belirtilmedi
                @endif

            </div>


            <!-- Açıklama -->
            @if($experience->description)

                <div class="description">
                    {{ $experience->description }}
                </div>

            @endif


            <!-- Düzenle / Sil -->
            <div class="actions">

                <a href="{{ route('candidate.experiences.edit', $experience) }}"
                   class="edit-button">
                    Düzenle
                </a>


                <form action="{{ route('candidate.experiences.destroy', $experience) }}"
                      method="POST"
                      onsubmit="return confirm('Bu iş deneyimini silmek istediğinize emin misiniz?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button">
                        Sil
                    </button>

                </form>

            </div>

        </div>

    @empty

        <!-- Hiç deneyim yoksa -->
        <div class="empty">

            <h2>Henüz iş deneyiminiz yok.</h2>

            <p>İlk iş deneyiminizi eklemek için yukarıdaki butonu kullanabilirsiniz.</p>

        </div>

    @endforelse

</div>

</body>
</html>