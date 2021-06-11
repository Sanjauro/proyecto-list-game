<x-layout>
    <x-slot name="main">
        <link rel="stylesheet" href={{ secure_asset('css/welcome.css') }}>
        <h1 class="text-center mt-3">Juegos más Recientes</h1>
        <hr>
        <div id="juegos_recientes" class="row">
            @foreach ($videogames_published as $videogame)
                <div class="juego col-xl-2 col-md-4 col-sm-6 text-center">
                    <a href="/videojuegos/{{ $videogame->name }}"><img
                            src="images/covers/{{ $videogame->cover }}" class="card-img-top"
                            alt="Portada"><span>{{ $videogame->name }}</span></a>
                </div>
            @endforeach
        </div>
        
        <h1 class="text-center mt-3">Próximos Juegos</h1>
        <hr>
        <div id="juegos_proximos" class="row">
            @foreach ($videogames_next as $videogame)
                <div class="juego col-lg-2 col-sm-6 text-center">
                    <a href="/videojuegos/{{ $videogame->name }}"><img
                            src="images/covers/{{ $videogame->cover }}" class="card-img-top"
                            alt="Portada"><span>{{ $videogame->name }}</span></a>
                </div>
            @endforeach
        </div>

        <form id="contactanos" class="my-5 container card" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <h1 class="mt-2">Contáctanos</h1>
            <label for="email" class="form-label mt-4">Dirección email</label>
            <input type="email" class="form-control" id="email" name="email"
                placeholder="Escriba su dirección de correo electrónico" required>

            @error('email')
                <div class="text-danger">
                    {{ $message ? 'Este campo es requerido. Puede que no haya escrito un correo' : '' }}</div>
            @enderror
            <label for="problem" class="form-label mt-4">Cuéntenos el problema</label>
            <textarea name="problem" id="problem" cols="30" rows="8" class="form-control"
                placeholder="Redacte el problema" required></textarea>
            @error('problem')
                <div class="text-danger">{{ $message ? 'Este campo es requerido.' : '' }}</div>
            @enderror
            <button type="submit" class="btn btn-primary my-3">Contáctanos</button>
            @if (session('message'))
                <div class="text-success">{{ session('message') }}</div>
            @endif
        </form>
    </x-slot>
</x-layout>