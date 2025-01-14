<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autorId = DB::table('autors')->insertGetId([
            'nom' => Str::random(10),
            'cognoms' => Str::random(10)
        ]);

        DB::table('llibres')->insert([
            'titol'=> Str::random(10),
            'dataP'=> now(),
            'vendes'=> rand(1, 1000000000),
            'autor_id'=> $autorId
        ]);
        DB::table('llibres')->insert([
            'titol'=> Str::random(10),
            'dataP'=> now(),
            'vendes'=> rand(1, 1000000000),
            'autor_id'=> $autorId
        ]);
    
}
}