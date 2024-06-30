@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'form-label']) }}>
        {{ $status }}
    </div>
@endif
