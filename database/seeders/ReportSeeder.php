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
            "titulo" => "TRAVAMENTO SONORO",
            "descricao" => "Ao tentar realizar uma tal atividade o sistema emite um sinal sonoro que so para quando reinicia",
            "classe" => "SONORO",
            "status" => "A",
            "imagem" => "/storage/2021-07-07t134451z-9950647-rc2pfo9vq1no-rtrmadp-3-pope-surgery-suffering.jpg",
            "user_id" => null, 
        ]);
    }
}
