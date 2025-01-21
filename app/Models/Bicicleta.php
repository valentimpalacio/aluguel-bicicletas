<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['descricao', 'valor', 'imagem', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'bicicletaid');
    }
}
