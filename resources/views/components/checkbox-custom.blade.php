<input
    type="checkbox"
    class="custom-checkbox {{ $class ?? '' }}"
    {{ $attributes->merge(['class' => 'custom-checkbox']) }}
    @if(isset($checked) && $checked) checked @endif
/>