<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BicicletaController extends Controller
{
    public function index()
    {
        $bicicletas = Bicicleta::with('usuario')->get();
        return view('bicicletas.index', compact('bicicletas'));
    }

    public function create()
    {
        return view('bicicletas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'imagem' => 'required|image|max:2048',
        ]);

        $path = $request->file('imagem')->store('bicicletas', 'public');

        Bicicleta::create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'imagem' => $path,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('bicicletas.index')->with('success', 'Bicicleta cadastrada com sucesso.');
    }

    public function edit($id)
{
    // Tentar buscar a bicicleta pelo ID
    $bicicleta = Bicicleta::find($id);

    // Se a bicicleta não for encontrada, redirecionar para a página de edição com uma mensagem
    if (!$bicicleta) {
        return view('bicicletas.edit')->with('message', 'Nenhuma bicicleta cadastrada.');
    }

    // Se a bicicleta for encontrada, passar para a view
    return view('bicicletas.edit', compact('bicicleta'));
}


    public function update(Request $request, $id)
    {
        $bicicleta = Bicicleta::findOrFail($id);

        if ($bicicleta->user_id != Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar esta bicicleta.');
        }

        $bicicleta->update($request->all());

        return redirect()->route('bicicletas.index')->with('success', 'Bicicleta atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $bicicleta = Bicicleta::findOrFail($id);

        if ($bicicleta->user_id != Auth::id()) {
            abort(403, 'Você não tem permissão para excluir esta bicicleta.');
        }

        $bicicleta->delete();

        return redirect()->route('bicicletas.index')->with('success', 'Bicicleta excluída com sucesso.');
    }
}