<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Marcacoes extends Model
{
    use HasFactory;

    protected $table = 'marcacoes';

    protected $fillable = ['id', 'animals_use'];

    protected $primaryKey = 'id';

    protected $attributes = [
        'id' => 'id',
        'animals_user_id' => 'animals_user_id',
        'excluido' => 'excluido',
    ];
    // Definindo um escopo de consulta
    public function animalsUser()
    {
        return $this->belongsTo(AnimalUser::class, 'animals_user_id');
    }
    public static function getRecepcionistaMarcacao()
    {
        $marcacoes = DB::table('marcacoes')
        ->join('animals_user', 'marcacoes.animals_user_id', '=', 'animals_user.id')
        ->join('type_animals', 'animals_user.type_animals_id', '=', 'type_animals.id')
        ->leftJoin('medical', 'marcacoes.medical_id', '=', 'medical.id')
        ->select('marcacoes.*', 'type_animals.type_name as type_animal_name', 'medical.name as medical_name',
        DB::raw('COALESCE(marcacoes.medical_id, "0") as medical_id'),
        DB::raw('COALESCE(marcacoes.excluido, "0") as excluido'))
        ->get();
    
    // Retorna os dados utilizando a MarcacoesResource
     return $marcacoes;
    }

}
