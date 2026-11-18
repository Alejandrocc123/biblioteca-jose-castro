<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('libros')->orderBy('nombre')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|min:3|max:100|unique:categorias,nombre',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.min' => 'Debe tener al menos 3 caracteres.',
            'nombre.unique' => 'Esa categoría ya existe.',
        ]);

        Categoria::create($datos);

        return redirect()->route('categorias.index')->with('ok', 'Categoría creada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->tieneLibros()) {
            return redirect()->route('categorias.index')->with('error', 'No se puede eliminar: la categoría tiene libros asociados.');
        }

        $categoria->delete();
        return redirect()->route('categorias.index')->with('ok', 'Categoría eliminada.');
    }
}