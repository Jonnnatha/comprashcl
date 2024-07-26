<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SolicitanteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $setores = DB::table('setores')->get();
        $refer = DB::table('referencias')->get();
        $solicitacoes = [
            'aguardando_aberta' => DB::table('solicitacoes')
                ->whereIn('estado', ['aguardando', 'aberta'])
                ->where('solicitante', $user->nome)
                ->count(),
            'cotacao' => DB::table('solicitacoes')
                ->where('estado', 'cotacao')
                ->where('solicitante', $user->nome)
                ->count(),
            'aprovacao' => DB::table('solicitacoes')
                ->where('estado', 'aprovacao')
                ->where('solicitante', $user->nome)
                ->count(),
            'concluida' => DB::table('solicitacoes')
                ->where('estado', 'concluida')
                ->where('solicitante', $user->nome)
                ->count(),
            'almox' => DB::table('solicitacoes')
                ->where('estado', 'almox')
                ->where('solicitante', $user->nome)
                ->count(),
            'almox2' => DB::table('solicitacoes')
                ->where('estado', 'almox2')
                ->where('solicitante', $user->nome)
                ->count(),
        ];
        return view(
            'dashboard-solicitante.menu',
            ['user' => $user, 'setores' => $setores, 'refer' => $refer, 'solicitacoes' => $solicitacoes]
        );
    }



    public function store(Request $request)
    {

        $validator  = Validator::make($request->all(), [
            'justificativa' => 'required|string|min:1', // Exige pelo menos 10 caracteres
            'quantidade1'   => 'required|integer|min:1', // Exige números inteiros e mínimo de 1
            'unidade1'      => 'required|string|min:1', // Exige texto e no máximo 10 caracteres
            'descricao1'    => 'required|string|min:5|max:255', // Exige entre 5 e 255 caracteres
            'data_esperada' => 'required|date',
        ]);

        if ($validator->fails()) {
            // Redireciona para a página anterior com todos os erros e entradas do usuário
            return redirect()->route('solicitante.index')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except('_token');  // Pega todos os dados do formulário
        $data['solicitante'] = Auth::user()->nome; // Estes campos são nulos por padrão
        $data['solicita_cargo'] = Auth::user()->cargo;
        $data['item1'] ='1';
        $data['item2'] ='2';
        $data['item3'] ='3';
        $data['item4'] ='4';
        $data['item5'] ='5';
        $data['item6'] ='6';
        $data['data_pedido'] = now();
        $data['estado'] = 'aguardando';
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('solicitacoes')->insert($data);
        return redirect()->route('solicitante.index')->with('success', 'Solicitação encaminhada com Sucesso');; // Redireciona para a página index
    }


    public function dados()
    {
        $user = Auth::user();
        return view('dashboard-solicitante.dados.dados', ['user' => $user]);
    }

    public function tabela()
    {
        $user = Auth::user();
        $solicitacoes = Solicitacao::where('solicitante', $user->nome)->get();
        return view('dashboard-solicitante.tabela.tabela', ['user' => $user, 'solicitacoes' => $solicitacoes]);
    }
}
