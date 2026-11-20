<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('promociones', function (Blueprint $table) {
            $table->id();
            $table->string('etiqueta', 60)->default('Promoción');
            $table->string('titulo', 120);
            $table->text('descripcion');
            $table->boolean('activa')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('promociones'); }
};
