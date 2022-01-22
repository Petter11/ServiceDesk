<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            "titulo" => "TRAVAMENTO VISUAL",
            "descricao" => "Ao tentar realizar uma tal atividade o sistema emite um sinal sonoro que so para quando reinicia",
            "classe" => "glitch",
            "status" => "A",
            "imagem" => "/home/pedro/Downloads/print_screen.png",
            "user_id" => null, 
        ]);
    }
}
