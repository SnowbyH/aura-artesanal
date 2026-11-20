<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use App\Models\Empresa;
use App\Models\Categoria;
use App\Models\Pieza;
use App\Models\Promocion;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Roles solicitados en PI-3.8
        $rolAdmin = Rol::create(['nombre' => 'Administrador', 'descripcion' => 'Acceso total al sistema']);
        $rolEditor = Rol::create(['nombre' => 'Editor', 'descripcion' => 'Gestión de catálogo y promociones']);
        $rolCliente = Rol::create(['nombre' => 'Cliente', 'descripcion' => 'Usuario cliente']);

        // Usuario Administrador por defecto
        $admin = User::create([
            'name' => 'Administrador Aura',
            'email' => 'admin@auraartesanal.com',
            'password' => Hash::make('Admin12345'),
        ]);
        $admin->roles()->attach($rolAdmin->id);

        // Usuario Editor de prueba
        $editor = User::create([
            'name' => 'Editor Taller',
            'email' => 'editor@auraartesanal.com',
            'password' => Hash::make('Editor12345'),
        ]);
        $editor->roles()->attach($rolEditor->id);

        // Datos de Empresa
        Empresa::create([
            'nombre_comercial' => 'Aura Artesanal',
            'subtitulo' => 'Atelier de Joyería · Plata y Cristales',
            'descripcion' => 'Aura Artesanal nace del gusto por crear piezas pequeñas con gran detalle. Cada diseño parte de una idea, se teje a mano con paciencia y se cuida hasta su último detalle para que sea tan único como quien lo lleva.',
            'mision' => 'Crear joyería artesanal única que permita a cada persona complementar y expresar su personalidad a través de piezas llenas de color, creatividad y significado.',
            'vision' => 'Ser una marca reconocida por sus piezas hechas a mano, con diseños originales que inspiran a experimentar con el estilo propio y a celebrar lo que nos hace únicos.',
            'ubicacion' => 'Calle de los Plateros #142, Col. Americana, Guadalajara, Jalisco, México',
            'url_mapa' => 'https://maps.google.com',
            'telefono' => '+52 33 0000 0000',
            'numero_whatsapp' => '522383033981',
            'email' => 'contacto@auraartesanal.com',
            'horario_normal' => 'Lunes a Viernes: 10:00 - 19:00 hrs',
            'horario_especial' => 'Sábados: 10:00 - 14:00 hrs',
        ]);

        // Categorías
        $catAnillos = Categoria::create(['nombre' => 'Anillos', 'descripcion' => 'Anillos tejidos a mano']);
        $catCollares = Categoria::create(['nombre' => 'Collares', 'descripcion' => 'Collares y gargantillas artesanales']);
        $catAretes = Categoria::create(['nombre' => 'Aretes', 'descripcion' => 'Aretes con cristales y mostacillas']);
        $catPulseras = Categoria::create(['nombre' => 'Pulseras', 'descripcion' => 'Pulseras personalizadas']);
        $catLlaveros = Categoria::create(['nombre' => 'Llaveros', 'descripcion' => 'Llaveros religiosos y personalizados']);

        // Piezas iniciales
        Pieza::create([
            'categoria_id' => $catPulseras->id,
            'codigo' => 'PZ-16',
            'nombre' => 'Pulsera de Estilo Gótico Suave / Cósmico Oscuro',
            'materiales' => 'Dos hileras con cuentas negras, cuentas ámbar, dije de mariposa transparente y estrella plateada',
            'descripcion' => 'Pulsera de dos hileras que combina cuentas negras con cuentas ámbar para lograr un look gótico suave.',
            'precio' => 105.00,
            'disponibilidad' => 'Disponible en Taller',
        ]);

        Pieza::create([
            'categoria_id' => $catLlaveros->id,
            'codigo' => 'PZ-17',
            'nombre' => 'Llaveros Religiosos y Personalizados (Par)',
            'materiales' => 'Aros metálicos, letras personalizadas, medalla religiosa, flores de cristal verde y dorado',
            'descripcion' => 'Par de llaveros con aros metálicos personalizables con nombre y detalles en cristal.',
            'precio' => 80.00,
            'disponibilidad' => 'Bajo Pedido (5-10 días)',
        ]);

        // Promoción inicial
        Promocion::create([
            'etiqueta' => 'Promoción Vigente',
            'titulo' => 'Detalle para regalar',
            'descripcion' => 'En la compra de 2 o más piezas, recibe empaque regalo incluido. Las piezas personalizadas son ideales para fechas especiales.',
            'activa' => true,
        ]);
    }
}
