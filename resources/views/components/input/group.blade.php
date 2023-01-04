@props([
    'label',
    'for' => null,
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
])

@php $for = $for ?? removeSpace(strtolower($label), '-'); @endphp

<div {{ $attributes }}>
    @if($inline)
        <label for="{{ $for }}" class="col-md-2 col-form-label">{{ $label }}</label>

        <div class="col-md-10">
            {{ $slot }}

            @if ($error)
                <div class="my-1 invalid-feedback d-block text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <div class="form-text">{{ $helpText }}</div>
            @endif
        </div>
    @else
        <label for="{{ $for }}" class="form-label">
            {{ $label }}
        </label>
        
        {{ $slot }}

        @if ($error)
            <div class="my-1 invalid-feedback d-block text-sm">{{ $error }}</div>
        @endif

        @if ($helpText)
            <div class="form-text">{{ $helpText }}</div>
        @endif
    @endif
</div>
