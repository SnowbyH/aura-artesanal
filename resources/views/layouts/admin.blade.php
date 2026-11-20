<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Panel') | Aura Artesanal</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <aside class="sidebar">
        <div>
            <div class="sidebar-brand">
                <h2>AURA ARTESANAL</h2>
                <span>Panel Administrativo</span>
            </div>
            <nav class="nav-links">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Inicio / Dashboard</a>

                @if(auth()->user()->tieneRol(['Administrador', 'Editor']))
                    <a href="{{ route('piezas.index') }}" class="{{ request()->routeIs('piezas.*') ? 'active' : '' }}">Piezas Artesanales</a>
                    <a href="{{ route('categorias.index') }}" class="{{ request()->routeIs('categorias.*') ? 'active' : '' }}">Categorías</a>
                    <a href="{{ route('promociones.index') }}" class="{{ request()->routeIs('promociones.*') ? 'active' : '' }}">Promociones</a>
                @endif

                @if(auth()->user()->tieneRol('Administrador'))
                    <a href="{{ route('empresa.edit') }}" class="{{ request()->routeIs('empresa.*') ? 'active' : '' }}">Datos del Atelier</a>
                    <a href="{{ route('usuarios.index') }}" class="{{ request()->routeIs('usuarios.*') ? 'active' : '' }}">Usuarios y Roles</a>
                @endif
            </nav>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">Cerrar sesión</button>
        </form>
    </aside>

    <div class="main-wrapper">
        <header class="topbar">
            <h1>@yield('encabezado', 'Panel de Control')</h1>
            <div class="user-badge">
                {{ auth()->user()->name }} · <strong>{{ auth()->user()->roles->pluck('nombre')->join(', ') ?: 'Sin rol' }}</strong>
            </div>
        </header>

        <main class="content">
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert-error">
                    @foreach($errors->all() as $err)
                        <div>• {{ $err }}</div>
                    @endforeach
                </div>
            @endif

            @yield('contenido')
        </main>

        <footer class="admin-footer">
            Atelier Aura Artesanal · Sistema de Gestión Administrativa
        </footer>
    </div>
</body>
</html>
