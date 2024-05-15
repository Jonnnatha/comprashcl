<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function gerarpdf($id){
        $solicitacao = Solicitacao::findOrFail($id);
        $caminhoImagem = public_path('img/1.jpg');

        $pdf = PDF::loadView('pdf.pdf', ['solicitacao' => $solicitacao,'caminhoImagem' => $caminhoImagem]);

        return $pdf->stream('solicitacao -'.$id.'.pdf');
        // return view('pdf.pdf', ['solicitacao' => $solicitacao]);
    }
}
