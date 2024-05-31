<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string("slug")->unique();
            $table->double('precio');
            $table->longText('descripcion')->nullable();
            $table->unsignedBigInteger("familia_id");
            $table->unsignedBigInteger("imagen_id")->nullable();
            $table->timestamps();
            $table->foreign("familia_id")->references("id")->on("familias")->onDelete("cascade");
            $table->foreign("imagen_id")->references("id")->on("imagenes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
