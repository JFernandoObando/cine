@extends('menu')
@section('content')

<div class="container w-25 borde p-4">
<form action="{{route('pelicula-update',['id'=>$pelicula->id])}}" method="POST">
    @method('PATCH')
    @csrf <!-- Agrega el token CSRF -->
    <div class="form-group">
        <label for="nombre">Nombre de la Película:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$pelicula->nombre}}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar Película</button>
</form>
</div>
@endsection