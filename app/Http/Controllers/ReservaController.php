<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Bicicleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function reservar(Request $request, $bicicletaId)
    {
        $bicicleta = Bicicleta::findOrFail($bicicletaId);

        $reserva = Reserva::create([
            'usuarioid' => Auth::id(),
            'bicicletaid' => $bicicleta->id,
            'datahorainicio' => now(),
            'datahorafim' => null,
        ]);

        return redirect()->route('bicicletas.index')
            ->with('success', "Reserva realizada! Entre em contato com {$bicicleta->usuario->email}.");
    }

    public function finalizarReserva($id)
    {
        $reserva = Reserva::findOrFail($id);

        if ($reserva->usuarioid != Auth::id()) {
            abort(403, 'Você não tem permissão para finalizar esta reserva.');
        }

        $reserva->update(['datahorafim' => now()]);

        return redirect()->route('bicicletas.index')->with('success', 'Reserva finalizada com sucesso.');
    }
}