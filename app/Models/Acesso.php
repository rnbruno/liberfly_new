<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Acesso extends Model
{
    use HasFactory;

    protected $table = 'acesso';

    // Se a tabela não usa as colunas timestamps (created_at e updated_at)
    public $timestamps = false;

    protected $fillable=['acesso_id','cartao_id'];

    protected $primaryKey = 'acesso_id';

    protected $attributes = [
        'acesso_id' => 'acesso_id',
        'venda_produto_id' => 'venda_produto_id',
        'cartao_id' => 'cartao_id',
        'pessoa_id' => 'pessoa_id',
        'tipo_acesso' => 'tipo_acesso',
        'data_acesso' => 'data_acesso',
    ];

    public static function getAcessoPessoa12Meses()
    {
    // dd("aqui");
       $query = DB::table('acesso')
            ->join('pessoa', 'acesso.pessoa_id', '=', 'pessoa.pessoa_id')
            ->join('cartao', 'acesso.cartao_id', '=', 'cartao.cartao_id')
            ->select(
                'cartao.numero as numero', 
                'cartao.codigo_barra as codigo_barra', 
                'acesso.*',
                'pessoa.nome as nome',
            )
            ->whereBetween('acesso.data_acesso', [Carbon::now()->subMonths(12), Carbon::now()])
            ->get();
        // dd("aqui");

        return $query;
                
    }
}
