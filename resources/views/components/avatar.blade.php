@php
    $avatar = Auth::user()->registro->avatar;
    $avatarPath = $avatar ? asset('storage/' . $avatar) : null;
@endphp

<img src="{{ $avatarPath }}" {{ $attributes->merge(['class' => '']) }} alt="Avatar del usuario">

