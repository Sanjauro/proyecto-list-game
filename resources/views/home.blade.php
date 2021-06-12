<x-layout>
    <x-slot name="main">
        <link rel="stylesheet" href={{ secure_asset('css/home.css') }}>
        
        @if ($errors->any())
            <div class="alert alert-danger mt-2" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-center">Lista de Juegos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Portada</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puntuación</th>
                    <th scope="col">Estado</th>
                    <th class="text-center" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cont = 0;
                $rated = 0;
                ?>
                @foreach ($listGames as $listGame)
                    <tr>
                        <th scope="row">{{ ++$cont }}</th>
                        <td class="col-lg-3 col-sm-5"> <a href="/videojuegos/{{ $listGame->videogame->name }}"><img
                                    src="{{ secure_asset('images/covers/' . $listGame->videogame->cover) }}" alt="Portada"
                                    class="cover w-50"></a></td>
                        <td>{{ $listGame->videogame->name }}</td>
                        <td>
                            <form id="changeScore{{ $listGame->videogame->id }}" action="{{ route('home.update') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="idGame" value="{{ $listGame->videogame->id }}">
                                <select name="change-score" class="form-select"
                                    onchange="changeScore({{ $listGame->videogame->id }})">
                                    <option selected>{{ $listGame->score == 0 ? '-' : $listGame->score }}</option>
                                    <option value="0">-</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </form>
                        </td>
                        <td>
                            <form id="changeStatus{{ $listGame->videogame->id }}"
                                action="{{ route('home.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="idGame" value="{{ $listGame->videogame->id }}">
                                <select name="change-status" class="form-select"
                                    onchange="changeStatus({{ $listGame->videogame->id }})">
                                    <option selected>{{ $listGame->status }}</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('home.destroy') }}" method="POST">
                                @csrf
                                <input type="hidden" name="idGame" value="{{ $listGame->videogame->id }}">
                                <input class="btn btn-danger" type="submit" onclick="return confirm('Estás a punto de borrar un videojuego de la lista, ¿estás seguro?')" value="Eliminar">
                            </form>
                            @switch (true)
                                @case(isset($listGame->score) && $listGame->score>0 && (count($ratins)==0 || $ratins[$rated]->videogame_id != $listGame->videogame_id))
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal"
                                        data-bs-target="#review{{ $listGame->videogame->id }}">Reseñar</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="review{{ $listGame->videogame->id }}" tabindex="-1"
                                        aria-labelledby="reviewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="reviewLabel">
                                                        {{ $listGame->videogame->name }}
                                                    </h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('ratin.create') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="title-review" class="form-label">Título
                                                                Reseña</label>
                                                            <input type="text" class="form-control" name="title-review"
                                                                id="title-review" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="review">Reseña</label>
                                                            <textarea class="form-control" name="text-review"
                                                                id="text-review" rows="20"></textarea>

                                                            <input type="hidden" name="idGame"
                                                                value="{{ $listGame->videogame->id }}">
                                                            <input type="hidden" name="scoreGame"
                                                                value="{{ $listGame->score }}">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Publicar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @break
                                @case(isset($listGame->score) && $listGame->score>0 && $ratins[$rated]->videogame_id == $listGame->videogame_id)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal"
                                        data-bs-target="#review{{ $listGame->videogame->id }}">Editar Reseña</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="review{{ $listGame->videogame->id }}" tabindex="-1"
                                        aria-labelledby="reviewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="reviewLabel">
                                                        {{ $listGame->videogame->name }}
                                                    </h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('ratin.update') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="title-review" class="form-label">Título
                                                                Reseña</label>
                                                            <input type="text" class="form-control" name="title-review"
                                                                id="title-review" aria-describedby="emailHelp" value="{{ $ratins[$rated]->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="review">Reseña</label>
                                                            <textarea class="form-control" name="text-review"
                                                                id="text-review" rows="20">{{ $ratins[$rated]->review }}</textarea>

                                                            <input type="hidden" name="idGame"
                                                                value="{{ $listGame->videogame->id }}">
                                                            <input type="hidden" name="scoreGame"
                                                                value="{{ $listGame->score }}">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $rated++;?>
                                @break
                                @case(!isset($listGame->score) || $listGame->score<1)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal"
                                        data-bs-target="#review{{ $listGame->videogame->id }}">Reseñar</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="review{{ $listGame->videogame->id }}" tabindex="-1"
                                        aria-labelledby="reviewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="reviewLabel">
                                                        {{ $listGame->videogame->name }}
                                                    </h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Antes debe puntuar el juego</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @break
                            @endswitch
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function changeScore(idJuego) {
                document.getElementById("changeScore" + idJuego).submit();
            }

            function changeStatus(idJuego) {
                document.getElementById("changeStatus" + idJuego).submit();
            }

        </script>
    </x-slot>
</x-layout>
