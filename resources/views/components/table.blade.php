@props(['rounded' => null])

<div class="table-responsive {{ $rounded ? 'rounded' : '' }}">
    <table {{ $attributes->merge(['class' => 'table']) }}>
        <thead {{ $head->attributes->merge(['class' => '']) }}>
            <tr>
                {{ $head }}
            </tr>
        </thead>

        <tbody {{ $body->attributes->merge(['class' => '']) }}>
            {{ $body }}
        </tbody>
    </table>

    {{ $footer ?? '' }}
</div>