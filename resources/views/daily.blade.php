<?php  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get(); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Esta tela mostra todas as esterilizações que ainda estão na autoclave, quando o conjunto de equipamentos sair da autoclave, apertar Retirada."><i class="fa fa-question-circle fa-2x"></i></a>
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1">Esterilização ID</th>
            <th class='col-md-1'>Nome do Cliente</th>
            <th class="col-md-1">Data de Início</th>
            <th class="col-md-1">Autoclave</th>
          </tr>
        </thead>
        <tbody>

          @if(!$esterilizacao->isEmpty())
            @foreach($esterilizacao as $key => $value)
              <tr>
                <td>
                  {{$value->esterilizacao_id}}
                </td>
                <td>
                  {{$value->nome}}
                </td>
                <td>
                  {{$value->data_inicio}}
                </td>
                <td>
                  {{$value->autoclave_id}}
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de clientes</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
