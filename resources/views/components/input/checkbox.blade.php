@props([
    'label'
])

<div class="form-check {{ $attributes->get('class') }}">
    <input {{ $attributes->whereDoesntStartWith('class') }}
        class="form-check-input"
    />
    <label class="form-check-label" for="{{ $attributes->get('id') }}">
        {{ $label }}
    </label>
</div>
