<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    protected $table = 'piezas';
    protected $fillable = [
        'categoria_id', 'codigo', 'nombre', 'materiales',
        'descripcion', 'precio', 'disponibilidad', 'imagen', 'activo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
