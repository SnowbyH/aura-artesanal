<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_comercial', 100);
            $table->string('subtitulo', 150)->nullable();
            $table->text('descripcion')->nullable();
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->string('ubicacion', 255);
            $table->string('url_mapa', 255)->nullable();
            $table->string('telefono', 25)->nullable();
            $table->string('numero_whatsapp', 25);
            $table->string('email', 100);
            $table->string('horario_normal', 255);
            $table->string('horario_especial', 255)->nullable();
            $table->string('logotipo', 255)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('empresa'); }
};
