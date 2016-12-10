<?php
$date = str_replace('/', '-', $datafrom);
$datefrom= date('Y-m-d', strtotime($date));

$date = str_replace('/', '-', $datato);
$dateto= date('Y-m-d', strtotime($date));
if ( $autoclave_id=="" and $admin_id=="" ){
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();
}else if($autoclave_id==""){
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();
}else if($admin_id=="") {
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();
}else {
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();
}


//$q->whereDate('created_at', '=', date('Y-m-d'));

?>
<style>
    <?php include(public_path().'/css/bootstrap.min.css');?>
    <?php include(public_path().'/css/sb-admin.css');?>
</style>
<div class="container">
  <div class="row">
    <div class="page-header">
      <h1 align="center">Relatório Geral de Esterilizações</h1>      
    </div>
    <div class="col-lg-12 ">
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1">Esterilização ID</th>
            <th  class='col-md-1'>Nome do Cliente</th>
            <th  class="col-md-1">Data de Início</th>
            <th  class="col-md-1">Data de Retirada</th>
            <th  class="col-md-1">Autoclave</th>
          </tr>
        </thead>
      <tbody>

          @if(!$esterilizacao->isEmpty())
            @foreach($esterilizacao as $key => $value)
              <tr>
                <td align="center">
                  {{$value->esterilizacao_id}}
                </td>
                <td align="center">
                  {{$value->nome}}
                </td>
                <td align="center">
                  {{$value->data_inicio}}
                </td>
                <td align="center">
                  {{$value->data_retirada}}
                </td>
                <td align="center">
                  {{$value->autoclave_id}}
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de esterilizações</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
