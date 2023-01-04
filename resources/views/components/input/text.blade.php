@props([
    'error' => false,
    'leadingAddOn' => false,
    'addOnClass' => null,
    'addOnTextClass' => null,
])

@if($leadingAddOn)
<div class="input-group input-group-merge {{ $addOnClass }}">
    <span class="input-group-text {{ $addOnTextClass }}">{!! $leadingAddOn !!}</span>
@endif

<input {{ $attributes->merge(['class' => 'form-control' . ($error ? ' is-invalid' : '')]) }}/>

@if($leadingAddOn)
</div>
@endif

@if ($error)
    <div class="my-1 invalid-feedback text-sm">{{ $error }}</div>
@endif
