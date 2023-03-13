<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <div class="input-group flex-nowrap">
        <span class="input-group-text bg-light border border-end-0 text-dark" id="insta-id">{{ $icon }}</span>
        <input name="{{ $name }}" id="name" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}" aria-label="Username" aria-describedby="insta-id">
    </div>
</div>
