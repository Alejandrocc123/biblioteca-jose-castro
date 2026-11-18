<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'anio',
        'categoria_id',
        'disponible',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function scopeFiltrar($query, $categoriaId, $busqueda)
    {
        if ($categoriaId) {
            $query->where('categoria_id', $categoriaId);
        }

        if ($busqueda) {
            $query->where('titulo', 'like', '%' . $busqueda . '%');
        }

        return $query;
    }
}