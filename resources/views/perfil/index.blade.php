<x-layouts.app title="Editar Perfil: {{ auth()->user()->username }}" meta-description="Editar perfil meta Description">

    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" name="username"
                        class="border p-3 w-full rounded-lg
                            @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}" placeholder="Tu nombre de usuario">
                    @error('username')
                        <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>
                    <input type="file" id="imagen" name="imagen" class="border p-3 w-full rounded-lg"
                        value="" accept=".jpg,.jpeg,.png">
                </div>

                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

</x-layouts.app>
