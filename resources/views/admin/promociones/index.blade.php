@extends('layouts.admin')
@section('titulo', 'Promociones')
@section('encabezado', 'Promociones e Información Relevante')

@section('contenido')
<div class="card">
    <h3>Nueva Promoción</h3>
    <form method="POST" action="{{ route('promociones.store') }}" class="form-grid">
        @csrf
        <div class="form-group">
            <label>Etiqueta Superior *</label>
            <input type="text" name="etiqueta" value="Promoción Vigente" required>
        </div>
        <div class="form-group">
            <label>Título de la Promoción *</label>
            <input type="text" name="titulo" placeholder="Ej. Detalle para regalar" required>
        </div>
        <div class="form-group full">
            <label>Descripción *</label>
            <textarea name="descripcion" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="activa" checked> Promoción Activa en Sitio Público</label>
        </div>
        <div class="form-group full">
            <button type="submit" class="btn btn-primary">Publicar Promoción</button>
        </div>
    </form>
</div>

<div class="card">
    <h3>Promociones Registradas</h3>
    <div class="table-responsive">
        <table>
            <thead><tr><th>Etiqueta</th><th>Título</th><th>Descripción</th><th>Estado</th><th>Acción</th></tr></thead>
            <tbody>
                @foreach($promociones as $promo)
                <tr>
                    <td><span class="badge">{{ $promo->etiqueta }}</span></td>
                    <td><strong>{{ $promo->titulo }}</strong></td>
                    <td>{{ $promo->descripcion }}</td>
                    <td>{{ $promo->activa ? 'Activa' : 'Inactiva' }}</td>
                    <td>
                        <form method="POST" action="{{ route('promociones.destroy', $promo) }}" onsubmit="return confirm('¿Eliminar promoción?')">
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
