@extends('layouts.admin')
@section('titulo', 'Datos del Atelier')
@section('encabezado', 'Configuración General de Aura Artesanal')

@section('contenido')
<div class="card">
    <h3>Información Pública del Atelier (Conectada vía API)</h3>
    <form method="POST" action="{{ route('empresa.update') }}" class="form-grid">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre Comercial *</label>
            <input type="text" name="nombre_comercial" value="{{ old('nombre_comercial', $empresa->nombre_comercial) }}" required>
        </div>
        <div class="form-group">
            <label>Subtítulo / Eslogan</label>
            <input type="text" name="subtitulo" value="{{ old('subtitulo', $empresa->subtitulo) }}">
        </div>
        <div class="form-group">
            <label>Teléfono *</label>
            <input type="text" name="telefono" value="{{ old('telefono', $empresa->telefono) }}">
        </div>
        <div class="form-group">
            <label>WhatsApp (con código país, ej. 522383033981) *</label>
            <input type="text" name="numero_whatsapp" value="{{ old('numero_whatsapp', $empresa->numero_whatsapp) }}" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico *</label>
            <input type="email" name="email" value="{{ old('email', $empresa->email) }}" required>
        </div>
        <div class="form-group">
            <label>Enlace Google Maps</label>
            <input type="text" name="url_mapa" value="{{ old('url_mapa', $empresa->url_mapa) }}">
        </div>
        <div class="form-group full">
            <label>Ubicación / Dirección *</label>
            <input type="text" name="ubicacion" value="{{ old('ubicacion', $empresa->ubicacion) }}" required>
        </div>
        <div class="form-group">
            <label>Horario Normal *</label>
            <input type="text" name="horario_normal" value="{{ old('horario_normal', $empresa->horario_normal) }}" required>
        </div>
        <div class="form-group">
            <label>Horario Especial (Fines de semana)</label>
            <input type="text" name="horario_especial" value="{{ old('horario_especial', $empresa->horario_especial) }}">
        </div>
        <div class="form-group full">
            <label>Descripción / Nuestra Esencia</label>
            <textarea name="descripcion" rows="3">{{ old('descripcion', $empresa->descripcion) }}</textarea>
        </div>
        <div class="form-group">
            <label>Misión</label>
            <textarea name="mision" rows="3">{{ old('mision', $empresa->mision) }}</textarea>
        </div>
        <div class="form-group">
            <label>Visión</label>
            <textarea name="vision" rows="3">{{ old('vision', $empresa->vision) }}</textarea>
        </div>
        <div class="form-group full">
            <button type="submit" class="btn btn-primary">Guardar Cambios del Atelier</button>
        </div>
    </form>
</div>
@endsection
