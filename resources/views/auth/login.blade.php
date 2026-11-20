<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Aura Artesanal</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <main class="login-container">
        <section class="login-card">
            <div class="brand">
                <h1>AURA ARTESANAL</h1>
                <p>Atelier de Joyería · Administración</p>
            </div>

            <h2>Iniciar sesión</h2>
            <p class="description">Ingresa tus credenciales para gestionar el taller.</p>

            @if ($errors->any())
                <div class="error-message" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.procesar') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ingresa tu correo electrónico" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>

                <label class="remember">
                    <input type="checkbox" name="remember" value="1">
                    Mantener mi sesión iniciada
                </label>

                <button type="submit">Iniciar sesión</button>
            </form>

            <a href="{{ config('app.static_site_url', 'http://127.0.0.1:5500/app_aura/public/index.html') }}" class="btn-regresar-inicio">
                <span>← Regresar a la página principal</span>
            </a>

            <footer>Sistema de gestión · Aura Artesanal</footer>
        </section>
    </main>
</body>
</html>



