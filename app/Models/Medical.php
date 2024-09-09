<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Medical extends Model
{
    use HasFactory;

    protected $table = 'medical';

    protected $fillable = ['id', 'excuido'];

    protected $primaryKey = 'id';

    protected $attributes = [
        'id' => 'id',
        'excluido' => 'excluido',
    ];
}
