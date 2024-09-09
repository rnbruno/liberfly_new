<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    // Indicar os atributos que são mass assignable
    protected $fillable = [
        'empresas_id',
        'name',
        'email',
        'phone',
        'endereco_empresa',
        'user_id',
    ];

    protected $primaryKey = 'id';

    protected $attributes = [
        'id' => 'id',
        'name' => 'name',
        'email' => 'email',
    ];

    public $incrementing = true;
  

    // Caso queira esconder algum atributo da serialização
    protected $hidden = [
        'empresas_id',
    ];

    public static function getEmpresasForSocio($user_id){

        $empresasForSocios = DB::table('users')
        ->join('empresas', 'empresas.user_id', '=', 'users.id_int')
        ->join('socio_empresas as se', 'se.empresas_id', '=', 'empresas.empresas_id')
        ->join('users as u1', 'se.user_id', '=', 'u1.id_int')
        ->select(
            'se.id', 'u1.name as user_name', 'empresas.name as empresas_name',
            'u1.id_int as user_id_novo','se.empresas_id as empresa_id_novo',
            'se.user_id',
            'se.status',
            )
        ->where('users.id_int', $user_id)
        ->get();
        return $empresasForSocios;
    }

    public static function empresasLista($user_id){

        $empresasLista = DB::table('socio_empresas')
        ->join('empresas', 'empresas.empresas_id', '=', 'socio_empresas.empresas_id')
        ->select(
            'socio_empresas.id', 'empresas.name as empresas_name',
            'socio_empresas.empresas_id as empresa_id_novo',
            'socio_empresas.user_id',
            'socio_empresas.status',
            DB::raw('"" as user_name', '"" as user_id_novo'), // Adiciona uma coluna vazia chamada 'user_name'
            DB::raw('"" as user_id_novo')
            )
        ->where('socio_empresas.user_id', $user_id)
        ->get();
        return $empresasLista;
    }
}
