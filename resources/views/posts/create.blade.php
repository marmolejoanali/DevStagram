<x-layouts.app title="Crea una nueva publicación" meta-description="pagina crear posts meta Description">

    @push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    @endpush
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">

            <form action="{{route('imagenes.store')}}" method="POST" id="dropzone" enctype="multipart/form-data"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">

            <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input type="text" id="titulo" name="titulo" class="border p-3 w-full rounded-lg
                        @error('titulo') border-red-500 @enderror" value="{{old('titulo')}}"
                        placeholder="Titulo de la publicación">
                    @error('titulo')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                    {{--
                    <!-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p> -->
                    --}}
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">
                    @error('imagen')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" value="Crear Publicación" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>

        </div>
    </div>
</x-layouts.app>
