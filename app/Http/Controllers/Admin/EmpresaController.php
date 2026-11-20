<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function edit()
    {
        $empresa = Empresa::firstOrCreate([], [
            'nombre_comercial' => 'Aura Artesanal',
            'ubicacion' => 'Guadalajara, Jalisco',
            'numero_whatsapp' => '520000000000',
            'email' => 'contacto@auraartesanal.com',
            'horario_normal' => 'Lunes a Viernes: 10:00 - 19:00 hrs',
        ]);
        return view('admin.empresa.edit', compact('empresa'));
    }

    public function update(Request $request)
    {
        $datos = $request->validate([
            'nombre_comercial' => 'required|string|max:100',
            'subtitulo' => 'nullable|string|max:150',
            'descripcion' => 'nullable|string',
            'mision' => 'nullable|string',
            'vision' => 'nullable|string',
            'ubicacion' => 'required|string|max:255',
            'url_mapa' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:25',
            'numero_whatsapp' => 'required|string|max:25',
            'email' => 'required|email|max:100',
            'horario_normal' => 'required|string|max:255',
            'horario_especial' => 'nullable|string|max:255',
        ]);

        $empresa = Empresa::first();
        $empresa->update($datos);

        return back()->with('success', 'Información del atelier actualizada correctamente.');
    }
}
