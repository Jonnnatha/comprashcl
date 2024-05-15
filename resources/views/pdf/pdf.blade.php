<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitação de Serviços</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .boxed {
            border: 1px solid #000;
            padding: 8px;
            margin-bottom: 10px;
            word-wrap: break-word; /* CSS antigo */
    overflow-wrap: break-word;
        }
        .flex-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #000;
            padding: 8px;
            margin-bottom: 10px;
        }
        .half-width {
            width: 50%;
            text-align: center;
        }
        .full-width {
            width: 100%;
            border-collapse: collapse;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .signature {
            border-top: 1px solid #000;
            text-align: center;
            margin-top: 10px;
            padding-top: 5px;
        }
        .signature-section {
            flex: 1;
            text-align: center;
        }
        .logo-boxed {
            flex-grow: 0; /* Ajuste para a logo não expandir */
            width: 100px; /* Tamanho fixo para a logo */
        }

        .column{
  width: calc(100% / 3);

  display: inline-block;

}
.columnn{
  width: calc(100% / 3);
  display: inline-block;
}
th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* Garante a quebra de texto dentro da célula */
            overflow-wrap: break-word; /* Alternativa para quebra de palavras longas */
        }
        .item { width: 5%; } /* Estimativa para 2 caracteres */
        .quant { width: 15%; } /* Estimativa para 15 caracteres */
        .unid { width: 10%; } /* Estimativa para 10 caracteres */
        .desc { width: 45%; } /* Estimativa para 100 caracteres */
        .forn { width: 25%; } /* Estimativa para 30 caracteres */

        .first-letter {
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div >
        <!-- Substitua 'path_to_your_image.jpg' pelo caminho da sua imagem -->

       <img class="columnn" src="{{ $caminhoImagem }}"  style="width: 100px;">
       <h3 class="column">  SOLICITAÇÃO DE COMPRAS E SERVIÇOS -</h3>
          <h4 class="column">  PROCESSO Nº [{{$solicitacao->id}}]</h4>
    </div>

    <div class="boxed"><strong>SETOR REQUERENTE:</strong> {{$solicitacao->setor_requerente}}</div>

    <div class="boxed"><strong>JUSTIFICATIVA E FINALIDADE DA COMPRA OU SERVIÇO:</strong> <p>{{$solicitacao->justificativa}}</p> </div>
    <div style="text-align: center;">
        <strong>SOLICITAÇÃO DE COMPRAS E SERVIÇOS</strong>
    </div>
    <table class="full-width">
        <tr>
            <th class="item">Item</th>
            <th class="quant">Quant.</th>
            <th class="unid">Unid.</th>
            <th class="desc">Descrição Técnica Comercial</th>
            <th class="forn">Fornecedor</th>
        </tr>
        @for ($i = 1; $i <= 6; $i++)
        <tr>
            <td class="item">{{ $solicitacao->{'item' . $i} }}</td>
            <td class="quant">{{ $solicitacao->{'quantidade' . $i} }}</td>
            <td class="unid">{{ $solicitacao->{'unidade' . $i} }}</td>
            <td class="desc">{{ $solicitacao->{'descricao' . $i} }}</td>
            <td class="forn">{{ $solicitacao->{'fornecedor' . $i} }}</td>
        </tr>
        @endfor
    </table>
    <div class="flex-row">
        <div><strong>DATA DO PEDIDO: </strong>{{ date("d/m/Y", strtotime($solicitacao->data_pedido)) }}
            <strong style="margin-left:160px; ">DATA CONCLUIDA: </strong> {{ date("d/m/Y", strtotime($solicitacao->indicadorconcluido)) }} </div>
    </div>

    <div class="boxed">
        <strong class="first-letter">À SEÇÃO DE COMPRAS</strong>    <strong style="margin-left: 50px;"> RECEBIDO: </strong> {{ucfirst($solicitacao->recebido_nome)}}
        <strong style="margin-left: 50px;"> DATA: </strong>{{ date("d/m/Y", strtotime($solicitacao->recebido_data)) }}
        <p>Encaminho a solicitação do material acima Autorizo a cotação/aquisição do material acima</p>
        <div class="signatures">
            <div class="signature-section">
                <p>{{ucfirst($solicitacao->solicitante)}} - {{$solicitacao->solicita_cargo}}</p>
                <p></p>
                <div class="signature"><p>[............................]</p></div>
            </div>
            <div class="signature-section">
                <p>CORDENADOR DE DESPESAS HCL</p>
                <p></p>

                <div class="signature"><p>[............................]</p></div>
            </div>
        </div>
    </div>

    <div class="boxed"><strong> OBSERVAÇÕES:</strong> <p>{{$solicitacao->observacoes}}</p></div>
</body>
</html>
