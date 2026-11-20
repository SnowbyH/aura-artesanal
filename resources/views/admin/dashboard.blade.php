@extends('layouts.admin')
@section('titulo', 'Dashboard')
@section('encabezado', 'Resumen General del Atelier')

@section('contenido')
<div class="stats-grid">
    <div class="stat-card"><p>Piezas en Catálogo</p><h4>{{ $totalPiezas }}</h4></div>
    <div class="stat-card"><p>Categorías Activas</p><h4>{{ $totalCategorias }}</h4></div>
    <div class="stat-card"><p>Promociones Vigentes</p><h4>{{ $totalPromociones }}</h4></div>
    <div class="stat-card"><p>Usuarios Registrados</p><h4>{{ $totalUsuarios }}</h4></div>
</div>

<div class="card">
    <h3>Accesos Rápidos</h3>
    <p style="font-size: 14px; color: #4B5563; margin-bottom: 16px;">
        Bienvenido, <strong>{{ auth()->user()->name }}</strong>. Desde este panel puedes administrar el catálogo de joyería, promociones vigentes y la información pública de Aura Artesanal.
    </p>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        @if(auth()->user()->tieneRol(['Administrador', 'Editor']))
            <a href="{{ route('piezas.index') }}" class="btn btn-primary">Gestionar Piezas</a>
            <a href="{{ route('categorias.index') }}" class="btn btn-gold">Gestionar Categorías</a>
            <a href="{{ route('promociones.index') }}" class="btn btn-primary">Gestionar Promociones</a>
        @endif
        @if(auth()->user()->tieneRol('Administrador'))
            <a href="{{ route('empresa.edit') }}" class="btn btn-gold">Editar Datos del Atelier</a>
        @endif
    </div>
</div>
@endsection
