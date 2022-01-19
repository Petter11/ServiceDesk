<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;


    const STATUS_AGUARDANDO = "A";
    const STATUS_CORRECAO = "E";
    const STATUS_CORRIGIDO = "C";
    const STATUS = [
        Report::STATUS_AGUARDANDO => "Aguardando",
        Report::STATUS_CORRECAO => "Em correcao",
        Report::STATUS_CORRIGIDO => "Corrigido"
    ];

    protected $table = 'reports';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at'];
    

    public function getStatusFormatadoAttribute()
    {
        return Report::STATUS[$this->status];
    }
}