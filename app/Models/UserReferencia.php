<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReferencia extends Model
{
    protected $table = 'user_referencias'; // Definir o nome da tabela, se não for o padrão

    // Atributos que são atribuíveis em massa
    protected $fillable = [
        'user_id',
        'referencia_id',
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacionamento com o modelo Referencia
    public function referencia()
    {
        return $this->belongsTo(Referencia::class, 'referencia_id');
    }
}
