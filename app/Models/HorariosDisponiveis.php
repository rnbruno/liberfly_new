<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HorariosDisponiveis extends Model
{
    use HasFactory;

    protected $table = 'horarios_disponiveis';

    protected $fillable = ['id'];

    protected $primaryKey = 'id';

    protected $attributes = [
        'id' => 'id',
    ];

    public static function getHorarios()
    {
        $horariosdisponiveis = DB::table('horarios_disponiveis')
        ->select('horarios_disponiveis.*')
        ->where('horarios_disponiveis.disponivel', '=', '1')
        ->get();
    
    // Retorna os dados utilizando a MarcacoesResource
     return $horariosdisponiveis;
    }

    public static function atualizar($id){

        $updated = DB::table('horarios_disponiveis')
        ->where('id', $id)
        ->update([
            'disponivel' => 0,
        ]);

    return $updated;
    }

    
}
