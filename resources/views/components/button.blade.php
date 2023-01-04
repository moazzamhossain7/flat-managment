@props(['icon' => null, 'modal' => null])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn']) }} @if($modal) data-bs-toggle="modal" data-bs-target="#modal" @endif>
    @if($icon)
        <i class="{{ $icon }}"></i>
    @endif

    {{ $slot }}
</button>
