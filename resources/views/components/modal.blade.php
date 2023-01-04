@props([
    'id',
    'maxWidth' => null, // .modal-{sm|lg|xl}
    'backdrop' => 'static',
    'title' => ''
])

<!-- Modal -->
<div wire:ignore.self {{ $attributes->merge(['class' => 'modal fade']) }} id="{{ $id }}" data-bs-backdrop="{{ $backdrop }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog {{ $maxWidth ? 'modal-' . $maxWidth : '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if($title)
                    <h5 class="modal-title">{{ $title }}</h5>
                @endif

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div {{ $body->attributes->merge(['class' => 'modal-body']) }}>
                {{ $body }}
            </div>

            <div {{ $footer->attributes->merge(['class' => 'modal-footer']) }}>
                {{ $footer ?? '' }}
            </div>
        </div>
    </div>
</div>
