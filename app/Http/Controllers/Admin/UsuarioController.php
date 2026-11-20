<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::with('roles')->get();
        $roles = Rol::all();
        return view('admin.usuarios.index', compact('usuarios', 'roles'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'rol_id' => 'required|exists:rol,id',
        ]);

        $user = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);
        $user->roles()->attach($datos['rol_id']);

        return back()->with('success', 'Usuario creado con rol asignado.');
    }

    public function destroy(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return back()->with('error', 'No puedes eliminar tu propio usuario activo.');
        }
        $usuario->delete();
        return back()->with('success', 'Usuario eliminado.');
    }
}
