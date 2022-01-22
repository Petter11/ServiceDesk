<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            "titulo" => "Visual",  
        ]); 
        Categoria::create([
            "titulo" => "Sonoro",  
        ]);
        Categoria::create([
            "titulo" => "Fisico",  
        ]);
        Categoria::create([
            "titulo" => "Glitch",  
        ]);
        Categoria::create([
            "titulo" => "Financeiro",  
        ]);
    }
}
