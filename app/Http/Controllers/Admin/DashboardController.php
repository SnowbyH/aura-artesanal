<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pieza;
use App\Models\Promocion;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPiezas' => Pieza::count(),
            'totalCategorias' => Categoria::count(),
            'totalPromociones' => Promocion::where('activa', true)->count(),
            'totalUsuarios' => User::count(),
        ]);
    }
}
