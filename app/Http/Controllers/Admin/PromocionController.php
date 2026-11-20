<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        $promociones = Promocion::latest()->get();
        return view('admin.promociones.index', compact('promociones'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'etiqueta' => 'required|string|max:60',
            'titulo' => 'required|string|max:120',
            'descripcion' => 'required|string',
        ]);
        $datos['activa'] = $request->has('activa');
        Promocion::create($datos);
        return back()->with('success', 'Promoción agregada.');
    }

    public function update(Request $request, Promocion $promocion)
    {
        $datos = $request->validate([
            'etiqueta' => 'required|string|max:60',
            'titulo' => 'required|string|max:120',
            'descripcion' => 'required|string',
        ]);
        $datos['activa'] = $request->has('activa');
        $promocion->update($datos);
        return back()->with('success', 'Promoción actualizada.');
    }

    public function destroy(Promocion $promocion)
    {
        $promocion->delete();
        return back()->with('success', 'Promoción eliminada.');
    }
}
