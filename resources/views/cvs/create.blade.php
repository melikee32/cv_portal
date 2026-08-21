<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Yeni CV Oluştur</h2>
    <form action="{{ route('cvs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Şablon</label>
            <select name="template" class="form-control" required>
                @foreach($templates as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('template') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Oluştur</button>
    </form>
</div>
</body>
</html>