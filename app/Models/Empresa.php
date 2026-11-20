<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = [
        'nombre_comercial', 'subtitulo', 'descripcion', 'mision', 'vision',
        'ubicacion', 'url_mapa', 'telefono', 'numero_whatsapp', 'email',
        'horario_normal', 'horario_especial', 'logotipo'
    ];
}
