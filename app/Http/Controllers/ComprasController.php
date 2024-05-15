<?php

namespace App\Http\Controllers;

use App\Models\Referencia;
use App\Models\Solicitacao;
use App\Models\UserReferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $referenciasIds = UserReferencia::where('user_id', $user->id)
            ->pluck('referencia_id');
        $solicitacoes = Solicitacao::whereIn('referencia', $referenciasIds)->get();
        $solici = [
            'aguardando_aberta' => Solicitacao::whereIn('estado', ['aguardando', 'aberta'])
                ->whereIn('referencia', $referenciasIds)
                ->count(),
            'cotacao' => Solicitacao::where('estado', 'cotacao')
                ->whereIn('referencia', $referenciasIds)
                ->count(),
            'aprovacao' => Solicitacao::where('estado', 'aprovacao')
                ->whereIn('referencia', $referenciasIds)
                ->count(),
            'concluida' => Solicitacao::where('estado', 'concluida')
                ->whereIn('referencia', $referenciasIds)
                ->count(),
        ];

        return view('dashboard-compras.menu', ['user' => $user, 'solicitacoes' => $solicitacoes, 'solici' => $solici]);
    }


    public function abrir($id)
    {
        $user = Auth::user();
        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'aguardando') {
            $solicitacao->estado = 'aberta';
            $solicitacao->recebido_nome = $user->nome;
            $solicitacao->recebido_data = now();
            $solicitacao->save();
            return redirect()->route('compras.index')->with('success', 'Solicitação atualizada para "aberta"!');
        }

        return redirect()->route('compras.index')->with('error', 'Solicitação não está em estado "aguardando"!');
    }

    public function cotacao($id)
    {

        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'aberta') {
            $solicitacao->estado = 'cotacao';
            $solicitacao->indicadorcotaçao = now();
            $solicitacao->save();
            return redirect()->route('compras.tabela')->with('success', 'Solicitação atualizada para "cotacao"!');
        }

        return redirect()->route('compras.tabela')->with('error', 'Solicitação não está em estado "aberta"!');
    }

    public function aprovacao($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'cotacao') {
            $solicitacao->estado = 'aprovacao';
            $solicitacao->indicadoraprovacao = now();
            $solicitacao->save();
            return redirect()->route('compras.tabela')->with('success', 'Solicitação atualizada para "aprovacao"!');
        }

        return redirect()->route('compras.tabela')->with('error', 'Solicitação não está em estado "aberta"!');
    }

    public function concluida($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'aprovacao') {
            $solicitacao->estado = 'concluida';
            $solicitacao->indicadorconcluido = now();
            $solicitacao->save();
            return redirect()->route('compras.tabela')->with('success', 'Solicitação atualizada para "concluida"!');
        }

        return redirect()->route('compras.tabela')->with('error', 'Solicitação não está em estado "aberta"!');
    }

    public function dados()
    {
        $user = Auth::user();
        $referenciasIds = UserReferencia::where('user_id', $user->id)
            ->pluck('referencia_id');
        $referencias = Referencia::whereIn('id', $referenciasIds)->get();
        return view('dashboard-compras.dados.dados', ['user' => $user, 'referencias' => $referencias]);
    }

    public function tabela()
    {
        $user = Auth::user();
        $referenciasIds = UserReferencia::where('user_id', $user->id)
            ->pluck('referencia_id');
        $solicitacoes = Solicitacao::whereIn('referencia', $referenciasIds)->get();
        return view('dashboard-compras.tabela.tabela', ['user' => $user, 'solicitacoes' => $solicitacoes]);
    }

    public function desc(Request $request, $id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->observacoescompras = $request->input('observacoescompras');
        $solicitacao->save();
        return redirect()->route('compras.tabela');
    }
    public function deletesoli(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'observacoes' => 'required|string|max:255',
        ]);

        $referencia = Solicitacao::findOrFail($id);
        $referencia->observacoes = $request->observacoes;
        $referencia->estado = 'cancelado';
        $referencia->recebido_nome = $user->nome;
        $referencia->recebido_data = now();
        $referencia->save();

        return redirect()->route('compras.index');
    }


}
