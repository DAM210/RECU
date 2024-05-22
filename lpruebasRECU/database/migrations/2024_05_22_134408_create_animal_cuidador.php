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
        Schema::create('animal_cuidador', function (Blueprint $table) {
            $table->primary(["animal_id","cuidador_id"]);
            //$table->id();
            $table->unsignedBigInteger("animal_id");
            $table->unsignedBigInteger("cuidador_id");
            $table->foreign("animal_id")->references("id")->on("animales")->onDelete("cascade");
            $table->foreign("cuidador_id")->references("id")->on("cuidadores")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_cuidador');
    }
};
