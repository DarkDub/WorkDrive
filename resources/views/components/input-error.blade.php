@props(['messages'])

@if ($messages)
    <div style="margin-top: 0.25rem; font-size: 0.75rem; color: #b91c1c; font-weight: 100; line-height: 1;">
        @foreach ((array) $messages as $message)
            <p style="margin-bottom: 0.25rem;">{{ $message }}</p>
        @endforeach
    </div>
@endif
