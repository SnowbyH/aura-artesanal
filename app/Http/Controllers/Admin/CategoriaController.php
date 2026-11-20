<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('piezas')->get();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:80|unique:categorias,nombre',
            'descripcion' => 'nullable|string|max:200',
        ]);
        Categoria::create($datos);
        return back()->with('success', 'Categoría creada correctamente.');
    }

    public function update(Request $request, Categoria $categoria)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:80|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable|string|max:200',
        ]);
        $categoria->update($datos);
        return back()->with('success', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with('success', 'Categoría eliminada.');
    }
}
