@props(['title'])

<div {{ $attributes->merge(['class' => 'card-header py-3']) }}>
    <div class="head-label text-center">
        <h5 class="card-title mb-0">{{ $title }}</h5>
    </div>     
    
    <div class="d-flex justify-content-end align-items-center">
        {{ $slot }}
    </div>
</div>