<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset(mix("/css/app.css")) }}"" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset(mix("/js/manifest.js")) }}"></script>
    <script src="{{ asset(mix("/js/vendor.js")) }}"></script>
    <script src="{{ asset(mix("/js/app.js")) }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>