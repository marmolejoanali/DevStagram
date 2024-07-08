<x-layouts.app title="Registrate en DevStagram" meta-description="pagina de registro meta Description">
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5 sm:max-w-full">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">
            <form action="{{route('register.store')}}" method="POST" novalidate>

            @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" name="name" class="border p-3 w-full rounded-lg
                    @error('name') border-red-500 @enderror" value="{{old('name')}}" placeholder="Tu Nombre">
                    @error('name')
                    <!-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p> -->
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" name="username" id="username" class="border p-3 w-full rounded-lg
                    @error('username') border-red-500 @enderror" value="{{old('username')}}" placeholder="Tu nombre de usuario">
                    @error('username')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" name="email" id="email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}" placeholder="Tu email de registro">
                    @error('email')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">password</label>
                    <input type="password" name="password" id="password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"  placeholder="Escribe tu contraseña">
                    @error('password')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border p-3 w-full rounded-lg" placeholder="Repite tu contraseña">
                </div>

                <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

</x-layouts.app>

