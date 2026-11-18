<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $libros = Libro::with('categoria')
            ->filtrar($request->categoria_id, $request->buscar)
            ->latest()
            ->simplePaginate(6)
            ->withQueryString();

        return view('libros.index', compact('libros', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $anioActual = date('Y');

        $datos = $request->validate([
            'titulo' => 'required|min:3|max:255',
            'autor' => 'required|min:3|max:255',
            'anio' => "required|integer|min:1500|max:$anioActual",
            'categoria_id' => 'required|exists:categorias,id',
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.min' => 'El título debe tener al menos 3 caracteres.',
            'autor.required' => 'El autor es obligatorio.',
            'anio.required' => 'El año es obligatorio.',
            'anio.min' => 'El año no puede ser menor a 1500.',
            'anio.max' => "El año no puede ser mayor a $anioActual.",
            'categoria_id.required' => 'Debes seleccionar una categoría.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
        ]);

        $datos['disponible'] = $request->has('disponible');

        Libro::create($datos);

        return redirect()->route('libros.index')->with('ok', 'Libro registrado correctamente.');
    }

    public function edit(Libro $libro)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $anioActual = date('Y');

        $datos = $request->validate([
            'titulo' => 'required|min:3|max:255',
            'autor' => 'required|min:3|max:255',
            'anio' => "required|integer|min:1500|max:$anioActual",
            'categoria_id' => 'required|exists:categorias,id',
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.min' => 'El título debe tener al menos 3 caracteres.',
            'autor.required' => 'El autor es obligatorio.',
            'anio.required' => 'El año es obligatorio.',
            'anio.min' => 'El año mínimo es 1500.',
            'anio.max' => "El año máximo es $anioActual.",
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
        ]);

        $datos['disponible'] = $request->has('disponible');

        $libro->update($datos);

        return redirect()->route('libros.index')->with('ok', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('ok', 'Libro eliminado de la biblioteca.');
    }
}