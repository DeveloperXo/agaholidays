@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'err-list text-danger text-sm nav']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
