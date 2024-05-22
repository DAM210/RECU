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

        DB::table("titulaciones")->delete();
        \App\Models\Titulacion::factory(20)->create();

        DB::table("animal_cuidador")->delete();

        DB::table('cuidadores')->delete();
        \App\Models\Cuidador::factory(20)->create();

        DB::table('animales')->delete();
        $this->call(AnimalSeeder::class);

        DB::table('revisiones')->delete();
        $this->call(RevisionSeeder::class);

        DB::table("users")->delete();
        $this->call(UserSeeder::class);
        \App\Models\User::factory(5)->create();
    }
}
