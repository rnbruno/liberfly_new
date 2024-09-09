<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class SocioEmpresa extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'socio_empresas';

    protected $fillable = [
        'id',
        'empresas_id',
        'user_id',
        'status',
    ];

    protected $hidden = [
        'id',
    ];

   
}
