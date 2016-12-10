@extends('layouts.telainicial')

@section('content')
<?php  $clientes = \App\Cliente::count();
$esterilizacao = \App\Esterilizacao::count();
$sala = \App\Sala::count();
$falha = \App\Esterilizacao::where('data_final', NULL)->whereNotNull('data_retirada')->count();
?>
<div class="container">
  @if (isset($success))
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$success}}
                </div>
            </div>
        </div>
    </div>
  @endif

  <div id="page-wrapper">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Painel de Informações  <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Nesta interface, é mostrado algumas informações pertinentes ao sistema."><i class="fa fa-question-circle fa-2x"></i></a></div>
          </div>
        </div>

          <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">

          <div class="col-lg-3 col-md-6">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{ $clientes}}</div>
                              <div>Clientes Cadastrados</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-tasks fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{ $esterilizacao}}</div>
                              <div>Esterilizações Feitas</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-university fa-5x" aria-hidden="true"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{ $sala}}</div>
                              <div>Salas Cadastradas</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa  fa-exclamation-triangle fa-5x" aria-hidden="true"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{ $falha}}</div>
                              <div>Falhas Encontradas</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
</div>
@endsection
