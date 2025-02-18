<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    {{-- Header --}}
    @include('layouts.header')
    {{-- Content --}}
    <main>
        <div class="container">
            {{-- Navigation --}}
            <x-navbar></x-navbar>
            @yield('content')
        </div>
    </main>
    {{-- Footer --}}
    @include('layouts.footer')
</body>
<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</html>