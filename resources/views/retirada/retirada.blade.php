@extends('layouts.telainicial')

@section('content')
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pelo nome" title="Digite um nome">
      <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Esta tela mostra todas as esterilizacoes que já estão esterilizadas,mas estão a espera do aluno, quando o aluno chegar apertar o botão entregar na esterilização correta."><i class="fa fa-question-circle fa-2x"></i></a>
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1">Esterilização ID</th>
            <th class='col-md-1'>Nome do Cliente</th>
            <th class="col-md-1">Data de Início</th>
            <th class="col-md-1">Autoclave</th>
            <th class="col-md-1">Ação</th>
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
                <td>

                  {!! Form::open(['method' => 'DELETE','route' => ['retirada.destroy', $value->esterilizacao_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Entregar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}

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

</div>
@endsection
