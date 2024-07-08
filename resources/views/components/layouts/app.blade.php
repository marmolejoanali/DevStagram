<x-layouts.header title="{{ $title  ?? '' }}" meta-description="{{$metaDescription ?? 'header meta description' }}" />
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                {{ $title ?? "" }}
            </h2>
            {{--  <!-- @component('components.layouts.app')-->  --}}
            {{--  <!-- Esto equivale al slot de a continuacion, en este apartado se agregara todo el cuerpo de la pagina en los demas documentos se grega  -->  --}}
            {{ $slot }}
        </main>

    <x-layouts.footer/>
    @livewireScripts()
    </body>
</html>
