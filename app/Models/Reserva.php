<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['usuarioid', 'bicicletaid', 'datahorainicio', 'datahorafim'];

    public function bicicleta()
    {
        return $this->belongsTo(Bicicleta::class, 'bicicletaid');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarioid');
    }
}
