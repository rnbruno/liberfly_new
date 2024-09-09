<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\TypeAnimal;
use Illuminate\Support\Facades\DB;
use App\Model\User;

class AnimalUser extends Model
{
    use HasFactory;

    protected $table = 'animals_user';

    protected $fillable = ['id'];

    protected $primaryKey = 'id';

    protected $attributes = [
        'id' => 'id',
    ];


    public function typeAnimal()
    {
        return $this->belongsTo(TypeAnimal::class, 'type_animals_id');
    }

    public function marcacoes()
    {
        return $this->hasMany(Marcacoes::class, 'animals_user_id');
    }

    public function animalusers()
    {
        return $this->hasMany(User::class, 'id'); // Verifique se 'user_type_id' é o nome correto da chave estrangeira
    }

    public static function getAnimalsForUser($id)
    {
        $idAsString = (string) $id; // ou strval($id);
        $animalsUsers = DB::table('animals_user')
        ->join('type_animals', 'animals_user.type_animals_id', '=', 'type_animals.id')
        ->select('animals_user.*', 'type_animals.type_name as type_name')
        ->where('animals_user.id_int', '=', $idAsString)
        ->get();
    
    // Retorna os dados utilizando a MarcacoesResource
     return $animalsUsers;
    }
    
}
