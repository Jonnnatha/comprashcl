<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;

    protected $table = 'referencias';

    // Desativar timestamps se não forem usados
    public $timestamps = false;

    // Definir quais colunas podem ser preenchidas
    protected $fillable = ['referencia', 'codigo'];

    public function users()
{
    return $this->belongsToMany(User::class, 'user_referencias');
}

}
