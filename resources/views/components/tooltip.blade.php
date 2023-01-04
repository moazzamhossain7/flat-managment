@props([
    'alignment' => 'top',
    'content' => '',
    'color' => 'secondary',
    'icon' => null
])

<span
    data-bs-toggle="tooltip" 
    data-bs-offset="0,4" 
    data-bs-placement="{{ $alignment }}" 
    data-bs-html="true" 
    title="{{ $content }}"
    data-bs-custom-class="tooltip-{{ $color }}"
>
    @if($icon) 
        <i class="{{ $icon }}"></i>
    @endif

    {{ $slot }}
</span>