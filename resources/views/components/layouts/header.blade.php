<!DOCTYPE html>
<html lang="{{ str_replace('-', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Devstagram - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}" />
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

{{-- <body class=" dark:bg-slate-900 bg-gray-100"> --}}
<body class="bg-gray-100 ">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-black italic">Devstagram</a>
            <x-layouts.navigation />
        </div>
    </header>
