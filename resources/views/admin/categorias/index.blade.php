@extends('layouts.admin')
@section('titulo', 'Categorías')
@section('encabezado', 'Categorías de Joyería')

@section('contenido')
<div class="card">
    <h3>Nueva Categoría</h3>
    <form method="POST" action="{{ route('categorias.store') }}" class="form-grid">
        @csrf
        <div class="form-group">
            <label>Nombre (ej. Anillos, Collares) *</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Descripción breve</label>
            <input type="text" name="descripcion">
        </div>
        <div class="form-group" style="justify-content: flex-end;">
            <button type="submit" class="btn btn-primary">Agregar Categoría</button>
        </div>
    </form>
</div>

<div class="card">
    <h3>Categorías Registradas</h3>
    <div class="table-responsive">
        <table>
            <thead><tr><th>Nombre</th><th>Descripción</th><th>Piezas</th><th>Acciones</th></tr></thead>
            <tbody>
                @foreach($categorias as $cat)
                <tr>
                    <td>
                        <form method="POST" action="{{ route('categorias.update', $cat) }}" style="display:flex; gap:6px;">
                            @csrf @method('PUT')
                            <input type="text" name="nombre" value="{{ $cat->nombre }}" required>
                            <input type="text" name="descripcion" value="{{ $cat->descripcion }}">
                            <button type="submit" class="btn btn-gold">Guardar</button>
                        </form>
                    </td>
                    <td>{{ $cat->descripcion }}</td>
                    <td><span class="badge">{{ $cat->piezas_count }} piezas</span></td>
                    <td>
                        <form method="POST" action="{{ route('categorias.destroy', $cat) }}" onsubmit="return confirm('¿Eliminar categoría?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
