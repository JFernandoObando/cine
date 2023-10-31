@extends('menu')
@section('content')

<div class="container w-25 borde p-4">
    <form action="/pelicula" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la Película:</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                @foreach ($categoria as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Película</button>

    </form>
    <div class="form-group">
        <label for="pelicula_existente">Película Existente:</label>

        @foreach ($pelicula as $pelicula)
        <div>
            <a href="{{ route('pelicula-edit', ['id' => $pelicula->id]) }}">{{ $pelicula->nombre }}</a>
        </div>
        <div>
            <form action="{{ route('pelicula-destroy', ['id' => $pelicula->id]) }}" method="POST">
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection