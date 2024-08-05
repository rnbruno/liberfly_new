<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\TypeAnimal;

class AnimalUser extends Model
{
    use HasFactory;

    protected $fillable = ['id'];

    public function typeAnimal()
    {
        return $this->belongsTo(TypeAnimal::class, 'type_animals_id');
    }

    public function marcacoes()
    {
        return $this->hasMany(Marcacoes::class, 'animals_user_id');
    }
}
