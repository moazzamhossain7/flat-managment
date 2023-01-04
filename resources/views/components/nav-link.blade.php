@props(['icon' => null, 'modal' => null])

<a {{ $attributes->merge(['class' => '']) }} @if($modal) data-bs-toggle="modal" data-bs-target="#modal" @endif>
    @if($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
