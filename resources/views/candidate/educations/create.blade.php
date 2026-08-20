<!DOCTYPE html>
<html lang="tr">
<head><meta charset="UTF-8"><title>Eğitim Ekle</title></head>
<body>
    <h1>Eğitim Ekle</h1>
    <form action="{{ route('candidate.educations.store') }}" method="POST">
        @csrf
        @include('candidate.educations.form')
        <button type="submit">Kaydet</button>
    </form>
</body>
</html>