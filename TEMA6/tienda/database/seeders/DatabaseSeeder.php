<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('familias')->delete();
        $this->call(FamiliaSeeder::class);

        DB::table('imagenes')->delete();
        $this->call(ImagenSeeder::class);
        DB::table('productos')->delete();
        $this->call(ProductoSeeder::class);

        DB::table("usuarios")->delete();
        $this->call(UserSeeder::class);


    }
}
