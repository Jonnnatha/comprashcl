<?php

namespace App\Http\Controllers;

use App\Models\Referencia;
use App\Models\Setor;
use App\Models\Solicitacao;
use App\Models\User;
use App\Models\UserReferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        $solicitacoes = Solicitacao::get();
        $solici = [
            'aguardando_aberta' => DB::table('solicitacoes')
                ->whereIn('estado', ['aguardando', 'aberta'])
                ->count(),
            'cotacao' => DB::table('solicitacoes')
                ->where('estado', 'cotacao')
                ->count(),
            'aprovacao' => DB::table('solicitacoes')
                ->where('estado', 'aprovacao')
                ->count(),
            'concluida' => DB::table('solicitacoes')
                ->where('estado', 'concluida')
                ->count(),
        ];
        return view('dashboard-adm.menu',['user' => $user, 'solicitacoes' => $solicitacoes, 'solici' => $solici]);

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
            return redirect()->route('admin.index')->with('success', 'Solicitação atualizada para "aberta"!');
        }

        return redirect()->route('admin.index')->with('error', 'Solicitação não está em estado "aguardando"!');
    }

    public function admdeletesoli(Request $request, $id)
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
        return redirect()->route('admin.index');
    }

    public function dados()
    {
        $user = Auth::user();
        return view('dashboard-adm.dados.dados', ['user' => $user]);
    }

    public function tabela()
    {
        $user = Auth::user();
        $solicitacoes = Solicitacao::get();
        return view('dashboard-adm.tabela.tabela', ['user' => $user, 'solicitacoes' => $solicitacoes]);
    }

    public function gerarpdf($id){
        $solicitacao = Solicitacao::findOrFail($id);
        $caminhoImagem = public_path('img/1.jpg');

        $pdf = PDF::loadView('pdf.pdf', ['solicitacao' => $solicitacao,'caminhoImagem' => $caminhoImagem]);

        return $pdf->stream('solicitacao -'.$id.'.pdf');
        // return view('pdf.pdf', ['solicitacao' => $solicitacao]);
    }

    public function cotacao($id)
    {

        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'aberta') {
            $solicitacao->estado = 'cotacao';
            $solicitacao->indicadorcotaçao = now();
            $solicitacao->save();
            return redirect()->route('admin.tabela')->with('success', 'Solicitação atualizada para "cotacao"!');
        }

        return redirect()->route('admin.tabela')->with('error', 'Solicitação não está em estado "aberta"!');
    }

    public function aprovacao($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'cotacao') {
            $solicitacao->estado = 'aprovacao';
            $solicitacao->indicadoraprovacao = now();
            $solicitacao->save();
            return redirect()->route('admin.tabela')->with('success', 'Solicitação atualizada para "aprovacao"!');
        }

        return redirect()->route('admin.tabela')->with('error', 'Solicitação não está em estado "aberta"!');
    }

    public function concluida($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        // Verificar se o estado atual é 'aguardando'
        if ($solicitacao->estado == 'aprovacao') {
            $solicitacao->estado = 'concluida';
            $solicitacao->indicadorconcluido = now();
            $solicitacao->save();
            return redirect()->route('admin.tabela')->with('success', 'Solicitação atualizada para "concluida"!');
        }

        return redirect()->route('admin.tabela')->with('error', 'Solicitação não está em estado "aberta"!');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////


    public function referencia(){
        $user = Auth::user();
        $referencias = Referencia::get();

        return view('dashboard-adm.referencia.referencia',['user' => $user, 'referencias' => $referencias]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'referencia' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
        ]);

        // Verifica se a referência ou o código já existe
        $existingReferencia = Referencia::where('referencia', $request->referencia)
                                         ->orWhere('codigo', $request->codigo)
                                         ->first();
        if ($existingReferencia) {
            return redirect()->back()->with('error', 'Referência ou código já cadastrado.');
        }

        $referencia = new Referencia();
        $referencia->referencia = $request->referencia;
        $referencia->codigo = $request->codigo;
        $referencia->save();

        return redirect()->route('admin.referencia')->with('success', 'Referência adicionada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'referencia' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
        ]);

        $referencia = Referencia::findOrFail($id);
        $referencia->referencia = $request->referencia;
        $referencia->codigo = $request->codigo;
        $referencia->save();

        return redirect()->route('admin.referencia')->with('success', 'Referência atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $referencia = Referencia::findOrFail($id);
        $referencia->delete();

        return redirect()->route('admin.referencia')->with('success', 'Referência deletada com sucesso!');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    public function setor(){
        $user = Auth::user();
        $setor = Setor::get();

        return view('dashboard-adm.setor.setor',['user' => $user, 'setor' => $setor]);

    }

    public function storesetor(Request $request)
    {
        $request->validate([
            'setor' => 'required|string|max:255',
            'cdc' => 'required|string|max:255',
        ]);

        // Verifica se a referência ou o código já existe
        $existingReferencia = Setor::where('setor', $request->setor)
                                         ->orWhere('cdc', $request->cdc)
                                         ->first();
        if ($existingReferencia) {
            return redirect()->back()->with('error', 'Setor ou cdc já cadastrado.');
        }

        $referencia = new Setor();
        $referencia->setor = $request->setor;
        $referencia->cdc = $request->cdc;
        $referencia->save();

        return redirect()->route('admin.setor')->with('success', 'Setor adicionada com sucesso!');
    }

    public function updatesetor(Request $request, $id)
    {
        $request->validate([
            'setor' => 'required|string|max:255',
            'cdc' => 'required|string|max:255',
        ]);

        $referencia = Setor::findOrFail($id);
        $referencia->setor = $request->setor;
        $referencia->cdc = $request->cdc;
        $referencia->save();

        return redirect()->route('admin.setor')->with('success', 'Setor atualizada com sucesso!');
    }

    public function destroysetor($id)
    {
        $referencia = Setor::findOrFail($id);
        $referencia->delete();

        return redirect()->route('admin.setor')->with('success', 'Referência deletada com sucesso!');

    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////


    public function solicitante(){
        $user = Auth::user();
        $solicitante = User::where('level', 'solicitante')->get();


        return view('dashboard-adm.solicitante.solicitante',['user' => $user, 'solicitante' => $solicitante]);

    }

    public function storesolicitante(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'senha' => 'required|string|max:255',
        ]);

        // Verifica se a referência ou o código já existe
        $existingReferencia = User::where('nome', $request->nome)
                                         ->first();
        if ($existingReferencia) {
            return redirect()->back()->with('error', 'Solicitante já cadastrado.');
        }

        $referencia = new User();
        $referencia->nome = $request->nome;
        $referencia->cargo = $request->cargo;
        $referencia->senha =Hash::make($request->senha);
        $referencia->level = 'solicitante';
        $referencia->save();

        return redirect()->route('admin.solicitante')->with('success', 'Solicitante adicionada com sucesso!');
    }

    public function destroysolicitante($id)
    {
        $referencia = User::findOrFail($id);
        $referencia->delete();

        return redirect()->route('admin.solicitante')->with('success', 'Solicitante deletada com sucesso!');

    }

    public function updatesolicitante(Request $request, $id)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
      // A senha é opcional e deve ter no mínimo 8 caracteres se fornecida
        ]);

        $referencia = User::findOrFail($id);
        $referencia->nome = $request->nome;
        $referencia->cargo = $request->cargo;

        if ($request->filled('senha')) {
            $referencia->senha = Hash::make($request->senha);
            // Atualiza a senha apenas se fornecida
        }

        $referencia->save();

        return redirect()->route('admin.solicitante')->with('success', 'Solicitante atualizado com sucesso!');
    }

    ////////////////////////////////////////////////////////////////////////

    public function compras(){
        $user = Auth::user();
        $solicitante = User::where('level', 'compras')->get();
        $referenciasIds = UserReferencia::get();
        $referencias = Referencia::get();
        $userReferencias = $user->referencias->pluck('id')->toArray();

        return view('dashboard-adm.compras.compras',
        ['user' => $user, 'solicitante' => $solicitante,
        'referenciasIds'=>$referenciasIds, 'referencias'=>$referencias,
    'userReferencias'=>$userReferencias]);

    }

    public function storecompras(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'senha' => 'required|string|max:255',
        ]);

        // Verifica se a referência ou o código já existe
        $existingReferencia = User::where('nome', $request->nome)
                                         ->first();
        if ($existingReferencia) {
            return redirect()->back()->with('error', 'Compras já cadastrado.');
        }

        $referencia = new User();
        $referencia->nome = $request->nome;
        $referencia->cargo = $request->cargo;
        $referencia->senha =Hash::make($request->senha);
        $referencia->level = 'compras';
        $referencia->save();

        // Associa as referências selecionadas ao usuário
        $referencia->referencias()->sync($request->input('referencia', []));

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('admin.compras')->with('success', 'Compras criado com sucesso!');
    }

    public function updatecompras(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
      // A senha é opcional e deve ter no mínimo 8 caracteres se fornecida
        ]);

        $referencia = User::findOrFail($id);
        $referencia->nome = $request->nome;
        $referencia->cargo = $request->cargo;

        if ($request->filled('senha')) {
            $referencia->senha = Hash::make($request->senha);
            // Atualiza a senha apenas se fornecida
        }

        $referencia->save();

        $referencia->referencias()->sync($request->input('referencia', []));
        return redirect()->route('admin.compras')->with('success', 'Compras atualizado com sucesso!');

    }

    public function destroycompras($id)
    {
        $referencia = User::findOrFail($id);
        $referencia->delete();

        return redirect()->route('admin.compras')->with('success', 'Compras deletada com sucesso!');

    }
}

