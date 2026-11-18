@extends('layouts.app')

@section('contenido')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h2>Catálogo de Libros</h2>
    <a href="{{ route('libros.create') }}" class="btn">+ Nuevo Libro</a>
</div>

<div class="card">
    <form action="{{ route('libros.index') }}" method="GET" class="filters">
        <div>
            <label>Buscar por título</label>
            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Ej. Clean Code...">
        </div>
        <div>
            <label>Filtrar por categoría</label>
            <select name="categoria_id">
                <option value="">Todas las categorías</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn">Filtrar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-outline">Limpiar</a>
    </form>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($libros as $libro)
                <tr>
                    <td><strong>{{ $libro->titulo }}</strong></td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio }}</td>
                    <td>{{ $libro->categoria->nombre }}</td>
                    <td>
                        @if($libro->disponible)
                            <span class="badge badge-yes">Disponible</span>
                        @else
                            <span class="badge badge-no">Prestado</span>
                        @endif
                    </td>
                    <td style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-outline">Editar</a>
                        <form action="{{ route('libros.destroy', $libro) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este libro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No se encontraron libros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $libros->links() }}
    </div>
</div>
@endsection