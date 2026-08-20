<!DOCTYPE html>
<html lang="tr">
<head><meta charset="UTF-8"><title>Eğitim Düzenle</title></head>
<body>
    <h1>Eğitim Düzenle</h1>
    <form action="{{ route('candidate.educations.update', $education) }}" method="POST">
        @csrf
        @method('PUT')
        @include('candidate.educations.form')
        <button type="submit">Güncelle</button>
    </form>
</body>
</html>