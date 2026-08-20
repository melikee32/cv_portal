@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div>
    <label for="school_name">Okul Adı</label>
    <input type="text" id="school_name" name="school_name" value="{{ old('school_name', $education->school_name ?? '') }}" required>
</div><br>

<div>
    <label for="department">Bölüm</label>
    <input type="text" id="department" name="department" value="{{ old('department', $education->department ?? '') }}">
</div><br>

<div>
    <label for="degree">Derece</label>
    <input type="text" id="degree" name="degree" value="{{ old('degree', $education->degree ?? '') }}">
</div><br>

<div>
    <label for="start_date">Başlangıç Tarihi</label>
    <input type="date" id="start_date" name="start_date" value="{{ old('start_date', isset($education) ? $education->start_date?->format('Y-m-d') : '') }}">
</div><br>

<div>
    <label for="end_date">Bitiş Tarihi</label>
    <input type="date" id="end_date" name="end_date" value="{{ old('end_date', isset($education) ? $education->end_date?->format('Y-m-d') : '') }}">
</div><br>

<div>
    <label for="is_current">
        <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current', $education->is_current ?? false) ? 'checked' : '' }}>
        Halen devam ediyorum
    </label>
</div><br>

<div>
    <label for="description">Açıklama</label>
    <textarea id="description" name="description">{{ old('description', $education->description ?? '') }}</textarea>
</div><br>