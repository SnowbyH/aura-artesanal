<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pieza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PiezaController extends Controller
{
    public function index()
    {
        $piezas = Pieza::with('categoria')->latest()->get();
        $categorias = Categoria::all();
        return view('admin.piezas.index', compact('piezas', 'categorias'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'codigo' => 'required|string|max:20|unique:piezas,codigo',
            'nombre' => 'required|string|max:120',
            'materiales' => 'nullable|string|max:200',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'disponibilidad' => 'required|string|max:60',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
        ]);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . preg_replace('/\s+/', '_', $archivo->getClientOriginalName());
            $destino = public_path('img/piezas');
            if (!File::exists($destino)) {
                File::makeDirectory($destino, 0755, true);
            }
            $archivo->move($destino, $nombreArchivo);
            $datos['imagen'] = 'img/piezas/' . $nombreArchivo;
        }

        Pieza::create($datos);
        return back()->with('success', 'Pieza registrada en el catálogo.');
    }

    public function update(Request $request, Pieza $pieza)
    {
        $datos = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'codigo' => 'required|string|max:20|unique:piezas,codigo,' . $pieza->id,
            'nombre' => 'required|string|max:120',
            'materiales' => 'nullable|string|max:200',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'disponibilidad' => 'required|string|max:60',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
        ]);

        if ($request->hasFile('imagen')) {
            if ($pieza->imagen && File::exists(public_path($pieza->imagen))) {
                File::delete(public_path($pieza->imagen));
            }
            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . preg_replace('/\s+/', '_', $archivo->getClientOriginalName());
            $destino = public_path('img/piezas');
            if (!File::exists($destino)) {
                File::makeDirectory($destino, 0755, true);
            }
            $archivo->move($destino, $nombreArchivo);
            $datos['imagen'] = 'img/piezas/' . $nombreArchivo;
        }

        $pieza->update($datos);
        return back()->with('success', 'Pieza actualizada.');
    }

    public function destroy(Pieza $pieza)
    {
        if ($pieza->imagen && File::exists(public_path($pieza->imagen))) {
            File::delete(public_path($pieza->imagen));
        }
        $pieza->delete();
        return back()->with('success', 'Pieza eliminada del catálogo.');
    }
}
