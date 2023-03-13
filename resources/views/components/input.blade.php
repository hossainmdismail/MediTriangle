<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <input name="{{ $name }}" id="name" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">
</div>
