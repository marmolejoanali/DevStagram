<x-layouts.app title="Inicia sesión en DevStagram" meta-description="pagina de iniciar sesion meta Description">

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5 sm:max-w-full">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen login de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login.store')}}" novalidate>
                @csrf

                @if(session('mensaje'))
                    <small class="text-base font-bold text-red-500/80">{{ session('mensaje') }}</small>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" name="email" id="email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{old('email')}}" placeholder="Tu email de registro">
                    @error('email')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">password</label>
                    <input type="password" name="password" id="password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                        placeholder="Escribe tu contraseña">
                    @error('password')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">

                    <input type="checkbox"  name="remember"><label for="password" class="ml-2 text-sm text-gray-500 font-bold">Mantener mi sesion abierta </label>
                </div>

                <input type="submit" value="Iniciar sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

</x-layouts.app>
