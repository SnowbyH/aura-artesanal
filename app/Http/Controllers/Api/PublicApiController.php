<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Pieza;
use App\Models\Promocion;
use Illuminate\Http\JsonResponse;

class PublicApiController extends Controller
{
    public function empresa(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Empresa::first()
        ]);
    }

    public function piezas(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'categorias' => Categoria::where('activo', true)->get(),
            'data' => Pieza::with('categoria')->where('activo', true)->get()
        ]);
    }

    public function promociones(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Promocion::where('activa', true)->get()
        ]);
    }
}
