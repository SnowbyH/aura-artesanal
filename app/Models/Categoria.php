<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre', 'descripcion', 'activo'];

    public function piezas()
    {
        return $this->hasMany(Pieza::class, 'categoria_id');
    }
}
