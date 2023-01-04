@props(['label'])

<div class="form-check form-switch {{ $attributes->get('class') }}">
    <input {{ $attributes->whereDoesntStartWith('class') }} class="form-check-input" type="checkbox">
    <label class="form-check-label" for="{{ $attributes->get('id') }}">{{ $label }}</label>
</div>
