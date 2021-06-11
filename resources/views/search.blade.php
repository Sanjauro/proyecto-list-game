<x-layout>
    <x-slot name="main">
        <link rel="stylesheet" href={{ secure_asset('css/search.css') }}>

        <div id="busqueda" class="row mt-5">
            @foreach ($videogames_search as $videogame_search)
                <div class="juego col-lg-2 col-sm-6 text-center">
                    <a href="/videojuegos/{{ $videogame_search->name }}"><img
                            src="images/covers/{{ $videogame_search->cover }}" class="card-img-top"
                            alt="Portada"><span>{{ $videogame_search->name }}</span></a>
                </div>
            @endforeach
        </div>

    </x-slot>
</x-layout>
