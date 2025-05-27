@php
    $avatar = Auth::user()->registro->avatar;
    $avatarPath = $avatar ? asset('storage/' . $avatar) : asset('image/avatar-default.jpg');
@endphp

<img src="{{ $avatarPath }}" {{ $attributes->merge(['class' => '']) }} alt="Avatar del usuario">

