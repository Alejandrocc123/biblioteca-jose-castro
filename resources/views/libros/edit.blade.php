@extends('layouts.app')

@section('contenido')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2>Editar Libro</h2>

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" value="{{ old('titulo', $libro->titulo) }}">
            @error('titulo') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Autor</label>
            <input type="text" name="autor" value="{{ old('autor', $libro->autor) }}">
            @error('autor') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Año de publicación</label>
            <input type="number" name="anio" value="{{ old('anio', $libro->anio) }}">
            @error('anio') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Categoría</label>
            <select name="categoria_id">
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ old('categoria_id', $libro->categoria_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id') <span class="error-text">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="disponible" style="width: auto;" {{ old('disponible', $libro->disponible) ? 'checked' : '' }}>
                Disponible para préstamo
            </label>
        </div>

        <div style="display: flex; gap: 0.75rem;">
            <button type="submit" class="btn">Actualizar Libro</button>
            <a href="{{ route('libros.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
</div>
@endsection