<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Revision;
use Illuminate\Support\Facades\DB;

class RevisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r=new Revision();
        $r->fechaRevision="2020-5-23";
        $r->descripcion="revision anual del animal";
        $r->animal_id=DB::table("animales")->first()->id;
        $r->save();

        $r=new Revision();
        $r->fechaRevision="2019-6-6";
        $r->descripcion="revision anual del animal";
        $r->animal_id=DB::table("animales")->first()->id;
        $r->save();
    }
}
