<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cartao extends Model
{
    use HasFactory;

    protected $table = 'cartao';

    // Se a tabela não usa as colunas timestamps (created_at e updated_at)
    public $timestamps = false;

    protected $fillable=['cartao_id','numero'];

    protected $primaryKey = 'cartao_id';

    protected $attributes = [
        'cartao_id' => 'cartao_id',
        'tipo_cartao_id' => 'tipo_cartao_id',
        'codigo_barra' => 'codigo_barra',
        'numero' => 'numero',
        'creditos' => 'creditos',
        'inativo' => 'inativo',
        'tipo_leitura_id' => 'tipo_leitura_id',
    ];

    public static function getCartaoTipoCartaoProduto()
    {
        return DB::table('cartao')
            ->join('tipocartao', 'cartao.tipo_cartao_id', '=', 'tipocartao.tipo_cartao_id')
            ->join('produto', 'tipocartao.produto_id', '=', 'produto.produto_id')
            ->select(
                'produto.produto as produto', 
                'cartao.*',
                'produto.preco as preco',
            )
            ->get();

        
    }
}
