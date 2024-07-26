<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlmoxController extends Controller
{
    public function index()
    {
        $user = Auth::user();
       $solicitacoes = Solicitacao::whereIn('estado', ['almox'])->get();
        return view(
            'dashboard-almox.menu',['user' => $user, 'solicitacoes'=>$solicitacoes]);
    }

    public function entregue($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'almox') {
            $solicitacao->estado = 'almox2';
            $solicitacao->indicadorfinalizado = now();
            $solicitacao->save();
            return redirect()->route('almox.index')->with('success', 'Solicitação atualizada para "Entregue"!');
        }

        return redirect()->route('almox.index')->with('error', 'Solicitação não está em estado "Autorizado"!');
    }
    public function dados()
    {
        $user = Auth::user();
        return view('dashboard-almox.dados.dados', ['user' => $user]);
    }
}
