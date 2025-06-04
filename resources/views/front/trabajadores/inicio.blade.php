@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
   
@endsection

@section('content')
<x-menuWork />


    <h2 class="title-content">tu inicio</h2>

   
</main>


@endsection

@section('scripts')
<script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
<script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
<script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
    