<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Libro;

class BibliotecaSeeder extends Seeder
{
    public function run(): void
    {
        $prog = Categoria::create(['nombre' => 'Desarrollo Web y Backend']);
        $arq = Categoria::create(['nombre' => 'Arquitectura de Software']);
        $games = Categoria::create(['nombre' => 'Diseño de Videojuegos']);
        $db = Categoria::create(['nombre' => 'Bases de Datos']);
        $scifi = Categoria::create(['nombre' => 'Ciencia Ficción Cyberpunk']);

        Libro::create(['titulo' => 'Clean Code', 'autor' => 'Robert C. Martin', 'anio' => 2008, 'categoria_id' => $arq->id, 'disponible' => true]);
        Libro::create(['titulo' => 'Laravel: Up & Running', 'autor' => 'Matt Stauffer', 'anio' => 2023, 'categoria_id' => $prog->id, 'disponible' => true]);
        Libro::create(['titulo' => 'The Pragmatic Programmer', 'autor' => 'Andrew Hunt', 'anio' => 1999, 'categoria_id' => $arq->id, 'disponible' => false]);
        Libro::create(['titulo' => 'Designing Data-Intensive Applications', 'autor' => 'Martin Kleppmann', 'anio' => 2017, 'categoria_id' => $db->id, 'disponible' => true]);
        Libro::create(['titulo' => 'The Art of Game Design', 'autor' => 'Jesse Schell', 'anio' => 2008, 'categoria_id' => $games->id, 'disponible' => true]);
        Libro::create(['titulo' => 'Neuromante', 'autor' => 'William Gibson', 'anio' => 1984, 'categoria_id' => $scifi->id, 'disponible' => true]);
        Libro::create(['titulo' => 'Eloquent JavaScript', 'autor' => 'Marijn Haverbeke', 'anio' => 2018, 'categoria_id' => $prog->id, 'disponible' => true]);
        Libro::create(['titulo' => 'SQL Performance Explained', 'autor' => 'Markus Winand', 'anio' => 2012, 'categoria_id' => $db->id, 'disponible' => false]);
        Libro::create(['titulo' => 'Game Programming Patterns', 'autor' => 'Robert Nystrom', 'anio' => 2014, 'categoria_id' => $games->id, 'disponible' => true]);
        Libro::create(['titulo' => 'Snow Crash', 'autor' => 'Neal Stephenson', 'anio' => 1992, 'categoria_id' => $scifi->id, 'disponible' => true]);
    }
}