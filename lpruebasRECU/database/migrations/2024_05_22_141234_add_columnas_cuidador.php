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
        Schema::table('cuidadores', function (Blueprint $table) {
            $table->unsignedBigInteger("id_titulacion1")->nullable();
            $table->unsignedBigInteger("id_titulacion2")->nullable();
            $table->foreign("id_titulacion1")->references("id")->on("titulaciones")->onDelete("cascade");
            $table->foreign("id_titulacion2")->references("id")->on("titulaciones")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cuidadores', function (Blueprint $table) {
            $table->dropColumn("id_titulacion1");
            $table->dropColumn("id_titulacion2");
        });
    }
};
