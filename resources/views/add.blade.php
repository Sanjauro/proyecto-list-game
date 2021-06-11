<x-layout>
    <x-slot name="main">
        @if (session('added'))
            <div class="alert alert-info" role="alert">¡Juego añadido!</div>
        @endif

        @if (session('deleted'))
            <div class="alert alert-danger" role="alert">¡Juego eliminado!</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-2" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($videogame))
            <?php $routeName = 'videogames.update'; ?>
        @else
            <?php $routeName = 'videogames.store'; ?>
        @endif
        <form action="{{ route($routeName) }}" method="POST" class="container">
            @csrf
            <div class="my-3">
                <label for="name" class="form-label">Nombre del Juego</label>
                <input type="text" class="form-control" name="name" id="name"
                    {{ isset($videogame) ? 'readonly' : '' }} required placeholder="Nombre del juego"
                    value="{{ isset($videogame[0]->name) ? $videogame[0]->name : '' }}">
            </div>
            <div class="my-3">
                <label for="cover" class="form-label">Portada</label>
                <input type="text" class="form-control" name="cover" id="cover" placeholder="Nombre_Del_Juego.png"
                    value="{{ isset($videogame[0]->cover) ? $videogame[0]->cover : '' }}">
            </div>
            <div class="my-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" class="form-control" name="price" id="price" step="0.01" min="0"
                    placeholder="59,99" value="{{ isset($videogame[0]->price) ? $videogame[0]->price : '' }}">
            </div>
            <div class="my-3">
                <label for="date" class="form-label">Fecha de salida</label>
                <input type="date" class="form-control" name="date" id="date"
                    value="{{ isset($videogame[0]->published_at) ? $videogame[0]->published_at : '' }}">
            </div>
            <div class="my-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="w-100" rows="10"
                    placeholder="Introduzca una descripción para el juego." required>{{ isset($videogame[0]->description) ? $videogame[0]->description : '' }}</textarea>
            </div>

            <div class="my-3">
                <label for="categories" class="form-label">Categorías</label>
                <select class="form-select" name="categories[]" size="5" multiple="multiple">
                    <?php $cont = 0;?>

                    @foreach ($categories as $category)
                    @if (count($videogameCategories)>$cont && $category->id == $videogameCategories[$cont]->category_id)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                        {{$cont++}}
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="text-end m-3">
                @if (isset($videogame))
                    <button type="submit" name="delete" value="delete" class="btn col-1 btn-danger">Eliminar</button>
                    <button type="submit" class="btn col-1 btn-primary">Actualizar</button>
                @else
                    <button type="submit" class="btn col-1 btn-primary">Añadir</button>
                @endif
            </div>
        </form>
    </x-slot>
</x-layout>
