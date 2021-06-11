<x-layout>
    <x-slot name="main">
        <link rel="stylesheet" href={{ asset('css/videogame.css') }}>
        <div class="container">
            @if (session('updated'))
                <div class="alert alert-info" role="alert">¡Juego actualizado!</div>
            @endif
            <h1 class="text-center">{{ $videogame[0]->name }}</h1>

            @if (isset($purchased))
                <div class="alert alert-success" role="alert">¡Compra realizada!</div>
            @endif

            <section class="row">
                <img id="cover" src={{ asset('images/covers/' . $videogame[0]->cover) }} alt="Portada"
                    class="col-lg-3 col-sm-12">
                <div class="col-lg-9 col-sm-12 row text-center">
                    @php
                        $nota = 0;
                        $sumas = 0;
                        if (count($ratins) > 0) {
                            foreach ($ratins as $ratin) {

                                if ($ratin->score>0){
                                    $nota += $ratin->score;
                                    $sumas++;
                                }
                            }
                            $nota /= $sumas;
                        }
                    @endphp
                    <div class="col-lg-4 col-sm-6">Puntuación: {{ number_format($nota, 1) }}</div>
                    <div class="col-lg-4 col-sm-6">Lanzamiento:
                        {{ date('d-m-Y', strtotime($videogame[0]->published_at)) }}</div>

                    <div class="dropdown col-lg-4 col-sm-12" role="group">
                        <button id="platform" type="button" class="btn btn-primary dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">Seleccionar Plataforma</button>
                        <ul class="dropdown-menu" aria-labelledby="platform">
                            <form action="{{ route('videogames.purchase') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $videogame[0]->id }}" name="id">
                                <input type="hidden" value="{{ $videogame[0]->price }}" name="price">
                                <input type="hidden" value="{{ $videogame[0]->name }}" name="name">
                                <input type="hidden" value="physical" name="format">
                                <li><input type="submit" class="btn w-100 text-start" value="Físico"
                                        onclick="return confirm('Estás a punto de comprar un videojuego físico, ¿estás seguro?')">
                                </li>
                            </form>
                            <form action="{{ route('videogames.purchase') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $videogame[0]->id }}" name="id">
                                <input type="hidden" value="{{ $videogame[0]->price }}" name="price">
                                <input type="hidden" value="{{ $videogame[0]->name }}" name="name">
                                <input type="hidden" value="digital" name="format">
                                <li><input type="submit" class="btn w-100 text-start" value="Digital"
                                        onclick="return confirm('Estás a punto de comprar un videojuego digital, ¿estás seguro?')">
                                </li>
                            </form>
                        </ul>
                    </div>

                    <p id="description" class="col-12 mt-5">{{ $videogame[0]->description }}</p>
                </div>

                @if (!$listed)
                    <form action="{{ route('home.store') }}" method="POST" class="row">
                        @csrf
                        <input type="hidden" name="videogame_id" value="{{ $videogame[0]->id }}">
                        <input type="submit" class="btn btn-primary w-25" value="Añadir Juego">

                    </form>
                @else
                    <div class="row">
                        <span class="btn btn-dark w-25">Ya está añadido</span>
                    </div>
                @endif

                @can('add-game')
                    <div class="row">
                        <a class="btn btn-info w-25" href={{ route('videogames.edit', $videogame[0]->name) }}>Editar
                            Juego</a>
                    </div>
                @endcan
                <p>
                    @foreach ($videogame[0]->categories as $category)
                        <a href="{{route('videogames.search', ['category' => $category->name])}}">{{$category->name}}</a>
                    @endforeach
                </p>
            </section>

            <section class="mb-5">
                <h1 class="text-center">Opinión de los Usuarios</h1>
                <div class="card w-100">


                    @foreach ($ratins as $ratin)
                        <div class="card-body row">
                            <h5 class="card-title col-10">{{ $ratin->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted col-2">{{ $ratin->score }}</h6>
                            <p class="card-text mt-3">{{ $ratin->review }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </x-slot>
</x-layout>
