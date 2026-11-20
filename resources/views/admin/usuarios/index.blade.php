@extends('layouts.admin')
@section('titulo', 'Usuarios y Roles')
@section('encabezado', 'Gestión de Usuarios y Roles')

@section('contenido')
<div class="card">
    <h3>Registrar Nuevo Usuario</h3>
    <form method="POST" action="{{ route('usuarios.store') }}" class="form-grid">
        @csrf
        <div class="form-group">
            <label>Nombre Completo *</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico *</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Contraseña (mín. 6 caracteres) *</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Rol Asignado *</label>
            <select name="rol_id" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }} ({{ $rol->descripcion }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group full">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </form>
</div>

<div class="card">
    <h3>Usuarios del Sistema</h3>
    <div class="table-responsive">
        <table>
            <thead><tr><th>Nombre</th><th>Correo</th><th>Rol</th><th>Acción</th></tr></thead>
            <tbody>
                @foreach($usuarios as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td><span class="badge">{{ $u->roles->pluck('nombre')->join(', ') }}</span></td>
                    <td>
                        @if($u->id !== auth()->id())
                        <form method="POST" action="{{ route('usuarios.destroy', $u) }}" onsubmit="return confirm('¿Eliminar usuario?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        @else
                            <small style="color:#6B7280">Sesión actual</small>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
